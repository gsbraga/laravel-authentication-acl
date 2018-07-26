@extends('laravel-authentication-acl::admin.layouts.base-2cols')
@extends('laravel-authentication-acl::moodle.layouts.defaultmoodle')

@section('title')
    Ambientes: Dashboard
@stop

@section('content')
    {{--<h2><img width="200px" src="/packages/jacopo/laravel-authentication-acl/images/logo.jpeg"></h2>--}}
    <h4>Ambientes Virtuais do NEAD - UFMA:</h4>
    <hr/>

    <div class="row">
        @foreach($moodles as $moodle)

            <div class="col-md-4 col-sm-6 col-xs-12 col-lg-4">
                <div class="card-body">
                    <div class="card-title title{{ $moodle->id }}"><a style="color: #FFF;" href="/dashboards/categories/?id={{ $moodle->id }}"><h2>{{ $moodle->name }}</h2></a></div>
                    <div class="card-container">
                        <p>{{ $moodle->description }}</p>
                    </div>
                    <div class="card-footer">
                        <h3 title="Usuários acessando atualmente">Online: <i class="fa fa-users icon-oline"></i> <b>+{{ $moodle->users_online }}</b></h3>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

@stop