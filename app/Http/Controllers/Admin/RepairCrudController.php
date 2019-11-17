<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RepairRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RepairCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class RepairCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Repair');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/repair');
        $this->crud->setEntityNameStrings(trans_choice('admin.repair', 1), trans_choice('admin.repair', 2));
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumns([
            [
                'name' => 'name',
                'label' => 'Название',
            ],
            [
                'name' => 'description',
                'label' => 'Описание',

            ],
            [
                'name' => 'price',
                'label' => 'Цена',
            ],
            [
                'name' => 'time_start',
                'label' => 'Дата начало',
                'type' => "date",
            ],
            [
                'name' => 'time_finish',
                'label' => 'Дата финиша',
                'type' => "date",
            ],
            [
                'name' => 'car_id',
                'label' => 'Автомобиль',
                'type' => 'select',
                'entity' => 'car',
                'attribute' => 'register_id',
                'model' => 'App\Models\Car',
            ],
            [
                'name' => 'employee_id',
                'label' => 'Сотрудник',
                'type' => 'select',
                'entity' => 'employee',
                'attribute' => 'full_name',
                'model' => 'App\Models\Employee',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(RepairRequest::class);

        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Название',
                'type' => 'textarea',
            ],
            [
                'name' => 'description',
                'label' => 'Описание',
                'type' => 'ckeditor'
            ],
            [
                'name' => 'price',
                'label' => 'Цена',
            ],
            [
                'name' => 'time_start',
                'label' => 'Дата начало',
                'type' => 'date_picker',
                'date_picker_options' => [
                  'format' => 'dd-mm-yyyy',
                ],
            ],
            [
                'name' => 'time_finish',
                'label' => 'Дата финиша',
                'type' => 'date_picker',
                  // optional:
                'date_picker_options' => [
                     'todayBtn' => 'linked',
                     'format' => 'dd-mm-yyyy',

                  ],
            ],
            [
                'name' => 'car_id',
                'label' => 'Автомобиль',
                'type' => 'select2',
                'entity' => 'car',
                'attribute' => 'register_id',
                'model' => 'App\Models\Car',
            ],
            [
                'name' => 'employee_id',
                'label' => 'Сотрудник',
                'type' => 'select2',
                'entity' => 'employee',
                'attribute' => 'full_name',
                'model' => 'App\Models\Employee',
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
