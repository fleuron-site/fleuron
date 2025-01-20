<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realiser extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidature_id',
        'project'
    ];


    
    public function Candidature()
    {
        return $this->belongsTo('App\Models\Candidature','candidature_id','id');
    }

    public function Project()
    {
        return $this->belongsTo('App\Models\Project','project_id','id');
    }
}
