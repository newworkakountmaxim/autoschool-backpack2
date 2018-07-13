<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\RawruleRequest as StoreRequest;
use App\Http\Requests\RawruleRequest as UpdateRequest;


// Use for my user_func($id)
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Theme;
use App\Models\Question;
use App\Models\Rawrule;
use DB;
use Carbon\Carbon;
// end Use

/**
 * Class RawruleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class RawruleCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Rawrule');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/rawrule');
        $this->crud->setEntityNameStrings('правило SQL', 'правилa SQL');

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
           'label' => "Автор",
           'key' => 'user_id',
           'type' => 'select',
           'name' => 'user_id', // the db column for the foreign key
           'entity' => 'user', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\User" // foreign key model
        ]);

        $this->crud->addColumn([
            'name' => 'rawsql',
            'label' => "правило SQL",
            'type' => 'textarea',
            'attributes' => [
               'placeholder' => 'Some text when empty',
               'class' => 'form-control some-class',
               'rows' => 5
             ] //
        ]); 

        $this->crud->addColumn([
            'name' => 'description',
            'label' => "Описание"
        ]);    


        $this->crud->addField([
            'name' => 'name',
            'label' => "Название"
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
            'name' => 'rawsql',
            'type' => 'textarea',
            'attributes' => [                             
               'rows' => 8
             ],
            'label' => "правило SQL"
        ]); 

        $this->crud->addField([
            'name' => 'description',
            'type' => 'textarea',
            'attributes' => [                       
               'rows' => 4
             ],
            'label' => "Описание"
        ]);    
        //$this->crud->setFromDb();

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

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '=', 'car');
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


        $this->crud->addButton('line', 'getTicketsForSqlRule', 'model_function', 'getTicketsForSqlRule');
        $this->crud->addButton('line', 'showItem', 'model_function', 'showItem');
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


    public function generate_tickets_sql($id)
    {
        $rawrule = Rawrule::find($id);

        $today = Carbon::now();
        
        @eval("return $rawrule->rawsql;");
        //DB::insert('insert into users (email, votes) values (?, ?)', ['john@example.com', '0']);

        return redirect('admin/ticket');
    }
}
