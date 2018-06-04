<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/elfinder') }}"><i class="fa fa-files-o"></i> <span>Медиафайлы</span></a></li>
<!-- <li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>Пользователи,Роли,Права</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu"> -->
      <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/user') }}"><i class="fa fa-user"></i> <span>Пользователи</span></a></li>
      <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/role') }}"><i class="fa fa-group"></i> <span>Роли</span></a></li>
      <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/permission') }}"><i class="fa fa-key"></i> <span>Права</span></a></li>
   <!--  </ul>
</li> -->

<li class="treeview">
    <a href="#"><i class="fa fa-align-left"></i> <span>Темы</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
    	<li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/theme') }}"><i class="fa fa-eye"></i> <span>Все темы</span></a></li>
      	<li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/theme/create') }}"><i class="fa fa-plus"></i> <span>Новая тема</span></a></li>     
    </ul>
</li>




<li class="treeview">
    <a href="#"><i class="fa fa-align-left"></i> <span>Вопросы</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/question') }}"><i class="fa fa-eye"></i> <span>Все вопросы</span></a></li>
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/question/create') }}"><i class="fa fa-plus"></i> <span>Новый вопрос</span></a></li>     
    </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-align-left"></i> <span>Билеты</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/ticket') }}"><i class="fa fa-eye"></i> <span>Все билеты</span></a></li>
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/ticket/create') }}"><i class="fa fa-plus"></i> <span>Добарить билет</span></a></li>     
    </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-align-left"></i> <span>Формирование билетов</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/1theme') }}"><i class="fa fa-eye"></i> <span>Все правила</span></a></li>
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/1theme/create') }}"><i class="fa fa-plus"></i> <span>Новое правило</span></a></li>     
    </ul>
</li>
  