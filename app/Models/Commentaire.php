<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Commentaire extends Model
{
    use HasFactory;
    protected $guarted = [];
    
    protected static function boot(){
        parent::boot();
        
        static::creating(function ($comment){
            $comment->user_id = Auth::user()->id;
        });
        /**static::saving(function ($comment){
            $comment->user_id = Auth::user()->id;
        });*/
    }
    
    
    
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'message',
                  'user_id',
                  'project_id'
              ];

    
    public function commentaire($id){
        $data =Commentaire::where("project_id", $id)
                ->get();
        return $data;
    }
    
    public function show_all(){
        $data = Commentaire::limit('5')
                ->orderBy('created_at', 'desc')
                ->get();
        return $data;
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    
    public function project()
    {
        return $this->belongsTo('App\Models\Project','project_id','id');
    }
}
