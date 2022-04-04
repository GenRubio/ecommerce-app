<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup()
    {
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');
    }

    protected function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'name',
                'label' => 'Nombre',
            ],
            [
                'name' => 'price',
                'label' => 'Precio',
            ],
            [
                'name' => 'shipping_price',
                'label' => 'Precio de envío',
            ],
            [
                'name' => 'return_price',
                'label' => 'Precio de devolución',
            ],
            [
                'name' => 'stock',
                'label' => 'Stock',
            ],
            [
                'name' => 'active',
                'label' => 'Activo',
                'type' => 'check',
            ]
        ]);
    }

    protected function tabGeneral()
    {
        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Nombre',
                'type' => 'text',
                'tab' => 'General',
            ],
            [
                'name' => 'mark_id',
                'label' => 'Marca',
                'type' => 'select2',
                'entity' => 'mark',
                'attribute' => 'name',
                'tab' => 'General',
            ],
            [
                'name' => 'stock',
                'label' => 'Stock',
                'type' => 'number',
                'default' => 0,
                'tab' => 'General',
            ],
            [
                'name' => 'price',
                'label' => 'Precio',
                'type' => 'number',
                'attributes' => [
                    "step" => "any"
                ],
                'prefix' => "€",
                'default' => '0',
                'tab' => 'General',
            ],
            [
                'name' => 'shipping_price',
                'label' => 'Precio de envío',
                'type' => 'number',
                'attributes' => [
                    "step" => "any"
                ],
                'prefix' => "€",
                'default' => '0',
                'tab' => 'General',
            ],
            [
                'name' => 'return_price',
                'label' => 'Precio de devolución',
                'type' => 'number',
                'attributes' => [
                    "step" => "any"
                ],
                'prefix' => "€",
                'default' => '0',
                'tab' => 'General',
            ],
            [
                'name' => 'active',
                'label' => 'Activo',
                'type' => 'radio',
                'options'     => [
                    0 => "No",
                    1 => "Si"
                ],
                'default' => 1,
                'inline' => true,
                'tab' => 'General',
            ]
        ]);
    }

    protected function tabDescription()
    {
        $this->crud->addFields([
            [
                'name' => 'description',
                'label' => 'Descripción',
                'type' => 'ckeditor',
                'options'       => [
                    'removePlugins' => 'resize,maximize,pasteFromWordCleanupFile',
                ],
                'tab' => 'Descripcion',
            ],
            [
                'name' => 'features',
                'label' => 'Características',
                'type' => 'ckeditor',
                'tab' => 'Descripcion',
            ],
            [
                'name' => 'specifications',
                'label' => 'Especificaciones',
                'type' => 'ckeditor',
                'tab' => 'Descripcion',
            ],
        ]);
    }

    protected function tabImages()
    {
        $this->crud->addFields([
            [
                'name' => 'main_image',
                'label' => 'Imagen principal',
                'type' => 'image',
                'tab' => 'Imagenes',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductRequest::class);
        $this->tabGeneral();
        $this->tabDescription();
        $this->tabImages();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
