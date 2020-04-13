<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\MenuRequest as StoreRequest;
use App\Http\Requests\MenuRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class MenuCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class MenuCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Menu');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/menu');
        $this->crud->setEntityNameStrings('Меню', 'Меню');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn([
            'name' => 'name', // the db column name (attribute name)
            'label' => "Название меню", // the human-readable label for it
            'type' => 'text' // the kind of column to show
        ]);
        $this->crud->addColumn([
            'label' => "Город",
            'type' => 'select',
            'name' => 'city_id',
            'entity' => 'cities', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Cities",
        ]);

        // add asterisk for fields that are required in CitiesRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        //Поля для редактирования
        $this->crud->addField([
            'name' => 'name', // JSON variable name
            'label' => "Название меню",// human-readable label for the input
            'type' => 'text',
        ]);
        $this->crud->addField([
            'label' => "Выбор города",
            'type' => 'select',
            'name' => 'city_id',
            'entity' => 'cities', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Cities",
        ]);
        $this->crud->addField([
            'name' => 'pages_array', // JSON variable name
            'label' => "Страницы меню",// human-readable label for the input
            'type' => 'select_and_order',
            'options' => Page::get()->pluck('name','id')->toArray(),
        ]);
        $this->crud->allowAccess('update');
        $this->crud->allowAccess('create');

        // add asterisk for fields that are required in MenuRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
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
