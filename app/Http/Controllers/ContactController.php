<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function create()
    {
        $title = 'Contacts';
        return view('contact', ['title' => $title]);
    }
    
    
    public function lancement()
    {
        $title = 'Lancement du fleuron';
        return view('lancement', ['title' => $title]);
    }
    
    
    public function store(Request $request)
    {
        $data = $request->validate([
        	'name' => 'required',
        	'email' => 'required|email',
        	'phone' => 'required',
        	'message' => 'required'
        ]);

        Mail::to('fleuron.tg@gmail.com')->send(new ContactMail($data));
        return redirect()->route('contacts')
                ->with('success_message', 'Votre message a été envoyé avec succès');
    }
    
    
}
