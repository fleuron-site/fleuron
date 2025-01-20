<?php

namespace App\Models;
use DB;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Userinfos_skill extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'userinfos_skills';

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
                  'userinfo_id',
                  'skill_id'
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
    
    public function userinfoSkill(){

        $userinfos = DB::table('userinfos_skills')
                    ->join('userinfos', 'userinfos.id', '=', 'userinfos_skills.userinfo_id')
                    ->where('userinfos.user_id', Auth::user()->id)
                    ->get();
        return $userinfos;
    }



    public function userinfoSkillListe(){

        $userinfos = DB::table('userinfos_skills')
                    ->select('skills.id', 'skills.name', 'skills.description', 'userinfos_skills.id as iid')
                    ->join('userinfos', 'userinfos.id', '=', 'userinfos_skills.userinfo_id')
                    ->join('skills', 'skills.id', '=', 'userinfos_skills.skill_id')
                    ->where('userinfos.user_id', Auth::user()->id)
                    ->get();
        return $userinfos;
    }
    
    /**
     * Get the Userinfo for this model.
     *
     * @return App\Models\Userinfo
     */
    public function Userinfo()
    {
        return $this->belongsTo('App\Models\Userinfo','userinfo_id','id');
    }

    /**
     * Get the Skill for this model.
     *
     * @return App\Models\Skill
     */
    public function Skill()
    {
        return $this->belongsTo('App\Models\Skill','skill_id','id');
    }



}
