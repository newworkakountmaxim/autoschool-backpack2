@extends('layouts.app')

@section('content')


<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
                
            <ul class="nav nav-tabs">
                <li class="nav-item active">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Профиль</a>
                </li>                
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Редактировать</a>
                </li>
            </ul>

            <div class="tab-content p-b-3">
                
                <div class="tab-pane active" id="profile">                    
                    <div class="row">                        
                        <div class="col-xs-12 col-sm-9">
                            <h2>{{Auth::user()->name}}</h2>
                            <p><strong>Email: </strong> <?php echo Auth::user()->email; ?></p>
                            <p><strong>С нами с: </strong> {{Auth::user()->created_at}} </p>
                            <p><strong>Группа: </strong>
                                <span class="label label-info tags">Нет группы</span>                             
                            </p>
                            <p><strong>Поле: </strong></p>
                            <p>
                                @foreach ($a as $as)
                                    {{$as->name}}
                                @endforeach
                            </p>
                            <p><strong>Поле: </strong>Значение</p>
                            <p><strong>Поле: </strong>Значение</p>
                        </div>          
                        <div class="col-xs-12 col-sm-3 text-center">
                            <!--  <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="" class="center-block img-circle img-responsive"> -->
                            <img src="{{ url('/uploads/vangog.jpg') }}" alt="" class="center-block img-circle img-responsive">
                            <ul class="list-inline ratings text-center" title="Ratings">
                              <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                              <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                              <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                              <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                              <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                            </ul>
                        </div>                        

                        <div class="">                    
                            <div class="panel-body" style="line-height:2rem">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <h4>Сюда направляются все кто ни имеет прав по умолчанию. </h4><hr>
                                <h4>НО т.к это все-таки планируется как стр. с персональными данными пользователя - сюда может зайти и Админ и Преподаватель. </h4><hr>
                                <h4>Тут может быть страничка ользователя как в соц-сети. Всякие метаданные, фотка. Также тут будет информация о группе, билетах, возможно какой-тографик успеваемости. Чат.. Может еще что-то</h4><hr>
                                <h4>На вкладку Admin итд ЮЗЕР перейти НЕ МОЖЕТ</h4>
                            </div>
                        </div>  

                        
                        <div class="col-xs-12 col-sm-4">
                            <h2><strong>245</strong></h2>                    
                            <p><small>Новых билетов</small></p>
                            <button class="btn btn-info btn-block"><span class="fa fa-user"></span> Просмотреть билеты </button>
                        </div><!--/col-->
                        <div class="col-xs-12 col-sm-4">
                            <h2><strong> Нет группы </strong></h2>                    
                            <p><small>Информация о группе</small></p>
                            <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Статистика </button>
                        </div><!--/col-->
                        <div class="col-xs-12 col-sm-4">
                            <h2><strong>43</strong></h2>                    
                            <p><small>Очков обучения</small></p>
                            <button type="button" class="btn btn-primary btn-block"><span class="fa fa-gear"></span> Информация об обучении </button>  
                        </div><!--/col-->                                   
                    </div>                    
                </div>

                <div class="tab-pane" id="edit">
                    <div class="row">
                        <div class="col-lg-8 push-lg-4"> 
                        <br>                           
                            <form role="form">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Имя</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="Jane">
                                    </div>
                                </div>                                    
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" value="email@gmail.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Company</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="">
                                    </div>
                                </div>                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" placeholder="Street">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" value="" placeholder="City">
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="form-control" type="text" value="" placeholder="State">
                                    </div>
                                </div>                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="janeuser">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="11111122333">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="11111122333">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input type="button" class="btn btn-primary" value="Save Changes">
                                    </div>
                                </div>
                            </form>
                        </div>                                        
                        <div class="col-lg-4 pull-lg-8 text-xs-center">
                            <br>
                            <img src="//placehold.it/150" class="m-x-auto img-fluid img-circle" alt="avatar">                            
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input">
                                <!-- <span class="custom-file-control">Choose file</span> -->
                            </label>
                        </div>
                    </div>
                </div>

            </div>
                    
        </div>
    </div>    
</div>


@endsection
