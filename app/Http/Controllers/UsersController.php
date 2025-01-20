<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UserRequest;
use Exception;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * Display a listing of the users.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate(25);
        $roles = Role::all();

        return view('admin.users.index', compact('users','roles'));
    }
    
    
    public function newsletter(Request $request){
    
        $sql = User::where('email', $request->email)
                        ->get();
                        
        //dd($sql->count());

        if($sql->count() > 0) {
            $upd = User::where('email', $request->email)->first();
            $upd->update(['news' => '1']);
            
            return redirect()->back()->with('success_message', trans('Votre demande est bien pris en considération!'));
        }else{
            return redirect()->route('register')->with('error_message', trans('Vous devez vous inscrire avant de pouvoir mener cette action!'));
        }
        
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::all();  
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a new user in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(UserRequest $request)
    {
        try {
            
            /**$data = $this->getData($request);*/
            
            $data = $request->all();

            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            }
            
            $user = User::create($data);
            $user->attachRole($request->role_id);
            event(new Registered($user));
            return redirect()->route('admin.users.user.index')
                ->with('success_message', 'Vous avez été inscrit avec succès');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Votre inscription n\'a pas marché, veillez resayer s\'il vous plaît !']);
        }
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        

        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified user in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, UserRequest $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $user = User::findOrFail($id);
            $user->update($data);

            return redirect()->route('admin.users.user.index')
                ->with('success_message', trans('users.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('users.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified user from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('admin.users.user.index')
                ->with('success_message', trans('users.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('users.unexpected_error')]);
        }
    }

}
