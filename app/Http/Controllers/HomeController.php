<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Userinfo;
use App\Models\Country;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{

    public function language(String $locale)
    {
        $locale = in_array($locale, config('app.locales')) ? $locale : config('app.fallback_locale');
        session(['locale' => $locale]);
        return back();
    }

     public function index()
    { 
        
        return view('/welcome');
    }
    
    public function copie()
    { 
        $title = 'Copie des données';
        
        return view('/copie', compact('title'));
    }
    
    public function autorecherche_kills(Request $request)
    {
        $term = $request->input('term');

        // Recherche dans la deuxième table
        $table2Results = DB::table('skills')
            ->select('id', 'description')
            ->where('description', 'LIKE', '%' . $term . '%')
            ->get();
        
        return response()->json($table2Results);
    }
    
    
    public function autorecherche_pays(Request $request)
    {
        $term = $request->input('term');
        
        // Recherche dans la première table
        $table1Results = DB::table('countries')
            ->select('id', 'namecountry')
            ->where('namecountry', 'LIKE', '%' . $term . '%')
            ->get();
        
        return response()->json($table1Results);
    }
    
    
    public function offres(Request $req)
    {
        $title = 'Découvrez le meilleur site de prestation de services en ligne! - Au Togo et partout dans le monde'; 
        
        $comp = $req->employee_search;
        
        $search_pays = $req->search_pays;
        $search_skills = $req->search_input;
    
        $countries = Country::all();
        
        $skill = new Skill();
        $skills = $skill->skills();
        
        $date = Carbon::now();
        

        if($comp!=''){
            $projects = DB::table('projects')
                    ->join('skills', 'skills.id', '=', 'projects.skill_id')
                    ->join('countries', 'countries.id', '=', 'projects.country_id')
                    ->select('projects.id', 'countries.namecountry', 'projects.description', 'projects.name as projectname','projects.prix', 'projects.prixmax', 'projects.datexpir', 'skills.picture', 'skills.name', 'skills.description as namee', 'projects.realiser', 'projects.created_at', 'projects.categorie')
                    ->where('projects.publier', 1)
                    ->where('projects.datexpir', '>=',  Carbon::now()->toDateString())
                    ->where('skills.name', $comp)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        }elseif($comp!=''){
            $projects = DB::table('projects')
                    ->join('skills', 'skills.id', '=', 'projects.skill_id')
                    ->select('projects.id', 'projects.description', 'projects.name as projectname', 'skills.picture', 'skills.name','projects.prix', 'projects.prixmax', 'projects.datexpir', 'skills.description as namee', 'projects.created_at', 'projects.realiser', 'projects.categorie')
                    ->where('projects.publier', 1)
                    ->where('projects.datexpir', '>=',  Carbon::now()->toDateString())
                    ->where('skills.name', $comp)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        }elseif($search_pays !='' && $search_skills != ''){
            $projects = DB::table('projects')
                    ->join('skills', 'skills.id', '=', 'projects.skill_id')
                    ->join('countries', 'countries.id', '=', 'projects.country_id')
                    ->select('projects.id', 'countries.namecountry', 'projects.description', 'projects.name as projectname','projects.prix', 'projects.prixmax', 'projects.datexpir', 'skills.picture', 'skills.name', 'skills.description as namee', 'projects.realiser', 'projects.created_at', 'projects.categorie')
                    ->where('projects.publier', 1)
                    ->where('projects.datexpir', '>=',  Carbon::now()->toDateString())
                    ->where('skills.description', $search_skills)
                    ->where('countries.namecountry', $search_pays)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        }elseif($search_pays !='' && $search_skills == ''){
            $projects = DB::table('projects')
                    ->join('skills', 'skills.id', '=', 'projects.skill_id')
                    ->join('countries', 'countries.id', '=', 'projects.country_id')
                    ->select('projects.id', 'countries.namecountry', 'projects.description', 'projects.name as projectname','projects.prix', 'projects.prixmax', 'projects.datexpir', 'skills.picture', 'skills.name', 'skills.description as namee', 'projects.realiser', 'projects.created_at', 'projects.categorie')
                    ->where('projects.publier', 1)
                    ->where('projects.datexpir', '>=',  Carbon::now()->toDateString())
                    ->where('countries.namecountry', $search_pays)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        }elseif($search_pays =='' && $search_skills != ''){
            $projects = DB::table('projects')
                    ->join('skills', 'skills.id', '=', 'projects.skill_id')
                    ->join('countries', 'countries.id', '=', 'projects.country_id')
                    ->select('projects.id', 'countries.namecountry', 'projects.description', 'projects.name as projectname','projects.prix', 'projects.prixmax', 'projects.datexpir', 'skills.picture', 'skills.name', 'skills.description as namee', 'projects.realiser', 'projects.created_at', 'projects.categorie')
                    ->where('projects.publier', 1)
                    ->where('projects.datexpir', '>=',  Carbon::now()->toDateString())
                    ->where('skills.description', $search_skills)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        }elseif($req->archive=='archive'){
            $projects = DB::table('projects')
                    ->join('skills', 'skills.id', '=', 'projects.skill_id')
                    ->select('projects.id', 'projects.description', 'projects.name as projectname', 'skills.picture','projects.prix', 'projects.prixmax', 'projects.datexpir', 'skills.description as namee', 'projects.created_at', 'projects.realiser', 'projects.categorie')
                    ->where('projects.publier', 1)
                    ->where('projects.datexpir', '<=',  Carbon::now()->toDateString())
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        }else{
            $projects = DB::table('projects')
                    ->join('skills', 'skills.id', '=', 'projects.skill_id')
                    ->select('projects.id', 'projects.description', 'projects.name as projectname', 'skills.picture','projects.prix', 'projects.prixmax', 'projects.datexpir', 'skills.description as namee', 'projects.created_at', 'projects.realiser', 'projects.categorie')
                    ->where('projects.publier', 1)
                    ->where('projects.datexpir', '>=',  Carbon::now()->toDateString())
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        }
         return view('/offre', ['countries'=> $countries, 'projects'=> $projects, 'skills'=> $skills, 'title' => $title]);
    }
    
    public function loginv2()
    {
        $title = 'Connexion';
        return view('/loginv2' , ['title' => $title]);
    }
    
    public function registerv2()
    {
        $title = 'Inscription';
        return view('/registerv2' , ['title' => $title]);
    }
    
    public function resetv2()
    {
        $title = 'Réinitialisation';
        return view('/resetv2' , ['title' => $title]);
    }
    
    public function detailv2($id, Request $req)
    {
        $comp = $req->employee_search;
        $pays = $req->pays;
        $countries = Country::all();
        $skill = new Skill();
        $skills = $skill->skills();
        $donnees = Project::findOrFail($id);
        $title = 'Découvrez le meilleur site de prestation de services en ligne! - Au Togo et partout dans le monde';
        return view('/detailv2' , ['countries'  => $countries, 'donnees'  => $donnees, 'skills'  => $skills, 'title' => $title]);
    }
    
    
    
    public function detail($id, Request $req)
    {
        $comp = $req->employee_search;
        $pays = $req->pays;
        $countries = Country::all();
        $skill = new Skill();
        $skills = $skill->skills();
        $donnees = Project::findOrFail($id);
        $title = 'Découvrez le meilleur site de prestation de services en ligne! - Au Togo et partout dans le monde';
        return view('/detail', ['countries'  => $countries, 'donnees'  => $donnees, 'skills'  => $skills, 'title' => $title]);
    }

    

    //
    public function offre()
    {
        $skills = Skill::all();
        $project = new Project();
        $projects = $project->publierOffre();
        return view('/welcome', compact('skills', 'projects'));
    }

    public function about()
    {
        $project = new Project();
        $projects = $project->publierOffre();
        return view('/about', compact('projects'));
    }


    public function autocomplete(Request $request)
    {
        $data =Skill::select("name")
                ->where("name","LIKE","%{$request->query}%")
                ->get();
   
        return response()->json($data);
    }


    function fetch(Request $request)
    {

     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('skills')
        ->where('name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }


    public function projets()
    {
        $project = new Project();
        $projects = $project->publierProjet();
        //$projectts = Project::findOrFail($id);
        return view('/projets', compact('projects'));
    }


    public function envoie()
    {
        return view('/envoie_mail');
    }
    public function service()
    {
        return view('/service');
    }

     public function inscrire()
    {
        return view('inscription');
    }

    public function create()
    {
        return view('rechercheEmploi');
    }

    public function log()
    {
        return view('login');
    }

    public function candidature($id)
    {
        $project = Project::findOrFail($id);
        return view('candidature', compact('project'));
    }

    public function candidatureProject($id)
    {
        $Countries = Country::all();
        $userinfos = new Userinfo;
        $userinfos = $userinfos->userfo();
        $project = Project::findOrFail($id);
        return view('candidatureProjet', compact('project', 'userinfos', 'Countries'));
    }

    public function autocomplate(){
        return view('autocomplete');
    }

    public function getAutocomplete(Request $request){

          $search = $request->search;

          if($search == ''){
             $autocomplate = Skill::orderby('name','asc')->select('id','name')->limit(5)->get();
          }else{
             $autocomplate = Skill::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
          }

          $response = array();
          foreach($autocomplate as $autocomplate){
             $response[] = array("value"=>$autocomplate->id,"label"=>$autocomplate->name);
          }

          echo json_encode($response);
          exit;
    }
    
    
    
    public function commentGererCompte(){
        $title = "Comment gerer mon compte";
        return view('support/gerer-mon-compte', compact('title'));
    }
    
    public function principeFonctionnement(){
        $title = "principe de fonctionnement";
        return view('support/support', compact('title'));
    }
    
    public function creerUnprojet(){
        $title = "creer un projet";
        return view('support/creer-un-projet', compact('title'));
    }
    
    public function faireOffre(){
        $title = "Faire une offre";
        return view('support/faire-une-offre', compact('title'));
    }
    
    public function eviteLitige(){
        $title = "Eviter les litiges";
        return view('support/eviter-les-litiges', compact('title'));
    }
    
     public function guideChercheur(){
         $title = "Infos chercheur";
        return view('support/chercheur', compact('title'));
    }
    
    public function guideClient(){
        $title = "Infos client";
        return view('support/client', compact('title'));
    }
    
    
    public function aide(){
        return view('guide/aide');
    }
    
    public function emailConfirmation(){
        return view('guide/je-ne-recois-pas-d-email-de-confirmation');
    }
    
    
    
    
    
    
    
}
