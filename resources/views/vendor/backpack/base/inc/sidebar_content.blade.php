<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class=nav-item><a class=nav-link href="{{ backpack_url('elfinder') }}"><i class="nav-icon fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('consumer') }}'><i class='nav-icon fa fa-users'></i> Клиенты</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('car') }}'><i class='nav-icon fa fa-car'></i> Автомобили</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('employee') }}'><i class='nav-icon fa fa-users'></i> {{trans_choice('admin.employee', 2)}}</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('repair') }}'><i class='nav-icon fa fa-wrench'></i> Услуги</a></li>
