<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmployeeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EmployeeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class EmployeeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Employee');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/employee');
        $this->crud->setEntityNameStrings(trans_choice('admin.employee', 1),trans_choice('admin.employee', 2));
    }

    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'image',
                'prefix' => 'uploads/',
                'width' => '150px',
                'height' => '150px',
            ],
            [
                'name' => 'full_name',
                'label' => 'ФИО',
            ],
            [
                'name' => 'salary',
                'label' => 'Зарплата',
            ],
            [
                'name' => 'address',
                'label' => 'Адрес',
            ],
            [
                'name' => 'iin',
                'label' => 'ИИН',
            ],
            [
                'name' => 'info',
                'label' => 'Доп Инфо',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(EmployeeRequest::class);

        $this->crud->addFields([
            [
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'image',
                'upload' => true,
                'disk' => 'uploads',
            ],
            [
                'name' => 'full_name',
                'label' => 'ФИО',
            ],
            [
                'name' => 'salary',
                'label' => 'Зарплата',
            ],
            [
                'name' => 'address',
                'label' => 'Адрес',
            ],
            [
                'name' => 'iin',
                'label' => 'ИИН',
            ],
            [
                'name' => 'consumers',
                'label' => 'Клиенты',
                'type' => 'select2_multiple',
                'entity' => 'consumers',
                'attribute' => 'full_name',
                'model' => 'App\Models\Consumer',
                'pivot' => true,
            ],
            [
                'name' => 'info',
                'label' => 'Доп Инфо',
                'type' => 'ckeditor',
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
