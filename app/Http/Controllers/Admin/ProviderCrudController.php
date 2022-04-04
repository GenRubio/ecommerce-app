<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProviderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ProviderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Provider::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/provider');
        CRUD::setEntityNameStrings('proveedor', 'proveedores');
    }

    protected function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'name',
                'label' => 'Nombre',
            ],
            [
                'name' => 'url',
                'label' => 'URL',
                'type' => 'text',
            ],
            [
                'name' => 'telephone',
                'label' => 'Teléfono',
                'type' => 'text',
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
        CRUD::setValidation(ProviderRequest::class);

        $this->crud->addFields([
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
                'name' => 'telephone',
                'type' => 'text',
                'label' => 'Teléfono'
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
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
