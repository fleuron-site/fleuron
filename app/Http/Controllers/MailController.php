<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignupEmail;

class MailController extends Controller
{
    public static function sendSignupEmail($last_name, $first_name, $email){

    	$data = [
    		'last_name' => $last_name,
    		'email' => $email,
    		'first_name' => $first_name
    	];
    	Mail::to($email)->send(new SignupEmail($data));
    	/**Mail::to($email)->send(new SignupEmail($data)); */   	
    }
}
 