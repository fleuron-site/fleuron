<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Models\Userinfo;
use App\Models\Languages_userinfo;
use App\Models\Skill;
use App\Models\Userinfos_skill;
use App\Models\Country;
use App\Models\Imageurl;
use App\Models\Language;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Notification;
use Illuminate\Notifications\Notifiable;
use App\Notifications\InvoicePaid;
use Validator;
use DB;
class ProjectsController extends Controller
{

    /**
     * Display a listing of the projects.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $projects = Project::with('user')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Users = User::pluck('last_name','id')->all();
        $userinf = new Userinfo;
        $userinfos = $userinf->userfo();
        $Userinfos = new Userinfo;
        $infos = $Userinfos->uniqInfo();
        $title = "Création du projet";
        
        $skills = Skill::orderBy('name')->get();
        $Countries = Country::orderBy('namecountry')->get();
        
        $imageurls = Imageurl::orderBy('descrip')->get();
        
        if (Auth::user()->hasRole('recruteur')){
    		return view('recruteur.redige_projet', compact('Users', 'Countries', 'userinfos', 'infos', 'title','skills', 'imageurls'));
    	}elseif (Auth::user()->hasRole('admin')) {
    		return view('admin.projects.create', compact('Users', 'Countries', 'skills', 'imageurls'));
    	}
    }

    /**
     * Store a new project in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    
    public function store(Request $request){
        
        $rules = [
            'name' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:3',
            'categorie' => 'required|string|max:1',
            'file' => 'nullable|mimes:txt,Doc,docx,pdf|max:3072',
            'prix' => 'nullable',
            'prixmax' => 'nullable',
            //'realiser' => 'nullable',
            'datexpir' => 'nullable',
            'country_id' => 'required', 
            'imageurl_id'=> 'nullable'
            
        ];
        
        
        
            $data = $request->validate($rules);
            
            $data['user_id'] = Auth::user()->id;

            // Gestion du CV
            if ($request->hasFile('file')) {
                $data['file'] = $request->file('file')->storePublicly('offre', 'public');
            } else {
                $data['file'] = null;  // Si aucun fichier n'est téléchargé, on laisse à null
            }
            
            if($request->skill_id){
                $data['skill_id'] = $request->skill_id;
            }

            //dd($data);
    
            $creer = Project::create($data);
            
            $projects = new Project;
            
            $project = $projects->sendProject();
            
            $id = 0;
            $description = "";
            
            foreach($project as $project){
                $id = $project->id;
                $name = $project->name;
                $description = strip_tags(trim(html_entity_decode(substr($project->description, 0, 225),   ENT_QUOTES, 'UTF-8'), "\xc2\xa0"));
            }
            
            $url = url('offre/'.$id.'/detail');
            
            $data = [
                'greet' => $name,
                'body' => $description,
                'thanks' => 'Equipe fleuron vous remercie pour votre confiance!',
                'Text' => 'Détail!',
                'url' => $url
            ];
            
            if($creer){
                
                $user = new User;
                $users = $user->sendNotify();
                
                foreach($users as $user){
                    Notification::route('mail', $user->email)->notify(new InvoicePaid($data));
                }
            }
            
            if (Auth::user()->hasRole('recruteur')){
    		    return redirect()->route('home')->with('success_message', 'Votre offre a été ajoutée avec succès.');
        	}elseif (Auth::user()->hasRole('admin')) {
    		    return redirect()->route('admin.projects.project.index')->with('success_message', 'Votre offre a été ajoutée avec succès.');
        	}
            
        }
        
        
    /**
     * Display the specified project.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $project = Project::with('user')->findOrFail($id);

        return view('admin.projects.show', compact('project'));
    }


    /**
     * Show the form for editing the specified project.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $Users = User::pluck('last_name','id')->all();
         
        $skills = Skill::orderBy('name')->get();
        $Countries = Country::orderBy('namecountry')->get();
         
        $imageurls = Imageurl::orderBy('descrip')->get();
        
        $userinfos = new Userinfo;
        $infos = $userinfos->uniqInfo();
        $userinfos = $userinfos->userfo();

        return view('admin.projects.edit', compact('project','Users', 'Countries','skills', 'imageurls','userinfos','infos'));
    }

    /**
     * Update the specified project in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
        {
            try {
                $rules = [
                'name' => 'required|string|min:0|max:100',
                'description' => 'required|string|min:3',
                'categorie' => 'string|max:1',
                'file' => ['nullable','file'],
                //'user_id' => 'required',
                'prix' => 'nullable',
                'prixmax' => 'nullable',
                'datexpir' => 'nullable',
                'country_id'=> 'required',
                'imageurl_id'=> 'nullable'
            ];
            
            $data = $request->validate($rules);
            
            if($request->skill_id){
                $data['skill_id'] = $request->skill_id;
            }

            $data['realiser'] = '0';
            
            //dd($data );
            
            $project = Project::findOrFail($id);
            $project->update($data);

            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin.projects.project.index')
                    ->with('success_message', trans('projects.model_was_updated'));
            }else {
                return redirect()->route('home')
                    ->with('success_message', trans('projects.model_was_updated'));
            }
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('projects.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified project from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $project = Project::findOrFail($id);
            $project->delete();

            return back()
                ->with('success_message', trans('projects.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('projects.unexpected_error')]);
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
        $projet = new Project;


        $projet->user_id = Auth::user()->id;

        $rules = [
            'name' => 'required|string|min:0|max:100',
            'description' => 'required|string|min:3',
            'categorie' => 'string|max:1',
            'file' => ['nullable','file'],
            //'user_id' => 'required',
            'prix' => 'nullable',
            'prixmax' => 'nullable',
            'datexpir' => 'nullable',
            'country_id'=> 'required',
        ];

        $data = $request->validate($rules);

        $data['user_id'] = Auth::user()->id;

        if ($request->has('custom_delete_file')) {
            $data['file'] = null;
        }
        if ($request->hasFile('file')) {
            $data['file'] = $this->moveFile($request->file('file'));
        }



        return $data;
    }
  
    /**
     * Moves the attached file to the server.
     *
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }
    }
    
    public function sendmail(){
        
        $projects = new Project;
            
        $project = $projects->sendMailid();
        
        $user = new User;

        $users = $user->sendNotify();
        
        $id = 0;
        $description = "";
        
        foreach($project as $project){
            $id = $project->id;
            $name = $project->name;
            $description = strip_tags(trim(html_entity_decode(substr($project->description, 0, 225),   ENT_QUOTES, 'UTF-8'), "\xc2\xa0"));
        }
        
        $url = url('offre/'.$id.'/detail');
        
        $data = [
            'greet' => $name,
            'body' => $description,
            'thanks' => 'Merci d\'utiliser notre application',
            'Text' => 'Cliquez ici pour plus de détail',
            'url' => $url
        ];
            
            Notification::route('mail', $users)->notify(new InvoicePaid($data));
            
    }
    
    
    public function updateStatus($id, $publier)
    {
        // Validation
        $validate = Validator::make([
            'id'   => $id,
            'publier'    => $publier
        ], [
            'id'   =>  'required|exists:projects,id',
            'publier'    =>  'required|in:0,1',
        ]);
        
        // If Validations Fails
        if($validate->fails()){
            return redirect()->route('admin.projects.index')->with('error', $validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Update Status
            Project::whereId($id)->update(['publier' => $publier]);

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->route('admin.projects.index')->with('success_message','Offre publiée avec succès!');
        } catch (\Throwable $th) {

            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error_message', 'Une erreur inattendue s’est produite lors de la tentative de traitement de votre demande.');
        }
    }

}
