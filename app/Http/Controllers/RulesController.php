<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;
use App\Models\Ticket;
use App\Models\Question;

class RulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        
        $rules = Rule::find($id)->only('id','name','user_id','qty_tickets','qty_qst','time','ball');

        

        for ($i=0; $i < $rules['qty_tickets']; $i++) {
            //echo $rules['name'] ; 

            $tickets = new Ticket();
            $tickets->name = 'Билет по правилу'.$rules['id'];
            $tickets->rule = $rules['id'];
            $tickets->user_id = $rules['user_id'];
            
            $tickets->qty_qst = $rules['qty_qst'];    
            $tickets->time = $rules['time'];
            $tickets->ball = $rules['ball'];

            $tickets->save();
            
            
            // $q = Question::all()->toArray();
            
            // foreach ($q as $q_id) {
            //     $res =$q_id['id'].',';                
            // }
            // echo "<pre>";
            // var_dump($q);
            // echo "<pre>";

            $t = Ticket::find($tickets->id);
            $t->questions()->attach([1,2,3]);

            
            

        }
        return redirect('admin/ticket');
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    public function user_func()
    {
        return 'id';
    }
}
