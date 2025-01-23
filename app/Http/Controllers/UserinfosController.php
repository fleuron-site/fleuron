<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use App\Models\Userinfo;
use App\Models\Skill;
use App\Models\Userinfos_skill;
use App\Models\Languages_userinfo;
use App\Models\Language;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use DB;

class UserinfosController extends Controller
{

    /**
     * Display a listing of the userinfos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $userinfos = Userinfo::paginate(25);

        return view('admin.userinfos.index', compact('userinfos'));
    }

    /**
     * Show the form for creating a new userinfo.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Countries = Country::all();
        $Users = User::pluck('last_name','id')->all();
        $Userinfos = new Userinfo;
        $infos = $Userinfos->uniqInfo();
        $userinfos = new Userinfo;
        $userinfos = $userinfos->userfo();
        $title='Ajout de vos informations';
        $userinfos_skills = new Userinfos_skill;
        $userinfos_skill = $userinfos_skills->userinfoSkill();

        $lang = new Languages_userinfo;
        $languagesUserinfos = $lang->lang_userinfo();
        if (Auth::user()->hasRole('admin')){
    		return view('admin.userinfos.create_ad', compact('languagesUserinfos', 'Countries','Users','infos', 'userinfos', 'userinfos_skill', 'title'));
    	}else{
    		return view('admin.userinfos.create', compact('languagesUserinfos', 'Countries','Users','infos', 'userinfos', 'userinfos_skill', 'title'));
    	}
        
    }

    public function create_all()
    {
        $Countries = Country::all();
        $Users = User::pluck('last_name','id')->all();
        $Userinfos = new Userinfo;
        $infos = $Userinfos->uniqInfo();
        $userinfos = new Userinfo;
        $userinfos = $userinfos->userfo();
        $title='Ajout de vos informations';
        $userinfos_skills = new Userinfos_skill;
        $userinfos_skill = $userinfos_skills->userinfoSkill();

        $Skills = Skill::pluck('name','id')->all();
        $Languages = Language::all();

        $lang = new Languages_userinfo;
        $languagesUserinfos = $lang->lang_userinfo();
        if (Auth::user()->hasRole('admin')){
    		return view('admin.userinfos.create_ad', compact('languagesUserinfos', 'Countries','Users','infos', 'userinfos', 'userinfos_skill', 'title'));
    	}else{
    		return view('admin.userinfos.all', compact('Skills','Languages','languagesUserinfos', 'Countries','Users','infos', 'userinfos', 'userinfos_skill', 'title'));
    	}
        
    }

        /**
     * Store a new userinfo in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            $userId = Auth::user()->id;
            $exists = Userinfo::where('user_id', $userId)->exists();
        
            if (!$exists) {
                // Règles de validation pour les informations personnelles
                $rules = [
                    'countrie_id' => 'required',
                    'vacant' => 'nullable',
                    'cv' => 'nullable|file',
                    'about' => 'required|string|min:3|max:4294967295',
                    'tel' => 'required|string',  // Validation pour le téléphone
                ];
                $data = $request->validate($rules);
        
                // Traitement du téléphone
                $data['tel'] = $request->cod . " " . $request->tel;
                $data['user_id'] = $userId;
        
                // Gestion du CV
                if ($request->hasFile('cv') && $request->file('cv')->isValid()) {
                    $data['cv'] = $request->file('cv')->storePublicly('cv', 'public');
                } else {
                    $data['cv'] = null;  // Si aucun fichier n'est téléchargé, on laisse à null
                }
        
                // Insertion des données dans la table userinfos
                $nouveauID = DB::table('userinfos')->insertGetId($data);
        
                // Règles de validation pour les compétences
                $rules = ['skill_id' => 'required|array'];
                $validatedSkills = $request->validate($rules);
        
                // Insertion des compétences
                $skills = $request->skill_id;
                $this->insertSkills($nouveauID, $skills);
        
                // Insertion des langues
                $languages = $request->language_id;
                $this->insertLanguages($nouveauID, $languages, $request);
        
                // Redirection avec message de succès
                // if (Auth::user()->hasRole('chercheur')) {

                return redirect('edition/' . $nouveauID . '/informations')
                    ->with('success_message', 'Vos informations ont été ajoutées avec succès, merci !');

                // } elseif (Auth::user()->hasRole('recruteur')) {
                //     return redirect('recruteur/' . $nouveauID . '/vos_informations')
                //         ->with('success_message', 'Vos informations ont été ajoutées avec succès, merci !');
                // }   
                // return back();

            } else {
                return redirect('edition/' . $nouveauID . '/informations')
                    ->with('warning_message', 'Vos informations sont déjà prises en compte');
            }
        
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('userinfos.unexpected_error')]);
        }
    }

    /**
         * Insérer les compétences dans la base de données.
         *
         * @param int $userinfoId
         * @param array $skills
         * @return void
         */
    protected function insertSkills($userinfoId, $skills)
    {
        $count = 0;
        foreach ($skills as $skillId) {
            if (!DB::table('userinfos_skills')
                    ->where('userinfo_id', $userinfoId)
                    ->where('skill_id', $skillId)
                    ->exists()) {
                Userinfos_skill::create([
                    'userinfo_id' => $userinfoId,
                    'skill_id' => $skillId,
                ]);
                $count++;
            }
        }
        
        if ($count === 0) {
            session()->flash('warning_message', 'Domaine(s) déjà ajouté(s)');
        }
    }
    
    /**
     * Insérer les langues dans la base de données.
     *
     * @param int $userinfoId
     * @param array $languages
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function insertLanguages($userinfoId, $languages, $request)
    {
        foreach ($languages as $index => $languageId) {
            $levelOral = $request->input('level_oral_' . $index);
            $levelWritten = $request->input('level_written_' . $index);
    
            if (!DB::table('languages_userinfos')
                    ->where('userinfo_id', $userinfoId)
                    ->where('language_id', $languageId)
                    ->exists()) {
                Languages_userinfo::create([
                    'userinfo_id' => $userinfoId,
                    'language_id' => $languageId,
                    'level_oral' => $levelOral,
                    'level_written' => $levelWritten,
                ]);
            }
        }
    }

    /**
     * Display the specified userinfo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $userinfo = Userinfo::with('country','user')->findOrFail($id);

        return view('admin.userinfos.show', compact('userinfo'));
    }

    //Détail des candidats
    public function showCandidats($id)
    {
        $Userinfos = new Userinfo;
        $infos = $Userinfos->uniqInfo();

        $userinfos = new Userinfo;
        $userinfos = $userinfos->userfo();


        $candidat = Userinfo::findOrFail($id);

        $candidature = Candidature::where('user_id', $candidat->user_id)->first();


        $userinfos_skills = Userinfos_skill::where('userinfos_skills.userinfo_id',  $id)
                    ->get();

        $userinfos_langues = Languages_userinfo::where('languages_userinfos.userinfo_id',  $id)
                    ->get();

        return view('recruteur.candidat.show', compact('candidat','candidature','userinfos','infos', 'userinfos_skills','userinfos_langues'));
    }

   
    /**
     * Show the form for editing the specified userinfo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $Countries = Country::all();
        $Users = User::pluck('last_name','id')->all();
        
        $userinfo = Userinfo::findOrFail($id);
        $Users = User::pluck('last_name','id')->all();
        $userinf = new Userinfo;
        $userinfos = $userinf->userfo();
        $Userinfos = new Userinfo;
        $infos = $Userinfos->uniqInfo();
        $title = "Editer informations";
        
        if (Auth::user()->hasRole('chercheur')) {
    		return view('chercheur/Dashboard', compact('languagesUserinfos', 'proo', 'Countries', 'infos', 'userinfos', 'Languages', 'userinfos_skill', 'Skills', 'liste_projets', 'title'));
    	}elseif (Auth::user()->hasRole('admin')) {
    		return view('admin/userinfos/edit', compact('userinfo', 'Countries'));
    	}

        
    }

    /**
     * Update the specified userinfo in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            $tel = $request->cod." ".$request->tel;
            $data = $this->getData($request);
            $userinfo = Userinfo::findOrFail($id);

            $data['users_id'] = Auth::user()->id;
            $data['tel'] = $tel;    
            //dd($request->cv);

            $cvPath = null;

            // Vérification et stockage du CV
            if ($request->hasFile('cv') && $request->file('cv')->isValid()) {
                $cvPath = $request->file('cv')->storePublicly('cv', 'public');
            } else {
                // Si aucun nouveau CV n'est téléchargé, on garde l'ancien CV
                $cvPath = $userinfo->cv ?? null; // Remplacer par la variable contenant l'ancien CV si existant
            }

            //dd($cvPath);
            
            $data['cv'] = $cvPath; 

            $userinfo->update($data);
            
            if (Auth::user()->hasRole('recruteur')){
        		return redirect()->back()
                ->with('success_message', 'Vous avez modifié vos informations avec succès');
        	}elseif (Auth::user()->hasRole('chercheur')) {
        		return redirect()->back()
                ->with('success_message', 'Vous avez modifié vos informations avec succès');
        	}elseif (Auth::user()->hasRole('admin')) {
        		return view('admin/Dashboard', compact('userinfos', 'pro', 'Realiser'));
        	}
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('userinfos.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified userinfo from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $userinfo = Userinfo::findOrFail($id);
            $userinfo->delete();

            return redirect()->back()
                ->with('success_message', trans('userinfos.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('userinfos.unexpected_error')]);
        }
    }
    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'tel' => 'required|string|min:8|max:45',
            'vacant' => 'nullable',
            'about' => 'required|string|min:3|max:4294967295',
            'countrie_id' => 'required|numeric|min:1'
        ];
        
        $data = $request->validate($rules);
        return $data;
    }

    /** 
     * Methode permet de charger les informations des cheurcheurs projets
     */

    public function infos($id)
    {
        $Countries = Country::all();
        $userinfo = Userinfo::with('country','user')->findOrFail($id);
        $Userinfos = Userinfo::all();
        
        
        $userinf = new Userinfo;
        $infos = $userinf->uniqInfo();
        $Languages = Language::all();

        $userinfos_skills = new Userinfos_skill;
        $userinfos_skill = $userinfos_skills->userinfoSkill();
        $Skills = Skill::pluck('name','id')->all();
        
        $title = "Mes informations";
        
        $userinfos = new Userinfo;
        $userinfos = $userinfos->userfo();
        
        $lang = new Languages_userinfo;
        $languagesUserinfos = $lang->lang_userinfo();

        return view('commun.infos', compact('languagesUserinfos', 'userinfo', 'Countries', 'userinfos', 'infos', 'Languages', 'Userinfos', 'userinfos_skill', 'Skills', 'title'));
    }

    /**
     * La methode permet de mettre à jour le CV, pour un chercheurs projets
     */
    public function update_cv(Request $request, $id){
    	if($request->hasFile('cv')){
            $file = $request->cv;
            $ff = time() . '.' . $file->getClientOriginalExtension();
            
            $name = time().'_'.$file->getClientOriginalName();
            
            $request->file('cv')->storeAs('/cv', $name, 'public');
            $data['cv'] = '' . $ff;

    		$userinfo = Userinfo::find($id);
    		$userinfo->cv = $ff;
    		$userinfo->save();
    	}
		return redirect()->back()->with('success_message', trans('CV modifié avec succès !'));;

    }

    public function updateProfile(Request $request)
    {
        #Validations
        $request->validate([
            'email'         => 'required|unique:users,email,'.auth()->user()->id.',id',
            'first_name'    => 'required',
            'last_name'     => 'required'
        ]);

        try {
            DB::beginTransaction();
            
            #Update Profile Data
            User::whereId(auth()->user()->id)->update([
                'email' => $request->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name
            ]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success_message', 'Profile est modifié avec succès.');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error_message', $th->getMessage());
        }
    }

}
