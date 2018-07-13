<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Rule extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'rules';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name', 'user_id', 'qty_tickets', 'qty_qst', 'time', 'ball', 'description'];
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

    public function themes()
    {
        return $this->belongsToMany('App\Models\Theme');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    public function openGoogle($crud = false)
    {
        return '<a class="btn btn-xs btn-success" target="_blank" href="http://google.com?q='.urlencode($this->user->name).'" data-toggle="tooltip" title="Just a demo custom button."><i class="fa fa-search"></i> Google it</a>';
        //return $this;
    }

    public function showItem($crud = false)
    {
        return '<a class="btn btn-sm  btn-success" href="'.url('/admin/rule/'.$this->id).'" data-toggle="tooltip" title="ПРОСМОТРЕТЬ"><i class="fa fa-search"></i> ПРОСМОТРЕТЬ</a>';        
    }
    public function getTicketsForRule() {
        //return '<a href="'.url($this->ball).'" target="_blank">'.$this->ball.'</a>';
        return '<a class="btn btn-sm btn-primary" href="'.url('/admin/rule/'.$this->id.'/generate_tickets').'" target="_blank"><strong>Выполнить правило : '.$this->name.'</strong></a>';
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
