<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Rawrule extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'rawrules';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name', 'user_id', 'rawsql', 'description'];
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
    public function showItem($crud = false)
    {
        return '<a class="btn btn-sm  btn-success" href="'.url('/admin/rawrule/'.$this->id).'" data-toggle="tooltip" title="ПРОСМОТРЕТЬ"><i class="fa fa-search"></i> ПРОСМОТРЕТЬ</a>';        
    }
    public function getTicketsForSqlRule() {
        //return '<a href="'.url($this->ball).'" target="_blank">'.$this->ball.'</a>';
        return '<a class="btn btn-sm btn-primary" href="'.url('/admin/rawrule/'.$this->id.'/generate_tickets_sql').'" target="_blank"><strong>Выполнить правило : '.$this->name.'</strong></a>';
    }

}
