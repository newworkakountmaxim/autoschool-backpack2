<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\RuleRequest as StoreRequest;
use App\Http\Requests\RuleRequest as UpdateRequest;

use App\Models\Rule;

// Use for my user_func($id)
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Theme;
use App\Models\Question;
// end Use

class RuleCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Rule');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/rule');
        $this->crud->setEntityNameStrings('Правило', 'Правила');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        
        $this->crud->addColumn([
            'name' => 'name',
            'label' => "Название"
        ]); 

        $this->crud->addColumn([  // Select          
           'label' => "Темы", // Table column heading
           'type' => "select_multiple",
           'name' => 'themes', // the method that defines the relationship in your Model
           'entity' => 'themes', // the method that defines the relationship in your Model
           'attribute' => "name", // foreign key attribute that is shown to user
           'model' => "App\Models\Theme", // foreign key model
        ]);
        $this->crud->addColumn([  // Select
           'label' => "Автор",
           'key' => 'user_id',
           'type' => 'select',
           'name' => 'user_id', // the db column for the foreign key
           'entity' => 'user', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\User" // foreign key model
        ]);
        $this->crud->addColumn([
            'name' => 'qty_tickets',
            'label' => "Кол-во билетов"
        ]);
        $this->crud->addColumn([
            'name' => 'qty_qst',
            'label' => "Кол-во вопросов"
        ]);
        $this->crud->addColumn([
            'name' => 'time',
            'label' => "Время"
        ]);
        $this->crud->addColumn([
            'name' => 'ball',
            'label' => "Балы"
        ]);
        $this->crud->addColumn([
            'name' => 'description',
            'label' => "Описание"
        ]);    




        $this->crud->addField([
            'name' => 'name',
            'label' => "Название"
        ]);

        $this->crud->addField([  // Select           
           'label' => "Темы",
           'type' => 'select2_multiple',
           'name' => 'themes', // the method that defines the relationship in your Model           
           'entity' => 'themes', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\Models\Theme", // foreign key model
           'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ]);

        $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
            'label' => "Автор",
            'type' => 'select2',
            'name' => 'user_id', // the method that defines the relationship in your Model
            'entity' => 'user', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\User", // foreign key model
            //'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ]);
        $this->crud->addField([
            'name' => 'qty_tickets',
            'label' => "Кол-во билетов"
        ]);
        $this->crud->addField([
            'name' => 'qty_qst',
            'label' => "Кол-во вопросов"
        ]);
        $this->crud->addField([
            'name' => 'time',
            'label' => "Время"
        ]);
        $this->crud->addField([
            'name' => 'ball',
            'label' => "Балы"
        ]);
        $this->crud->addField([
            'name' => 'description',
            'label' => "Описание"
        ]);

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');
        
        //$this->crud->setShowView('show');
        // $this->crud->setEditView('my-view');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        $this->crud->enableExportButtons();

        $this->crud->addFilter([ // select2 filter
          'name' => 'user_id',
          'type' => 'select2',
          'label'=> 'АВТОР'
        ], function() {
            return \App\User::all()->pluck('name', 'id')->toArray();
        }, function($value) { // if the filter is active
                $this->crud->addClause('where', 'user_id', $value);
        });

        // $this->crud->addFilter([ // select2 filter
        //   'name' => 'theme_id',
        //   'type' => 'select2',
        //   'label'=> 'АВТОР'
        // ], function() {
        //     return \App\Models\Theme::all()->pluck('name', 'id')->toArray();
        // }, function($value) { // if the filter is active
        //         $this->crud->addClause('where', 'theme_id', $value);
        // });
        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();

        //$this->crud->addButtonFromModelFunction('line', 'open_google', 'showItem', 'beginning'); // add a button whose HTML is returned by a method in the CRUD model
        $this->crud->addButton('line', 'getTicketsForRule', 'model_function', 'getTicketsForRule');
        $this->crud->addButton('line', 'showItem', 'model_function', 'showItem');

        //$this->crud->removeButtonFromStack('showItem', 'show');
        // $this->crud->addColumn([
        //    // run a function on the CRUD model and show its return value
        //    'name' => "url",
        //    'label' => "URL", // Table column heading
        //    'type' => "model_function",
        //    'function_name' => 'getSlugWithLink', // the method in your Model
        //    // 'limit' => 100, // Limit the number of characters shown
        // ]);
        

        //$this->crud->enableShow();
        // $this->crud->addShowColumn();
    }

    public function show($id)
    {
        //$this->crud->hasAccessOrFail('show');
        // get entry ID from Request (makes sure its the last ID for nested resources)
        $id = $this->crud->getCurrentEntryId() ?? $id;
        // set columns from db
        $this->crud->setFromDb();
        // cycle through columns
        foreach ($this->crud->columns as $key => $column) {
            // remove any autoset relationship columns
            if (array_key_exists('model', $column) && array_key_exists('autoset', $column) && $column['autoset']) {
                $this->crud->removeColumn($column['name']);
            }
            // remove the row_number column, since it doesn't make sense in this context
            if ($column['type'] == 'row_number') {
                $this->crud->removeColumn($column['name']);
            }
        }
        // get the info for that entry
        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['title'] = trans('backpack::crud.preview').' '.$this->crud->entity_name;
        // remove preview button from stack:line
        // $this->crud->removeButton('preview');
        $this->crud->removeButton('delete');
        $this->crud->removeButton('showItem');
        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getShowView(), $this->data);
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }


     public function destroy($id)
    {
        
        
        $this->crud->hasAccessOrFail('delete');

        // get entry ID from Request (makes sure its the last ID for nested resources)
        $id = $this->crud->getCurrentEntryId() ?? $id;

        $ticket_last = Rule::find($id);
        $ticket_last->themes()->detach();
        
        //var_dump($id);
        //return parent::destroy($this->page);
        return $this->crud->delete($id);

    }

    /**
     * My function generateTickets.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */

    public function generate_tickets($id)
    {
        $rules = Rule::find($id);
        $themes = $rules->themes()->get();

        $arr_of_themes = [];
        foreach ($themes as $theme) {          
          array_push($arr_of_themes, $theme['id']);
        }            
        
        for ($i=0; $i < $rules['qty_tickets']; $i++) {
            
            $tickets = new Ticket();
            $tickets->name = 'Билет по правилу '.$rules['name'];
            $tickets->rule = $rules['id'];
            $tickets->user_id = $rules['user_id'];            
            $tickets->qty_qst = $rules['qty_qst'];    
            $tickets->time = $rules['time'];
            $tickets->ball = $rules['ball'];

            $tickets->save();

            $ticket_last = Ticket::find($tickets->id);
            $questions_by_themes = Question::whereIn('theme_id', $arr_of_themes)->pluck('id')->random($rules['qty_qst'])->toArray();  
            
            $ticket_last->questions()->attach($questions_by_themes);            

        }
        
        return redirect('admin/ticket');
    }
    
}
