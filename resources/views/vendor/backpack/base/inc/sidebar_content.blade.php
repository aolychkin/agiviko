<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
{{--<li><a href='{{ backpack_url('tag') }}'><i class='fa fa-tag'></i> <span>Теги</span></a></li>--}}
<li><a href='{{ backpack_url('cities') }}'><i class='fa fa-building'></i> <span>Города</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('page') }}'><i class='nav-icon fa fa-file-o'></i> <span>Страницы</span></a></li>

<li><a href='{{ backpack_url('menu') }}'><i class='fa fa-compass'></i> <span>Меню</span></a></li>
<li><a href='{{ backpack_url('promo') }}'><i class="fa fa-smile">%</i> <span>Промо</span></a></li>

<li><a href='{{ backpack_url('banner') }}'><i class='fa fa-tag'></i> <span>Баннеры</span></a></li>