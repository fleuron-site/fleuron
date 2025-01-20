<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Userinfo;
use DB;

class Skill extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'skills';

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
                  'picture'
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
    
     
    public function skills(){

        $skills = DB::table('skills')
                    ->get();
        return $skills;
    }
    
    /**
     * Get the userinfosSkill for this model.
     *
     * @return App\Models\UserinfosSkill
     */
    /**public function userinfosSkill()
    {
        return $this->hasOne('App\Models\UserinfosSkill','skill_id','id');
    }*/


     public function userinfos()
    {
        return $this->belongsToMany(Userinfo::class)->withTimestamps();
    }

    

    /**
     * Get the project for this model.
     *
     * @return App\Models\Project
     */
    public function project()
    {
        return $this->hasOne('App\Models\Project','skill_id','id');
    }

}
