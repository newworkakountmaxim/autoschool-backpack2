@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">{{ trans('backpack::base.login_status') }}</div>
                </div>

                <div class="box-body">{{ trans('backpack::base.logged_in') }}</div>
            </div> -->
<!--  -->

<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3"> 
  <section class="row text-center placeholders">
    <div class="col-6 col-sm-3 placeholder">
      <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
      <h4>Label</h4>
      <div class="text-muted">some statistics</div>
    </div>
    <div class="col-6 col-sm-3 placeholder">
      <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
      <h4>Label</h4>
      <span class="text-muted">some statistics</span>
    </div>
    <div class="col-6 col-sm-3 placeholder">
      <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
      <h4>Label</h4>
      <span class="text-muted">some statistics</span>
    </div>
    <div class="col-6 col-sm-3 placeholder">
      <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
      <h4>Label</h4>
      <span class="text-muted">some statistics</span>
    </div>
  </section>
  <h2>some statistics</h2>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Header</th>
          <th>Header</th>
          <th>Header</th>
          <th>Header</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>ipsum</td>
          <td>some statistics</td>
          <td>some statistics</td>
        </tr>
        <tr>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
        </tr>
        <tr>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
        </tr>
        <tr>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
        </tr>       
      </tbody>
    </table>
  </div>
  <h2>some statistics</h2>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Header</th>
          <th>Header</th>
          <th>Header</th>
          <th>Header</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>ipsum</td>
          <td>some statistics</td>
          <td>some statistics</td>
        </tr>
        <tr>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
        </tr>
        <tr>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
        </tr>
        <tr>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
          <td>some statistics</td>
        </tr>       
      </tbody>
    </table>
  </div>
</main>
<!--  -->
        </div>
    </div>
@endsection

<!-- 
section('content-user')
  <h2>Например контент для еще какой-то роли "User"</h2>

endsection -->