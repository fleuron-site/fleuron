<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRequest $request)
    {
        
        $url = redirect()->intended();
        $vv = redirect()->intended('/');

        
        // Vérification si l'email existe déjà dans la table users
        $sql = User::where('email', $request->email)
                            ->get();
        
        //if(!empty($sql)) {
            $user = User::create([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            $user->attachRole($request->role_id);
            event(new Registered($user));
    
            //Auth::login($user);
            if ($user != null) {
                if($vv == $url){
                    Auth::login($user);
                    return redirect(RouteServiceProvider::HOME);
                    }else{
                    Auth::login($user);
                    return $url;
                }
            }else{
            return back()->with('error_message', 'Something went wrong !');
            }
        //}elseif(empty($sql)){
        // L'email existe déjà dans la table
        //return back()->with('error_message', 'L\'email existe déjà dans la table');
        //}

    }   
}
