<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Skill;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Userinfo;
class Userinfo extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'userinfos';

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
                  'tel',
                  'vacant',
                  'about',
                  'countrie_id',
                  'user_id',
                  'cv'
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

    public function userinf(){

        $userinfos = DB::table('userinfos')
                    ->where('userinfos.user_id', Auth::user()->id)
                    ->get();
        return $userinfos;
    }

    
    /**
     * Get the Country for this model.
     *
     * @return App\Models\Country
     */
    public function Country()
    {
        return $this->belongsTo('App\Models\Country','countrie_id','id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class)->withTimestamps();
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
     * Get the languagesUserinfo for this model.
     *
     * @return App\Models\LanguagesUserinfo
     */
    public function languagesUserinfo()
    {
        return $this->hasOne('App\Models\LanguagesUserinfo','userinfo_id','id');
    }

    /**
     * Get the userinfosSkill for this model.
     *
     * @return App\Models\UserinfosSkill
     */
     public function userinfosSkill()
    {
        return $this->hasOne('App\Models\UserinfosSkill','userinfo_id','id');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
    */

    public function userinfo()
    {
        $id = DB::table('userinfos')
            ->join('users', 'users.id', '=', 'userinfos.user_id')
            ->select('userinfos.user_id', 'userinfos.id')
            ->where('userinfos.user_id', Auth::user()->id)
            ->get();

            return $id;
    }
    
    
    
    

    public function uniqInfo(){
        $id = DB::table('userinfos')
            ->select('id')
            ->where('userinfos.user_id', Auth::user()->id)
            ->get();

            return $id;
    }

    public function infoIntern()
    {
        $id = DB::table('userinfos')
            ->join('users', 'users.id', '=', 'userinfos.user_id')
            ->join('countries', 'countries.id', '=', 'userinfos.countrie_id')
            ->select('*')
            ->get();

            return $id;
    }

    public function userfo()
    {
        $id = Userinfo::where('userinfos.user_id', Auth::user()->id)
            ->get();
            return $id;
    }
}
