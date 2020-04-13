<?php

namespace App\Http\Controllers\Admin;


use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CitiesRequest as StoreRequest;
use App\Http\Requests\CitiesRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class CitiesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CitiesCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Cities');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/cities');
        $this->crud->setEntityNameStrings('город', 'города');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->addColumn([
            'name' => 'name', // the db column name (attribute name)
            'label' => "Город", // the human-readable label for it
            'type' => 'text' // the kind of column to show
        ])->makeFirstColumn();
        $this->crud->addColumn([
            'name' => 'address', // the db column name (attribute name)
            'label' => "Адрес", // the human-readable label for it
            'type' => 'text' // the kind of column to show
        ])->afterColumn('name');
        $this->crud->addColumn([
            'name' => 'phone', // the db column name (attribute name)
            'label' => "Номер телефона", // the human-readable label for it
            'type' => 'text' // the kind of column to show
        ])->afterColumn('address');

        // add asterisk for fields that are required in CitiesRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        //Поля для редактирования
        $this->crud->addField([
            'name' => 'name', // JSON variable name
            'label' => "Название города",// human-readable label for the input
        ], 'update');
        $this->crud->addField([
            'name' => 'address', // JSON variable name
            'label' => "Адрес", // human-readable label for the input
        ], 'update');
        $this->crud->addField([
            'name' => 'phone', // JSON variable name
            'label' => "Номер телефона", // human-readable label for the input
        ], 'update');
        $this->crud->addField([
            'name' => 'email', // JSON variable name
            'label' => "Адрес почты", // human-readable label for the input
            'type' => 'email'
        ], 'update');
        $this->crud->addField([
            'name' => 'socials',
            'label' => 'Социалки',
            'type' => 'table',
            'entity_singular' => 'socials', // used on the "Add X" button
            'columns' => [
                'name' => 'Название',
                'link' => 'Ссылка',
            ],
            'max' => 5, // maximum rows allowed in the table
            'min' => 0, // minimum rows allowed in the table
        ], 'update');
        $this->crud->addField([
            'name' => 'work_time',
            'label' => 'Режим работы',
            'type' => 'table',
            'entity_singular' => 'work_time', // used on the "Add X" button
            'columns' => [
                'day' => 'День недели',
                'since' => 'Начало смены',
                'before' => "Конец смены"
            ],
            'max' => 5, // maximum rows allowed in the table
            'min' => 0, // minimum rows allowed in the table
        ], 'update');

        $this->crud->enableDetailsRow();
        $this->crud->allowAccess('details_row');
        $this->crud->allowAccess('update');
    }

    public function showDetailsRow($id){
        $this->crud->hasAccessOrFail('details_row');
        $id = $this->crud->getCurrentEntryId() ?? $id;

        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;

        $s =  $this->data['entry'];

        $socials = json_decode($s['socials']);
        $work_time = json_decode($s['work_time']);

        //'entry'=> $this->crud->getEntry($id),
        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getDetailsRowView(), ['email'=> $s['email'], 'social'=> $socials, 'workTime' => $work_time]);
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
