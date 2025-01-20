<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Candidature;
use App\Models\Project;
use App\Models\User;
use App\Models\Languages_userinfo;
use App\Models\Country;
use App\Models\Userinfo;
use App\Models\Skill;
use App\Models\Userinfos_skill;
use Illuminate\Http\Request;
use Exception;
use Auth;
use DB;
class CandidaturesController extends Controller
{

    /**
     * Display a listing of the candidatures.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $candidatures = Candidature::paginate('10');

        return view('candidatures.index', compact('candidatures'));
    }

    /**
     * Show the form for creating a new candidature.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Users = User::pluck('last_name','id')->all();
$projects = Project::pluck('name','id')->all();
        
        return view('candidatures.create', compact('Users','projects'));
    }

    /**
     * Store a new candidature in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
            $data = $this->getData($request);

            // Gestion du CV
            if ($request->hasFile('cv') && $request->file('cv')->isValid()) {
                $data['cv'] = $request->file('cv')->storePublicly('cv', 'public');
            } else {
                $data['cv'] = null;  // Si aucun fichier n'est téléchargé, on laisse à null
            }

            $imagePath = null;
            // Vérification et stockage de l'image
            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $imagePath = $request->file('photo')->storePublicly('passport', 'public');
                $data['photo'] = $imagePath;
            }else {
                $data['photo'] = $imagePath;  // Si aucun fichier n'est téléchargé, on laisse à null
            }

            //dd($data);
            
            $verif = new Candidature;
            $verification = $verif->verif_candidature(Auth::User()->id, $request->project_id);
            
            if(Auth::User()->email_verified_at ==null){
                return redirect()->route('home')->with('alert-warning', 'S\'il vous plaît, activez votre adresse mail avant de postuler !');
            }elseif(Auth::User()->email_verified_at != null){ 
                $data['user_id'] = Auth::User()->id;
                $data['project_id'] = $request->project_id;
                
                if(empty(count($verification))){
                    Candidature::create($data);
                    return redirect()->route('home')->with('success_message', 'Merci d\'avoir postulé. Vous serez contacté au cas où votre candidature est retenue pour la suite du processus.');
                }else{
                    return redirect()->route('home')->with('warning_message', 'Désolé, vous avez déjà postulé pour cette offre!');
                }
            }
       
    }

    /**
     * Display the specified candidature.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $candidature = Candidature::with('user','project')->findOrFail($id);

        return view('candidatures.show', compact('candidature'));
    }

    /**
     * Show the form for editing the specified candidature.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $Countries = Country::all();
        // $Users = User::pluck('last_name','id')->all();
        
        $candidature = Candidature::findOrFail($id);
        // $Users = User::pluck('last_name','id')->all();
        $userinf = new Userinfo;
        $userinfos = $userinf->userfo();
        
        $userinfos_skills = new Userinfos_skill;
        $userinfos_skill = $userinfos_skills->userinfoSkill();

        $Userinfos = new Userinfo;
        $infos = $Userinfos->uniqInfo();

        $lang = new Languages_userinfo;
        $languagesUserinfos = $lang->lang_userinfo();

        $title = "Editer informations";
        
    	return view('candidatures.edit', compact('candidature', 'languagesUserinfos', 'Countries', 'userinfos', 'userinfos_skill', 'infos', 'title'));
    	        
    }

    /**
     * Update the specified candidature in the storage.
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
            
            $candidature = Candidature::findOrFail($id);

            // Gestion du CV
            if ($request->hasFile('cv') && $request->file('cv')->isValid()) {
                $data['cv'] = $request->file('cv')->storePublicly('cv', 'public');
            } else {
                $data['cv'] = $candidature->cv ?? null;  // Si aucun fichier n'est téléchargé, on laisse à null
            }

            if ($candidature->project->categorie === 'P') {
                $data['duree'] = $request->duree;
                $data['prix'] = $request->prix;
            };

            $imagePath = null;
            // Vérification et stockage de l'image
            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $imagePath = $request->file('photo')->storePublicly('passport', 'public');
                $data['photo'] = $imagePath;
            }else {
                $data['photo'] = $candidature->photo ?? null;  // Si aucun fichier n'est téléchargé, on laisse à null
            }

            $data['user_id'] = $candidature->user_id;

            $candidature->update($data);

            return redirect()->route('home')
                ->with('success_message', 'Candidature was successfully updated.');
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Une erreur inattendue s\'est produite lors de la tentative de traitement de votre demande.']);
        }        
    }

    /**
     * Remove the specified candidature from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $candidature = Candidature::findOrFail($id);
            $candidature->delete();

            return redirect()->route('candidatures.candidature.index')
                ->with('success_message', 'Candidature was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    //Validation du recruitement
    public function recrutement(Request $request){
        try {

            $data = $this->getDataa($request);

            //dd($data);

            $candidat = DB::table('realisers')->insert($data);
            
            if ($candidat) {
                DB::table('projects')->where('id', $request->project_id)->update([
                    "realiser" => 1
                ]);

                return redirect()->route('recruteur.detail.candidats')
                ->with('success_message', 'Recruitement validé avec succès.');
            }
            
        } catch (Exception $exception) {
            return back()
                ->with(['message_error' => 'Unexpected error occurred while trying to process your request.']);
        }

    }

    //Liste des chercheurs
    
    public function listeChercheurs(){
        $chercheurs = Userinfo::join('role_user', 'userinfos.user_id', '=', 'role_user.user_id')
                    ->join('users', 'userinfos.user_id', '=', 'users.id')
                    ->select('userinfos.id', 'last_name', 'first_name', 'tel')
                    ->where('role_user.role_id', 2)
                    ->paginate('10');

        $Userinfos = new Userinfo;
        $infos = $Userinfos->uniqInfo(); 

        $userinfos = new Userinfo;
        $userinfos = $userinfos->userfo();

        return view('recruteur.listeChercheurs', compact('chercheurs','userinfos','infos'));
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
                'messagedif' => 'required|string|min:0|max:500',
                'cv' => 'nullable|file',
                'project_id' => 'required'
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    protected function getDataa(Request $request)
    {
        $rules = [
                'candidature_id' => 'required',
                'project_id' => 'required'
        ];
        
        $data = $request->validate($rules);

        return $data;
    }

}
