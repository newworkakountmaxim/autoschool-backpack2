<?php

namespace App\Http\Controllers\Apicontrollers;

use Illuminate\Http\Request;
use App\Models\Rule;
use App\Models\Ticket;
use App\Models\Theme;
use App\Models\Question;

// use resource and requests
use App\Http\Resources\Rule as RuleResource;
//use App\Http\Requests;

class RulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rules = Rule::paginate(10);

        return RuleResource::collection($rules);
        
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = $request->isMethod('put') ? Rule::findOrFail($request->rule_id) : new Rule;

        $rule->id = $request->input('rule_id');
        $rule->name = $request->input('name');
        $rule->user_id = $request->input('user_id');
        $rule->qty_tickets = $request->input('qty_tickets');
        $rule->qty_qst = $request->input('qty_qst');
        $rule->time = $request->input('time');
        $rule->ball = $request->input('ball');
        $rule->description = $request->input('description');

        if($rule->save()){
            return new RuleResource($rule);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rule = Rule::findOrFail($id);
        return new RuleResource($rule);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rule = Rule::findOrFail($id);

        if ($rule->delete()) {
            return new RuleResource($rule);
        }        
    }

    // public function user_func($id)
    // {
    //     $rules = Rule::find($id);
    //     $themes = $rules->themes()->get();

    //     $arr_of_themes = [];
    //     foreach ($themes as $theme) {          
    //       array_push($arr_of_themes, $theme['id']);
    //     }            
        
    //     for ($i=0; $i < $rules['qty_tickets']; $i++) {
            
    //         $tickets = new Ticket();
    //         $tickets->name = 'Билет по правилу '.$rules['name'];
    //         $tickets->rule = $rules['id'];
    //         $tickets->user_id = $rules['user_id'];            
    //         $tickets->qty_qst = $rules['qty_qst'];    
    //         $tickets->time = $rules['time'];
    //         $tickets->ball = $rules['ball'];

    //         $tickets->save();

    //         $ticket_last = Ticket::find($tickets->id);
    //         $questions_by_themes = Question::whereIn('theme_id', $arr_of_themes)->pluck('id')->random($rules['qty_qst'])->toArray();  
            
    //         $ticket_last->questions()->attach($questions_by_themes);            

    //     }
        
    //     return redirect('admin/ticket');
    // }
}
