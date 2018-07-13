<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\User;
use App\Models\Question;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\QuestionRequest as StoreRequest;
use App\Http\Requests\QuestionRequest as UpdateRequest;

class QuestionCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Question');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/question');
        $this->crud->setEntityNameStrings('вопрос', 'вопросы');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        //$this->crud->setFromDb();]
        $this->crud->addColumn([
            'name' => 'name',
            'label' => "Название",
        ]);
        
        $this->crud->addColumn([
            'name' => 'img_url', // The db column name
            'label' => "Изображение", // Table column heading
            // 'type' => 'image',                      
            // 'height' => '80px',
            // 'width' => '80px'
            'type' => 'closure',
            'function' => function($entry) {
                return '<img style="width:80px" src="'.url($entry->img_url).'">';
            },
        ]);        
        $this->crud->addColumn([
            'name' => 'qty_answ',
            'label' => "Кол-во ответов",
        ]);
        $this->crud->addColumn([
            'name' => 'cor_answ',
            'label' => "№ правильного",
        ]);
        $this->crud->addColumn([
            'name' => 'answers',
            'type' => 'closure',
            'function' => function($entry) {
                return '<div style="max-width:300px">'.$entry->answers.'</div>';
            },
            'label' => "Ответы",
        ]);

        $this->crud->addColumn([  // Select
           'label' => "Автор",
           'type' => 'select',
           'name' => 'user_id', // the db column for the foreign key
           'entity' => 'user', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\User" // foreign key model
        ]);

        $this->crud->addColumn([  // Select
           'label' => "Тема",
           'type' => 'select',
           'name' => 'theme_id', // the db column for the foreign key
           'entity' => 'theme', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\Models\Theme" // foreign key model
        ]);
        
        $this->crud->addColumns(['pdd_links', 'feature', 'comments'] ); 
        $this->crud->addColumn([
            'name' => 'pdd_links',
            'label' => "Ссылки на ПДД",
        ]);
        $this->crud->addColumn([
            'name' => 'feature',
            'label' => "Доп. обозн.",
        ]);
        $this->crud->addColumn([
            'name' => 'comments',
            'label' => "Комментарии",
        ]);

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        $this->crud->addField([
            'name' => 'name',
            'label' => "Название вопроса"
        ]);
        $this->crud->addField([
            'name' => 'img_url',
            'label' => "Изображение вопроса",
            'type' => 'browse'
        ]);
        $this->crud->addField([
            'name' => 'qty_answ',
            'label' => "Количество ответов"
        ]);
        $this->crud->addField([
            'name' => 'cor_answ',
            'label' => "Правильный ответ"
        ]);
        $this->crud->addField([
            'name' => 'answers',
            'label' => "Ответы"
        ]);
        // //////////////////////////
        $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
            'label' => "Автор",
            'type' => 'select2',
            'name' => 'user_id', // the method that defines the relationship in your Model
            'entity' => 'user', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\User", // foreign key model
            //'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ]);

        $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
            'label' => "Тема",
            'type' => 'select2',
            'name' => 'theme_id', // the method that defines the relationship in your Model
            'entity' => 'theme', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Theme", // foreign key model
            //'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ]);
        ////////////////////////
        $this->crud->addField([
            'name' => 'pdd_links',
            'label' => "Ссылки"
        ]);
        $this->crud->addField([
            'name' => 'feature',
            'label' => "Дополнительно"
        ]);
        $this->crud->addField([
            'name' => 'comments',
            'label' => "Комментарии"
        ]);
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
          'name' => 'theme_id',
          'type' => 'select2',
          'label'=> 'ТЕМА'
        ], function() {
            return \App\Models\Theme::all()->pluck('name', 'id')->toArray();
        }, function($value) { // if the filter is active
                $this->crud->addClause('where', 'theme_id', $value);
        });
// ////////////////////////////////////////
        $this->crud->addFilter([ // select2 filter
          'name' => 'user_id',
          'type' => 'select2',
          'label'=> 'АВТОР'
        ], function() {
            return \App\User::all()->pluck('name', 'id')->toArray();
        }, function($value) { // if the filter is active
                $this->crud->addClause('where', 'user_id', $value);
        });
// /////////////////////////////////////




        // $this->crud->addFilter([ // select2 filter
        //   'name' => 'qty_answ',
        //   'type' => 'select2',
        //   'label'=> 'qty_answers'
        // ], function($value) { // if the filter is active
        //         $this->crud->addClause('where', 'qty_answ', $value);
        // });

        

        // $this->crud->addFilter([ // simple filter
        //   'type' => 'text',
        //   'name' => 'eqty_answers',
        //   'label'=> 'Description'
        // ], 
        // true, 
        // function($value) { // if the filter is active
        //     $this->crud->addClause('where', 'qty_answers', 'LIKE', "%$value%");
        // } );

        // $this->crud->addFilter([ // select2_multiple filter
        //   'name' => 'theme_id',
        //   'type' => 'select2_multiple',
        //   'label'=> 'Tags'
        // ],
        // //true,
        // function() { // the options that show up in the select2
        //     return \App\Models\Theme::all()->pluck('name', 'id')->toArray();
        // }, function($values) { // if the filter is active
        //     foreach (json_decode($values) as $key => $value) {
        //         $this->crud->query = $this->crud->query->whereHas('theme_id', function ($query) use ($value) {
        //             $query->where('theme_id', $value);
        //         });
        //     }
        // });



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
         $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        $this->crud->enableExportButtons();

        $this->crud->addButton('line', 'showItem', 'model_function', 'showItem', 'beginning');

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
        $this->crud->removeButton('preview');
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
}
