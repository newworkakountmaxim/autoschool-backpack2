@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Главная (Юзер)</h2></div>

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
        </div>
    </div>
</div> -->

<div class="container">
  <div class="panel panel-default">
        <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <h2>David Hockley</h2>
                        <p><strong>About: </strong> Bitcoin Enthusiast. Australia's premiere BTC buyer and seller.</p>
                        <p><strong>Hobbies: </strong> Music, Bitcoins, and Fun. </p>
                        <p><strong>Payment: </strong>
                            <span class="label label-info tags">Cash</span> 
                            <span class="label label-info tags">Western Union</span>
                            <span class="label label-info tags">Bank Transfer</span>
                          <span class="label label-info tags">BTC</span>
                          <span class="label label-info tags">Westpac</span>
                        </p>
                    </div><!--/col-->          
                    <div class="col-xs-12 col-sm-4 text-center">
                            <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="" class="center-block img-circle img-responsive">
                            <ul class="list-inline ratings text-center" title="Ratings">
                              <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                              <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                              <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                              <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                              <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                            </ul>
                    </div><!--/col-->
                </div><!--/row--> 

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
                    <h2><strong> 20,7K </strong></h2>                    
                    <p><small>Followers</small></p>
                    <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button>
                </div><!--/col-->
                <div class="col-xs-12 col-sm-4">
                    <h2><strong>245</strong></h2>                    
                    <p><small>Following</small></p>
                    <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button>
                </div><!--/col-->
                <div class="col-xs-12 col-sm-4">
                    <h2><strong>43</strong></h2>                    
                    <p><small>Snippets</small></p>
                    <button type="button" class="btn btn-primary btn-block"><span class="fa fa-gear"></span> Options </button>  
                </div><!--/col-->
                
          </div><!--/panel-body-->
      </div><!--/panel-->
</div>

<div class="container panel panel-default">
    <div class="row m-y-2">
        <div class="col-lg-8 push-lg-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>                
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                </li>
            </ul>
            <div class="tab-content p-b-3">
                <div class="tab-pane active" id="profile">
                    <h4 class="m-y-2">User Profile</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>About</h6>
                            <p>Web Designer, UI/UX Engineer</p>
                            <h6>Hobbies</h6>
                            <p>Indie music, skiing and hiking. I love the great outdoors.</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Recent Tags</h6>
                            <a href="" class="tag tag-default tag-pill">html5</a>
                            <a href="" class="tag tag-default tag-pill">react</a>
                            <a href="" class="tag tag-default tag-pill">codeply</a>
                            <a href="" class="tag tag-default tag-pill">angularjs</a>
                            <a href="" class="tag tag-default tag-pill">css3</a>
                            <a href="" class="tag tag-default tag-pill">jquery</a>
                            <a href="" class="tag tag-default tag-pill">bootstrap</a>
                            <a href="" class="tag tag-default tag-pill">responsive-design</a>
                            <hr>
                            <span class="tag tag-primary"><i class="fa fa-user"></i> 900 Followers</span>
                            <span class="tag tag-success"><i class="fa fa-cog"></i> 43 Forks</span>
                            <span class="tag tag-danger"><i class="fa fa-eye"></i> 245 Views</span>
                        </div>
                        <div class="col-md-12">
                            <h4 class="m-t-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> Recent Activity</h4>
                            <table class="table table-hover table-striped">
                                <tbody>                                    
                                    <tr>
                                        <td><strong>Abby</strong> joined ACME Project Team in <strong>`Collaboration`</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gary</strong> deleted My Board1 in <strong>`Discussions`</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kensington</strong> deleted MyBoard3 in <strong>`Discussions`</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>John</strong> deleted My Board1 in <strong>`Discussions`</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Skell</strong> deleted his post Look at Why this is.. in <strong>`Discussions`</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>                
                <div class="tab-pane" id="edit">
                    <h4 class="m-y-2">Edit Profile</h4>
                    <form role="form">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="Jane">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="Bishop">
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
                            <label class="col-lg-3 col-form-label form-control-label">Website</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="url" value="">
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
                            <label class="col-lg-3 col-form-label form-control-label">Time Zone</label>
                            <div class="col-lg-9">
                                <select id="user_time_zone" class="form-control" size="0">
                                    <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                    <option value="Alaska">(GMT-09:00) Alaska</option>
                                    <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                    <option value="Arizona">(GMT-07:00) Arizona</option>
                                    <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                    <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                    <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                    <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                </select>
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
            </div>
        </div>
        <div class="col-lg-4 pull-lg-8 text-xs-center">
            <img src="//placehold.it/150" class="m-x-auto img-fluid img-circle" alt="avatar">
            <h6 class="m-t-2">Upload a different photo</h6>
            <label class="custom-file">
                <input type="file" id="file" class="custom-file-input">
                <span class="custom-file-control">Choose file</span>
            </label>
        </div>
    </div>
</div>
<hr>

@endsection
