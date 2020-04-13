<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PromoRequest as StoreRequest;
use App\Http\Requests\PromoRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class PromoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PromoCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Promo');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/promo');
        $this->crud->setEntityNameStrings('Промо', 'Промо');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn([
            'name' => 'name', // the db column name (attribute name)
            'label' => "Название", // the human-readable label for it
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

        // add asterisk for fields that are required in PromoRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        //Поля для редактирования
        $this->crud->addField([
            'name' => 'name', // JSON variable name
            'label' => "Название промо",// human-readable label for the input
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
            'name' => 'url', // JSON variable name
            'label' => "Ссылка на страницу",// human-readable label for the input
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'file_url', // JSON variable name
            'label' => "Ссылка на файл",// human-readable label for the input
            'type' => 'browse_multiple',
            'multiple' => false,
        ]);
        $this->crud->allowAccess('update');
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
