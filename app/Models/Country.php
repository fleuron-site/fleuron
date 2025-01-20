<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

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
                  'namecountry',
                  'codetel'
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
     * Get the userinfo for this model.
     *
     * @return App\Models\Userinfo
     */
    public function userinfo()
    {
        return $this->hasOne('App\Models\Userinfo','countrie_id','id');
    }
    
    public function Project()
    {
        return $this->hasOne('App\Models\Project','country_id','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }
    */
    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }
    */
}
