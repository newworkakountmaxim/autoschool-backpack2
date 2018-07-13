<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Traits\ConnectPusherTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\User;


// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ThemeRequest as StoreRequest;
use App\Http\Requests\ThemeRequest as UpdateRequest;

class ThemeCrudController extends CrudController
{
    //use ConnectPusherTrait;

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->connectPusher();
    // }

    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Theme');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/theme');
        $this->crud->setEntityNameStrings('Тема', 'Темы');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        //$this->crud->setFromDb();
        $this->crud->addColumn([
            'name' => 'name',
            'label' => "Название темы"
        ] );
        $this->crud->addColumn([
            'name' => 'description',
            'label' => "Описание темы"
        ] );
        $this->crud->addColumn([  // Select
           'label' => "Пользователь(автор)",
           'type' => 'select',
           'name' => 'user_id', // the db column for the foreign key
           'entity' => 'user', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\User" // foreign key model
        ]);

        $this->crud->addField([
            'name' => 'name',
            'label' => "Название темы"
        ]);

        $this->crud->addField([
            'name' => 'description',
            'label' => "Описание темы"
        ]);

        $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
            'label' => "Пользователь(автор)",
            'type' => 'select2',
            'name' => 'user_id', // the method that defines the relationship in your Model
            'entity' => 'user', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\User", // foreign key model
            //'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ]);

        //$this->crud->addButtonFromModelFunction('line', 'open_google', 'openGoogle', 'beginning'); // add a button whose HTML is returned by a method in the CRUD model
        //$this->crud->enableShow();
       // $this->crud->addShowColumn();

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

        $this->crud->addFilter([ // select2 filter
          'name' => 'user_id',
          'type' => 'select2',
          'label'=> 'АВТОР'
        ], function() {
            return \App\User::all()->pluck('name', 'id')->toArray();
        }, function($value) { // if the filter is active
                $this->crud->addClause('where', 'user_id', $value);
        });

        // Это фильтры!! Они заработают как только отформатирую дату
        $this->crud->addFilter([ // daterange filter
           'type' => 'date_range',
           'name' => 'from_to',
           'label'=> 'Промежуток дат'
         ],
         true,
         function($value) { // if the filter is active, apply these constraints
           $dates = json_decode($value);
           $this->crud->addClause('where', 'created_at', '>=', $dates->from);
           $this->crud->addClause('where', 'created_at', '<=', $dates->to);
         });

          $this->crud->addFilter([ // date filter
          'type' => 'date',
          'name' => 'date',
          'label'=> 'Дата'
        ],
        false,
        function($value) { // if the filter is active, apply these constraints
           $this->crud->addClause('where', 'created_at', '=', $value);
        });
        //Конец. Это фильтры!! Они заработают как только отформатирую дату

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        $this->crud->enableExportButtons();

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
    }

    public function store(StoreRequest $request)
    {

        $input = $request->only('name','description', 'user_id');
        // Theme::create($input);
        // redirect('admin/theme');

        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        

          // $data['message'] = $input['name'];
          // $this->pusher->trigger('my-channel', 'my-event', $data);

        return $redirect_location;
    }

    /**
     * @param UpdateRequest $request
     * @return mixed
     */
    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
