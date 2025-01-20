<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Userinfo;
use App\Models\Userinfos_skill;
use App\Models\Languages_userinfo;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Language;
use Exception;
use Illuminate\Support\Facades\Auth;

use DB;

class UserinfosSkillsController extends Controller
{

    /**
     * Display a listing of the userinfos skills.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $userinfosSkills = Userinfos_skill::with('userinfo','skill')->paginate(25);

        return view('admin.userinfos_skills.index', compact('userinfosSkills'));
    }

    /**
     * Show the form for creating a new userinfos skill.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        $Userinfos = new Userinfo;
        $infos = $Userinfos->uniqInfo();
        
        $userinfos = new Userinfo;
        $userinfos = $userinfos->userfo();
        
        $title='Ajouter vos compétances';
        
        $userinfos_skills = new Userinfos_skill;
        $userinfos_skill = $userinfos_skills->userinfoSkill();
        
        $Userinfos = Userinfo::pluck('tel','id')->all();
        $Skills = Skill::pluck('name','id')->all();
        
        $lang = new Languages_userinfo;
        $languagesUserinfos = $lang->lang_userinfo();

        $Countries = Country::all();
        
        $Languages = Language::all();
        
        return view('admin.userinfos_skills.create', compact('Languages','Countries','Userinfos', 'infos','userinfos', 'title', 'userinfos_skill', 'languagesUserinfos', 'Skills'));
    }

    /**
     * Store a new userinfos skill in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        try {
            // $data = Auth::user()->id;
            //dd($request->skill_id);

            $userinfo = new Userinfo;
            $id = $userinfo->userinfo();

            $id_userinfo = 0;
            
            if(empty($id)){
                return redirect()
                        ->back()
                        ->with('warning_message', 'Vous devez charger d\'avance vos informations complémentaires s\'il vous plaît!');
            }else{
                
                foreach ($id as $userinfo) {
                    $id_userinfo=$userinfo->id;
                }

                $rules = [
                'skill_id' => 'required', 
                ];
                
                $data = $request->validate($rules);
    
                $skill_id = $request->input('skill_id');

                $count = 0;

                for ($i = 0; $i < count($skill_id); $i++) { 
                    $data['skill_id'] = $request->skill_id[$i];
                    $data['userinfo_id'] = $id_userinfo;

                    // Vérifier si l'entrée existe déjà dans la table
                    $exist = DB::table('userinfos_skills')
                        ->where('userinfo_id', $id_userinfo)
                        ->where('skill_id', $request->skill_id[$i])
                        ->exists(); // Utilisation de "exists()" pour optimiser

                    // Si l'entrée n'existe pas, insérer et incrémenter $count
                    if (!$exist) {
                        Userinfos_skill::create($data);
                        $count++; // Incrémenter après une insertion réussie
                    }
                }

                if ($count == 0) {
                    return redirect('chercheur/domaines/liste')
                        ->with('warning_message', 'Domaine(s) déjà ajouté(s)');
                }
                return redirect('chercheur/domaines/liste')
                    ->with('success_message', 'Domaine(s) ajouté(s) avec succès!');
                
            }
            
        } catch (Exception $exception) {

            return redirect()->back()
                ->with('danger_message', 'Erreure lors de l\'ajout');
        }
    }

    /**
     * Display the specified userinfos skill.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $userinfosSkill = Userinfos_skill::with('userinfo','skill')->findOrFail($id);

        return view('admin.userinfos_skills.show', compact('userinfosSkill'));
    }

    /**
     * Show the form for editing the specified userinfos skill.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $userinfosSkill = Userinfos_skill::findOrFail($id);
        $Userinfos = Userinfo::pluck('tel','id')->all();
$Skills = Skill::pluck('name','id')->all();

        return view('admin.userinfos_skills.edit', compact('userinfosSkill','Userinfos','Skills'));
    }

    /**
     * Update the specified userinfos skill in the storage.
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
            
            $userinfosSkill = Userinfos_skill::findOrFail($id);
            $userinfosSkill->update($data);

            return redirect()->route('admin.userinfos_skills.userinfos_skill.index')
                ->with('success_message', trans('userinfos_skills.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('userinfos_skills.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified userinfos skill from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $userinfosSkill = Userinfos_skill::findOrFail($id);
            $userinfosSkill->delete();
            return redirect()->back()
                ->with('success_message', trans('userinfos_skills.model_was_deleted'));
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('userinfos_skills.unexpected_error')]);
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
                'userinfo_id' => 'required',
            'skill_id' => 'required', 
        ];
        
        $data = $request->validate($rules);

        $skill = new Userinfos_skill();

        $skill_id = $request->input('skill_id');

         for ($i=0; $i < count($skill_id) ; $i++) { 
            $data['skill_id'] = $request->skill_id[$i];
            $data['userinfo_id'] = $request->userinfo_id;
         }

        
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
        
        $title = "Compétance";
        
        $languagesUserinfos = Languages_userinfo::with('language','userinfo')->paginate(25);

        return view('chercheur.competance', compact('languagesUserinfos', 'userinfos', 'Countries', 'infos', 'Languages', 'Userinfos', 'userinfos_skill', 'Skills', 'Skill', 'userinfosSkills', 'title'));
    }

}
