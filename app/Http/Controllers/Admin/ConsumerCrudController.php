<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ConsumerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ConsumerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ConsumerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Consumer');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/consumer');
        $this->crud->setEntityNameStrings(trans_choice('admin.consumer', 1), trans_choice('admin.consumer', 2));
    }

    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'full_name',
                'label' => 'ФИО',
            ],
            [
                'name' => 'phone_number',
                'label' => 'Телефон номера',
            ],
            [
                'name' => 'car_id',
                'label' => 'Машина(ы)',
                'type' => 'select',
                'entity' => 'car',
                'attribute' => 'register_id',
                'model' => 'App\Models\Car',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ConsumerRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->addFields([
            [
                'name' => 'full_name',
                'label' => 'ФИО',
            ],
            [
                'name' => 'phone_number',
                'label' => 'Телефон номера',
            ],
            [
                'name' => 'car_id',
                'label' => 'Машина(ы)',
                'type' => 'select2',
                'entity' => 'car',
                'attribute' => 'register_id',
                'model' => 'App\Models\Car',
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
