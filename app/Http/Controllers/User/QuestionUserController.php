<?php

namespace App\Http\Controllers\User;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\User;
use App\Models\Question;
// VALIDATION: change the requests to match your own file names if you need form validation
// use App\Http\Requests\QuestionRequest as StoreRequest;
// use App\Http\Requests\QuestionRequest as UpdateRequest;

class QuestionUserController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Question');
        $this->crud->setRoute('user/question');
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
            'name' => 'img_url', 
            'label' => "Изображение",         
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
            'name' => 'answers',
            'type' => 'closure',
            'function' => function($entry) {
                return '<div style="max-width:300px">'.$entry->answers.'</div>';
            },
            'label' => "Ответы",
        ]);        
        $this->crud->addColumn([  // Select
           'label' => "Theme",
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
        $this->crud->denyAccess(['create', 'update', 'reorder', 'delete']);

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


        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        //$this->crud->enableExportButtons();

        $this->crud->removeButton( 'preview' );
        $this->crud->removeButton( 'create' );
        $this->crud->removeButton( 'update' );
        $this->crud->removeButton( 'revisions' );
        $this->crud->removeButton( 'delete' );

        $this->crud->addButton('line', 'showItem', 'model_function', 'showItemForUser', 'beginning');

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
