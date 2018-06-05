<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Question extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'questions';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name', 'img_url', 'qty_answ', 'cor_answ', 'answers', 'user_id', 'theme_id', 'pdd_links', 'feature', 'comments'];
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
    public function theme()
    {
        return $this->belongsTo('App\Models\Theme');
    }

    // $qu->tickets()->attach(1) // add
    // $qu->tickets()->detach(1); // delete
    // $qu->tickets()->sync([1, 2, 3]);

    // $qu = App\Models\Question::where('id', 1)
    // ->with('tickets')
    // ->with('user')
    // ->limit(10)
    // ->get();

    public function tickets()
    {
        return $this->belongsToMany('App\Models\Ticket', 'questions_tickets');
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
}
