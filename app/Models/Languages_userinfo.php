<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Languages_userinfo extends Model
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
    protected $table = 'languages_userinfos';

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
                  'language_id',
                  'userinfo_id',
                  'level_oral',
                  'level_written'
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
    
    /**
     * Get the Language for this model.
     *
     * @return App\Models\Language
     */
     
     
     public function lang_userinfo(){
     $languagesUserinfos = Languages_userinfo::join('languages', 'languages.id', '=', 'languages_userinfos.language_id')
                                            ->join('userinfos', 'userinfos.id', '=', 'languages_userinfos.userinfo_id')
                                            ->select('languages_userinfos.id', 'languages_userinfos.level_oral', 'languages_userinfos.level_written', 'languages.name')
                                            ->where('userinfos.user_id', Auth::user()->id)
                                            ->get();
                                    return $languagesUserinfos;
     }
     
     
    public function Language()
    {
        return $this->belongsTo('App\Models\Language','language_id','id');
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



}
