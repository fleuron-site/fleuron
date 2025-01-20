<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Userinfo;
use DB;
use Auth;

class Candidature extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidatures';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'messagedif',
                  'duree',
                  'prix',
                  'cv',
                  'user_id',
                  'photo',
                  'project_id'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    //Les projets postulés par chercheur
    public function postules_chercheur(){
            $candidats = Candidature::with('project')
                    ->where('candidatures.user_id', Auth::user()->id)
                    ->orderByDesc('candidatures.created_at')
                    ->get();
                    return $candidats;     
    }
    
    //Verifier si le chercheur à déjà postulé pour ce projet
    public function verif_candidature($id_user, $id_project){
            $candidats = Candidature::where('candidatures.user_id', $id_user)
                    ->where('candidatures.project_id', $id_project)
                    ->get();
                    return $candidats;     
    }
    
    public function postulantParProjet(){
            $candidats = Candidature::join('projects', 'candidatures.project_id', '=', 'projects.id')
                    ->select(DB::raw('count(candidatures.project_id) as job_count, projects.datexpir, candidatures.project_id'))
                    ->where('projects.user_id', Auth::user()->id)
                    ->orderByDesc('projects.created_at')
                    ->groupBy('candidatures.project_id')
                    ->paginate('10');
                    
                    return $candidats;     
        
    }

    public function NbrPostulantParProjet($id){
        $candidats = Candidature::join('projects', 'candidatures.project_id', '=', 'projects.id')
                ->where('projects.id', $id)
                ->groupBy('candidatures.project_id')
                ->count();

                return $candidats;     
    
    }
    
    
    public function totalChercheurs(){
        $candidats = Userinfo::join('role_user', 'userinfos.user_id', '=', 'role_user.user_id')
                    ->join('users', 'userinfos.user_id', '=', 'users.id')
                    ->where('role_user.role_id', 2)
                    ->count();                    
        return $candidats;
    }
    
    public function offreRealiser(){
        $candidats = Candidature::join('projects', 'candidatures.project_id', '=', 'projects.id')
                    ->select('candidatures.*')
                    ->where('projects.realiser', 1)
                    ->where('projects.user_id', Auth::user()->id)
                    ->paginate('20');                    
        return $candidats;
    }
    
    /** Liste des candidats par recruteur */
    public function listeCandidats(){
        $candidats = Candidature::join('projects', 'projects.id', '=', 'candidatures.project_id')
                                ->join('users', 'users.id', '=', 'candidatures.user_id')
                                ->join('userinfos', 'users.id', '=', 'userinfos.user_id')
                                ->select('candidatures.*', 'userinfos.*')
                                ->where('projects.user_id', Auth::user()->id)
                                ->get();
        return $candidats;
    }
    
    /** Liste des candidats par recruteur */
    public function liste($id){
        $candidats = Candidature::join('projects', 'projects.id', '=', 'candidatures.project_id')
                                    ->join('users', 'users.id', '=', 'candidatures.user_id')
                                    ->join('userinfos', 'users.id', '=', 'userinfos.user_id')
                                    ->select('candidatures.*', 'userinfos.*')
                                    ->where('projects.user_id', Auth::user()->id)
                                    ->where('projects.id', $id)
                                    ->get();
        return $candidats;
    }
    
    public function usermail(){
        $email = User::select('id', 'email', 'email_verified_at')
                    ->get();
        return $email;
    }

    //Pour soumetre le cv pré-chargé du prestataire au recruteur si ne joint pas son cv pendant sa candidature  
    public function cv($id){
        $cv = Userinfo::where('user_id', $id)
                    ->select('id','cv')
                    ->first();
        return $cv;
    }
    
    /**
     * Get the User for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    /**
     * Get the project for this model.
     *
     * @return App\Models\Project
     */
    
    public function Project()
    {
        return $this->belongsTo('App\Models\Project','project_id','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    // public function getCreatedAtAttribute($value)
    // {
    //     return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    // }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    // public function getUpdatedAtAttribute($value)
    // {
    //     return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    // }

    public function realiser()
    {
        return $this->hasOne('App\Models\Realiser','userinfo_id','id');
    }

}
