<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Skill;
use App\Models\Imageurl;
use App\Models\Country;
use Carbon\Carbon;

class Project extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

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
                  'name',
                  'description',
                  'categorie',
                  'file',
                  'country_id',
                  'prix',
                  'prixmax',
                  'datexpir',
                  'realiser',
                  'skill_id',
                  'imageurl_id',
                  'user_id'
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
    
    public function pointParUser(){

        $projects = DB::table('projects')
                    ->select('projects.user_id', 'users.last_name', 'users.first_name', 'users.avatar', 'users.email', DB::raw('COUNT(CASE WHEN projects.categorie = "P" THEN "projects.id" ELSE NULL END) as "nbP", COUNT(CASE WHEN projects.categorie = "E" THEN "projects.id" ELSE NULL END) as "nbE"'))
                    ->join('users', 'users.id', '=', 'projects.user_id')
                    ->groupBy('projects.user_id', 'users.last_name', 'users.first_name', 'users.avatar', 'users.email')
                    ->get();
        return $projects;
    }
    
    public function project(){
        $projects = Project::where('projects.user_id', Auth::user()->id)
                    ->where('categorie', 'P')
                    ->orWhere('categorie', 'EE')
                    ->paginate('20');
        return $projects;
    }
    
    
    public function projectRealiser(){
        $projects = DB::table('projects')
                    ->where('categorie', 'P')
                    ->where('realiser', 1)
                    ->where('projects.user_id', Auth::user()->id)
                    ->get();
        return $projects;
    }
    
    public function projectNonPublier(){
        $projects = DB::table('projects')
                    ->join('users', 'users.id', '=', 'projects.user_id')
                    ->where('publier', '0')
                    ->where('categorie', 'P')
                    ->where('projects.user_id', Auth::user()->id)
                    ->get();
        return $projects;
    }


    public function publierOffre(){
        $projects = DB::table('projects')
                    ->join('skills', 'skills.id', '=', 'projects.skill_id')
                    ->select('projects.id', 'projects.description','projects.cloturer', 'projects.name','projects.prix', 'projects.prixmax', 'skills.picture', 'skills.name as namee', 'projects.created_at', 'projects.categorie')
                    ->where('projects.publier', 1)
                    ->where('projects.datexpir', '>=',  Carbon::now()->toDateString())
                    ->where('categorie', 'P')
                    ->orderBy('created_at', 'desc')
                    ->get();                    
        return $projects;
    }
    
    public function sendProject(){
        $projects = Project::orderBy('created_at', 'desc')
                    ->limit(1)
                    ->get();
                    
                return $projects;
    }

    
    
    public function detail($id){
        $projects = Project::findOrFail($id);                   
        return $projects;
    }
    
    /**
     * Get the User for this model.
     *
     * @return App\Models\User
     */
    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    
    public function Imageurl()
    {
        return $this->belongsTo('App\Models\Imageurl','imageurl_id','id');
    }
    
    /**
     * Get the User for this model.
     *
     * @return App\Models\Country
     */
    public function Country()
    {
        return $this->belongsTo('App\Models\Country','country_id','id');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
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

    public function skill()
    {
        return $this->belongsTo('App\Models\Skills','skill_id','id');
    }
    
    public function pour_entete(){
        $projects = DB::table('projects')
                    ->join('skills', 'skills.id', '=', 'projects.skill_id')
                    ->join('countries', 'countries.id', '=', 'projects.country_id')
                    ->select('projects.id', 'countries.namecountry','projects.name as projectname','projects.created_at')
                    ->where('projects.publier', 1)
                    ->where('projects.datexpir', '>=',  Carbon::now()->toDateString())
                    //->where('countries.namecountry', $pays)
                    ->orderBy('created_at', 'desc')
                    ->get();
                    
            return $projects;
    }

    
}
