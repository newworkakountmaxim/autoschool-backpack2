@if ($crud->hasAccess('update'))
	<a href="{{ Request::url().'/'.$entry->getKey() }}/edit" class="btn  btn-default"><i class="fa fa-edit"></i> Изменить</a>
@endif