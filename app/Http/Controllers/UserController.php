<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Userinfo;
use App\Models\Skill;
use App\Models\Userinfos_skill;
use App\Models\User;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Country;


class UserController extends Controller
{
	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(User $user)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function profile(){

    	$userinfo = new Userinfo;
    	$userinfos = $userinfo->userinf();
		$userinfos = new Userinfo;
        $userinfos = $userinfos->userfo();
		$Countries = Country::all();
		$userinf = new Userinfo;
        $infos = $userinf->uniqInfo();
        $Languages = Language::all();
        $Userinfos = Userinfo::all();

        $userinfos_skills = new Userinfos_skill;
        $userinfos_skill = $userinfos_skills->userinfoSkill();
        $Skills = Skill::pluck('name','id')->all();
        
        $title ="Profile";

    	if (Auth::user()->hasRole('admin')) {
    		return view('admin/profile', compact('title'));
    	} else{
			return view('commun/profile', array('user' => Auth::user()), compact('userinfos', 'Countries', 'infos', 'Languages', 'Userinfos', 'userinfos_skill', 'Skills', 'title') );
    	}
    }
	
	
	public function update_avatar(Request $request){
    	// Handle the user upload of avatar
    	 $user = Auth::user();
			// Gestion de avatar
			$filename ="";
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $filename = $request->file('avatar')->storePublicly('/uploads/profil/', 'public');
            } else {
                $filename = $user->avatar;  // Si aucun fichier n'est téléchargé, on laisse à null
            }

			$user->avatar = $filename;
            $user->save();
		return redirect()->route('profile')->with('success_message', 'Votre photo de profile est mise à jour avec succès!');
    }

	
	public function admin_credential_rules(array $data)
	{
	  $messages = [
		'current-password.required' => 'Veuillez entrer le mot de passe actuel',
		'password.required' => 'Veuillez entrer le mot de passe',
	  ];

	  $validator = Validator::make($data, [
		'current-password' => 'required',
		'password' => 'required|same:password',
		'password_confirmation' => 'required|same:password',     
	  ], $messages);

	  return $validator;
	}  


	public function postCredentials(Request $request)
	{
	  if(Auth::Check())
	  {
		$request_data = $request->All();
		$validator = $this->admin_credential_rules($request_data);
		if($validator->fails())
		{
		  return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
		}
		else
		{  
		  $current_password = Auth::User()->password;           
		  if(Hash::check($request_data['current-password'], $current_password))
		  {           
			$user_id = Auth::User()->id;                       
			$obj_user = User::find($user_id);
			$obj_user->password = Hash::make($request_data['password']);
			$obj_user->save(); 
			return redirect()->route('logout');
		  } 
		  else
		  {           
			$error = array('current-password' => 'Veuillez saisir le mot de passe actuel correct');
			return response()->json(array('error' => $error), 400); 
		  }
		}        
	  }
	  else
	  {
		return redirect()->to('/');
	  }    
	}
	 
}
