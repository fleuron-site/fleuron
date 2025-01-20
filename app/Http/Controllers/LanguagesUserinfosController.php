<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Languages_userinfo;
use App\Models\Userinfo;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Userinfos_skill;
use App\Models\Country;
use Exception;
use Illuminate\Support\Facades\Auth;
use DB;

class LanguagesUserinfosController extends Controller
{

    /**
     * Display a listing of the languages userinfos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $languagesUserinfos = Languages_userinfo::with('language','userinfo')->paginate(25);

        return view('admin.languages_userinfos.index', compact('languagesUserinfos'));
    }

    /**
     * Show the form for creating a new languages userinfo.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Languages = Language::pluck('name','id')->all();
        $Userinfos = Userinfo::pluck('tel','id')->all();
        
        $Userinfos = new Userinfo;
        $infos = $Userinfos->uniqInfo();
        
        $userinfos = new Userinfo;
        $userinfos = $userinfos->userfo();
        
        $title='Ajouter vos langues';
        
        $userinfos_skills = new Userinfos_skill;
        $userinfos_skill = $userinfos_skills->userinfoSkill();
        
        $Userinfos = Userinfo::pluck('tel','id')->all();
        $Skills = Skill::pluck('name','id')->all();
        
        $lang = new Languages_userinfo;
        $languagesUserinfos = $lang->lang_userinfo();
        
        
        if (Auth::user()->hasRole('recruteur')) {
            return view('admin.languages_userinfos.create', compact('Languages','Userinfos'));
    	}elseif (Auth::user()->hasRole('chercheur')) {
    	    return view('chercheur.create_language', compact('Languages', 'languagesUserinfos', 'Userinfos', 'infos','userinfos', 'title', 'userinfos_skill', 'Skills'));
    	}elseif (Auth::user()->hasRole('admin')) {
    		return view('admin.languages_userinfos.create', compact('Languages','Userinfos'));
    	}
    }
    
    

    /**
     * Store a new languages userinfo in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {      
        try {
            $userinfo = new Userinfo;
            $id = $userinfo->userinfo();
            $id_userinfo = 0;

            foreach ($id as $userinfo) {
                if($userinfo->user_id == Auth::user()->id){
                    $id_userinfo = $userinfo->id;
                }

            }
            
            $rules = [
            'language_id' => 'required',
            'level_oral' => 'required',
            'level_written' => 'required', 
             ];
                
            
            $data = $request->validate($rules);
            
            $data['userinfo_id'] = $id_userinfo;
            $data['language_id'] = $request->language_id;

            // Vérifier si l'entrée existe déjà dans la table
            $exist = DB::table('languages_userinfos')
            ->where('userinfo_id', $id_userinfo)
            ->where('language_id', $request->language_id)
            ->exists(); // Utilisation de "exists()" pour optimiser
            
            if (Auth::user()->hasRole('recruteur')) {
            	Languages_userinfo::create($data);
                return redirect()->back()->with('success_message', trans('Vous avez reçu à ajouter la langue avec succès.'));
        	}elseif (Auth::user()->hasRole('chercheur'))
        	{
                if ($exist) {
                    return redirect()->back()->with('warning_message', 'Langue déjà ajoutée');
                }
        	    Languages_userinfo::create($data);
                return redirect('chercheur/langues/liste')->with('success_message', trans('Vous avez ajouté la langue avec succès.'));
        	}elseif (Auth::user()->hasRole('admin')) {
        	    Languages_userinfo::create($data);
                return redirect()->back()->with('success_message', trans('Vous avez reçu à ajouter la langue avec succès.'));
        	}
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('languages_userinfos.unexpected_error')]);
        }
    }

    /**
     * Display the specified languages userinfo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $languagesUserinfo = Languages_userinfo::with('language','userinfo')->findOrFail($id);

        return view('admin.languages_userinfos.show', compact('languagesUserinfo'));
    }

    /**
     * Show the form for editing the specified languages userinfo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $languagesUserinfo = Languages_userinfo::findOrFail($id);
        $Languages = Language::pluck('name','id')->all();
$Userinfos = Userinfo::pluck('tel','id')->all();

        return view('admin.languages_userinfos.edit', compact('languagesUserinfo','Languages','Userinfos'));
    }

    /**
     * Update the specified languages userinfo in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $languagesUserinfo = Languages_userinfo::findOrFail($id);
            $languagesUserinfo->update($data);

            return redirect()->route('admin.languages_userinfos.languages_userinfo.index')
                ->with('success_message', trans('languages_userinfos.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('languages_userinfos.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified languages userinfo from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $languagesUserinfo = Languages_userinfo::findOrFail($id);
            $languagesUserinfo->delete();

            return redirect('chercheur/langues/liste')->with('success_message', 'Suppression effectuée avec succès!');
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('languages_userinfos.unexpected_error')]);
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
            'language_id' => 'required|numeric|min:0|array',
            //'userinfo_id' => 'required',
            'level_oral' => 'required',
            'level_written' => 'required', 
        ];
        $data = $request->validate($rules);
        return $data;
    }

    public function liste()
    {
        $Countries = Country::all();
        $userinfos = new Userinfo;
        $userinfos = $userinfos->userfo();
        $userinf = new Userinfo;
        $infos = $userinf->uniqInfo();
        $Languages = Language::all();
        $Userinfos = Userinfo::all();

        $userinfos_skills = new Userinfos_skill;
        $userinfos_skill = $userinfos_skills->userinfoSkill();
        $Skills = Skill::pluck('name','id')->all();

        $Skils = new Userinfos_skill;
        $Skill = $Skils->userinfoSkillListe();

        $userinfosSkills = Userinfos_skill::with('userinfo','skill')->paginate(10);
        
        $lang = new Languages_userinfo;
        $languagesUserinfos = $lang->lang_userinfo();
        
        $title = "Langue";

        return view('chercheur.language', compact('languagesUserinfos', 'userinfos', 'Countries', 'infos', 'Languages', 'Userinfos', 'userinfos_skill', 'Skills', 'Skill', 'userinfosSkills', 'title'));
    }
}
