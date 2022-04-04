<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MarkRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class MarkCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Mark::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/mark');
        CRUD::setEntityNameStrings('marca', 'marcas');
    }

    protected function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'name',
                'label' => 'Nombre',
            ],
            [
                'name' => 'active',
                'label' => 'Activo',
                'type' => 'check',
            ]
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(MarkRequest::class);

        $this->crud->addFields(
            [
                [
                    'name' => 'name',
                    'type' => 'text',
                    'label' => 'Nombre'
                ],
                [
                    'name' => 'url',
                    'type' => 'text',
                    'label' => 'URL'
                ],
                [
                    'name' => 'active',
                    'type' => 'radio',
                    'options'     => [
                        0 => "No",
                        1 => "Si"
                    ],
                    'default' => 1,
                    'inline' => true
                ]
            ]
        );
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
