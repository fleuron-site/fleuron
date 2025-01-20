<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use DB;


class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;
    // Determines which database table to use
        protected $table = 'users';
   
    /**
     * Route notifications for the mail channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return array|string
     */
    public function routeNotification($notification)
    {
        if ($this->newss === 1) { // Vérifie si l'envoie de newsletter est activé sur l'utilisateur
            return [$this->email => $this->last_name]; //Retourne seulement l'email et le nom de l'utilisateur
        }
        
        return null; // Retourne null pour ne pas envoyer de notification si le newss n'est pas 1
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'newss',
        'password',
    ];
    
    public function sendNotify(){
        
        $users = DB::table('users')
            ->select('email')
            ->where('newss', '1')
            ->get();
            
        return $users;
    }
                    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function Project()
    {
        return $this->hasOne('App\Models\Project','user_id','id');
    }
    
    public function Candidature() 
    {
        return $this->hasOne('App\Models\Candidature','user_id','id');
    }

    public function Userinfo()
    {
        return $this->hasOne('App\Models\Userinfo','user_id','id');
    }

    
}
