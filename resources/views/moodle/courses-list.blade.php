@extends('laravel-authentication-acl::moodle.layouts.defaultmoodle')

@section('title')
    Ambientes: Dashboard
@stop

@section('container')
    <h2><img width="200px" src="/packages/jacopo/laravel-authentication-acl/images/logo.jpeg"></h2>
    <h4>Ambientes Virtuais do NEAD - UFMA:</h4>
    <hr/>

    <div class="row">
        @foreach($courses as $course)

            <div class="col-md-4 col-sm-4 col-xs-6 col-lg-4">
                <div class="card-body-course">
                    <div class="card-title-course"><h2>{{ $course->name }}</h2></div>
                    <div class="card-container-course">
                        <p>{{ $course->fullname}}</p>
                    </div>
                    <div class="card-footer-course">
                        <a href="/course/{{$course->id}}"><h4>Acessar</h4></a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

@stop