@extends('laravel-authentication-acl::admin.layouts.base-2cols')
@extends('laravel-authentication-acl::moodle.layouts.defaultmoodle')

@section('title')
    Ambientes: Dashboard
@stop

@section('content')
    <h2><img width="200px" src="/packages/jacopo/laravel-authentication-acl/images/logo.jpeg"></h2>
    <h4>Ambientes Virtuais do NEAD - UFMA:</h4>
    <hr/>
    <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-6 col-lg-3 form-group">
            <a href="/admin/reports/access" class="red"><h4>Acessar Dashboard <i class="fa fa-share"></i></h4></a>
        </div>
    </div>

    <div class="row">
        @foreach($courses as $course)

            {{--<div class="col-md-4 col-sm-4 col-xs-6 col-lg-4 box-course">--}}
                {{--<div class="card-body-course">--}}
                    {{--<div class="card-title-course"><h2>{{ $course->name }}</h2></div>--}}
                    {{--<div class="card-container-course">--}}
                        {{--<p>{{ $course->fullname}}</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-footer-course">--}}
                        {{--<a href="/admin/courses/userscourses?id={{$course->id}}"><h4>Acessar</h4></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="col-md-4 col-sm-6 col-xs-12 col-lg-3 box-course">
                <div class="card-body-course">
                    <div class="card-title-course"><div class="course-list">
                            <img src="/packages/jacopo/laravel-authentication-acl/images/cursos/{{ $course->image  }}" alt="Curso online jQuery: Avance na biblioteca mais popular do mercado parte 2" aria-hidden="true" class="img-course">
                            <div class="course-name">
                                <h4>{{ $course->name }}:</h4> {{ $course->fullname}}
                            </div>
                        </div>
                    </div>
                    <div class="card-container-course">
                        {{--<p style="display:  none; ">Ciência da Computação</p>--}}
                    </div>
                    <div class="card-footer-course">
                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6"><a href="/admin/reports/list/?id={{$course->id}}&curso={{$course->category_id}}"><i class="fa fa-book "></i> Disciplinas</a></div>
                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6"><a href="/admin/courses/userscourses?id={{$course->id}}"><i class="fa fa-cogs "></i> Gerenciar</a></div>
                        {{--<a href="/admin/courses/userscourses?id={{$course->id}}"><h4>Acessar</h4></a>--}}
                    </div>
                </div>
            </div>

        @endforeach
    </div>

@stop