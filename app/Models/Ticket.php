<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Ticket extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'tickets';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name', 'rule', 'user_id', 'qty_qst', 'question_id', 'time', 'ball'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // public function question()
    // {
    //     return $this->belongsTo('App\Models\Question');
    // }
    // public function questions()
    // {
    //     return $this->belongsTo('App\Models\Question');
    // }

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

     public function showItem($crud = false)
    {
        return '<a class="btn  btn-success" href="'.url('/admin/ticket/'.$this->id).'" data-toggle="tooltip" title="ПРОСМОТРЕТЬ"><i class="fa fa-search"></i> ПРОСМОТРЕТЬ</a>';        
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
