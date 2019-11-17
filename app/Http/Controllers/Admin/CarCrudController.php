<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CarCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CarCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Car');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/car');
        $this->crud->setEntityNameStrings(trans_choice('admin.car', 1),trans_choice('admin.car', 2));
    }

    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'model',
                'label' => 'Модель',
            ],
            [
                'name' => 'brand',
                'label' => 'Брэнд',
            ],
            [
                'name' => 'prod_year',
                'label' => 'Год выпуска',
                'type' => "date",
                'format' => 'Y',
            ],
            [
                'name' => 'color',
                'label' => 'Цвет',
            ],
            [
                'name' => 'kmage',
                'label' => 'Пробег',
            ],
            [
                'name' => 'register_id',
                'label' => 'Регистрационный знак(Номер автомобиля)',
            ],
            // [
            //     'name' => 'images',
            //     'label' => 'изображения',
            // ],
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CarRequest::class);

        $this->crud->addFields([
            [
                'name' => 'model',
                'label' => 'Модель',
            ],
            [
                'name' => 'brand',
                'label' => 'Брэнд',
            ],
            [
                'name' => 'prod_year',
                'label' => 'Год выпуска',
                'type' => 'date_picker',
                'datetime_picker_options' => [
                'format' => 'yyyy',
                ],
            ],
            [
                'name' => 'color',
                'label' => 'Цвет',
            ],
            [
                'name' => 'kmage',
                'label' => 'Пробег',
            ],
            [
                'name' => 'register_id',
                'label' => 'Регистрационный знак(Номер автомобиля)',
            ],
            // [
            //     'name' => 'images',
            //     'label' => 'изображения',
            // ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
