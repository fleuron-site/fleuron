<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Userinfo;
use App\Models\Country;
use App\Models\Skill;
use App\Models\Languages_userinfo;
use App\Models\Userinfos_skill;
use App\Models\Language;
use App\Models\Candidature;

class DashboardController extends Controller
{
    public function index()
    {
        
        /** ##################### */
        
        $Countries = Country::all();
        
        $userinf = new Userinfo;
        $infos = $userinf->uniqInfo();
        $Languages = Language::all();
        /**$Userinfos = Userinfo::all();*/

        $userinfos_skills = new Userinfos_skill;
        $userinfos_skill = $userinfos_skills->userinfoSkill();
        $Skills = Skill::pluck('name','id')->all();
        
        /** ##################### */
        
        $Countries = Country::all();
        $projec = new Project;
        $projects = $projec->project(); 
        
        $p = new Candidature;
        $totalChercheurs = $p->totalChercheurs();
        
        $p = new Project;
        $Realiser = $p->projectRealiser();
        
        $p = new Project;
        $nonPublier = $p->projectNonPublier();
        
        $Userinfos = new Userinfo;
        $infos = $Userinfos->uniqInfo();
        
        $userinfos = new Userinfo;
        $userinfos = $userinfos->userfo();
                
        $skills = Skill::all();

        $userinfos_skills = new Userinfos_skill;
        $userinfos_skill = $userinfos_skills->userinfoSkill();
        $Skills = Skill::pluck('name','id')->all();
        
        $lang = new Languages_userinfo;
        $languagesUserinfos = $lang->lang_userinfo();
        
        $candidature = new Candidature;
        $liste_projets = $candidature->postules_chercheur();

    	if (Auth::user()->hasRole('recruteur')){
    	    $title = 'Recruteur';
    		return view('recruteur/Dashboard', compact('projects', 'userinfos', 'totalChercheurs', 'Countries', 'infos', 'skills','Realiser', 'title', 'nonPublier'));
    	}elseif (Auth::user()->hasRole('chercheur')) {
    	    
    	    $title = 'Chercheur';
    		return view('chercheur/Dashboard', compact('languagesUserinfos', 'Countries', 'infos', 'userinfos', 'Languages', 'userinfos_skill', 'Skills', 'liste_projets', 'title'));
    	}elseif (Auth::user()->hasRole('admin')) {
    		return view('admin/Dashboard', compact('userinfos', 'totalChercheurs', 'Realiser'));
    	}
    }
    
    
    public function candidats()
    {
        $Countries = Country::all();
        
        $userinfos = new Userinfo;
        $infos = $userinfos->uniqInfo();
        $userinfos = $userinfos->userfo();
        $skills = Skill::all();
        $Languages = Language::all();
        $Userinfos = Userinfo::all();

        $userinfos_skills = new Userinfos_skill;
        $userinfos_skill = $userinfos_skills->userinfoSkill();
        $Skills = Skill::pluck('name','id')->all();
        $projects = new Project;
        $project = $projects->project();
        $title = "Candidats par projet";
        return view('recruteur/candidats', compact('userinfos', 'Countries', 'infos', 'skills', 'project', 'title'));
    }
    
    public function candidatoffre($id)
    {
        $Countries = Country::all();
        
        $userinfos = new Userinfo;
        $infos = $userinfos->uniqInfo();
        $userinfos = $userinfos->userfo();
        $skills = Skill::all();
        $Languages = Language::all();
        $Userinfos = Userinfo::all();

        $userinfos_skills = new Userinfos_skill;
        $userinfos_skill = $userinfos_skills->userinfoSkill();
        $Skills = Skill::pluck('name','id')->all();
        $projects = new Project;
        $project = $projects->project();
        $candidature = new Candidature;
        $candidats = $candidature->liste($id);
        $title = "Liste des projets";
        return view('recruteur/candidatoffre', compact('userinfos', 'candidats', 'Countries', 'infos', 'skills', 'project'));
    }
    
    public function liste($id)
    {
        $Countries = Country::all();
        
        $userinfos = new Userinfo;
        $infos = $userinfos->uniqInfo();
        $userinfos = $userinfos->userfo();
        $skills = Skill::all();
        $Languages = Language::all();
        $Userinfos = Userinfo::all();

        $userinfos_skills = new Userinfos_skill;
        $userinfos_skill = $userinfos_skills->userinfoSkill();
        $Skills = Skill::pluck('name','id')->all();
        $projects = new Project;
        $project = $projects->project();
        $candidature = new Candidature;
        $candidatures = $candidature->postulantParProjet();
        
        $candidature = new Candidature;
        $candidats = $candidature->liste($id);
        $title = "Candidats par projet";

        return view('recruteur.liste', compact('userinfos', 'candidats', 'candidatures', 'Countries', 'infos', 'skills', 'project', 'title'));
    }
    
    //Offre réalisées par client
    
    public function offreRealiser()
    {
        $userinfos = new Userinfo;
        $infos = $userinfos->uniqInfo();
        $userinfos = $userinfos->userfo();

        $realiser = new Candidature;
        $realisers = $realiser->offreRealiser();
        
        $title = "Projets réalisés";

        return view('recruteur/offreRealiser', compact('userinfos', 'realisers','infos', 'title'));
    }
    
     public function offreNonPublier()
    {
        $Countries = Country::all();
        
        $userinfos = new Userinfo;
        $infos = $userinfos->uniqInfo();
        $userinfos = $userinfos->userfo();
        $skills = Skill::all();
        $Languages = Language::all();
        $Userinfos = Userinfo::all();

        $userinfos_skills = new Userinfos_skill;
        $userinfos_skill = $userinfos_skills->userinfoSkill();
        $Skills = Skill::pluck('name','id')->all();
        $projects = new Project;
        $project = $projects->project();
        $candidature = new Candidature;
        $candidatures = $candidature->postulantParProjet();
        $realiser = new Candidature;
        $realisers = $realiser->offreRealiser();
        $p = new Project;
        $nonPublier = $p->projectNonPublier();
        $title = "Projets non publiés";
        return view('recruteur/offreNonPublies', compact('userinfos', 'candidatures', 'realisers', 'Countries', 'infos', 'skills', 'project', 'title', 'nonPublier'));
    }
}
