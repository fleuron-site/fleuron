<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->getData($request);
        
        if (Auth::check()) {
            
            Commentaire::create([
                'message' => $data['message'],
                'user_id' => Auth::user()->id,
                'project_id' => $data['project_id']
            ]);
                
            return back()
                ->with('success_message', 'Votre commentaire a été ajouté avec succès!');
            
        }else{
            
            // Stocker le contenu du commentaire dans la session
            Session::flash('comment_content', $request->message);
            
            return back()
                ->with('error_message', 'Vous devriez vous connecter avant de laisser un commentaire s\'il vous plaît!');
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        //
    }
    
     protected function getData(Request $request)
    {
        $rules = [
                'message' => 'required|string',
                'project_id' => 'required'
        ];
        
        $data = $request->validate($rules);


        return $data;
    }
}
