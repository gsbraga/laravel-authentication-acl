@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: edit course
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        {{-- model general errors from the form --}}
        @if($errors->has('model') )
        <div class="alert alert-danger">{!! $errors->first('model') !!}</div>
        @endif

        {{-- successful message --}}
        <?php $message = Session::get('message'); ?>
        @if( isset($message) )
        <div class="alert alert-success">{{$message}}</div>
        @endif
        <div class="panel panel-info">
            <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">{!! isset($course->id) ? '<i class="fa fa-pencil"></i> Edit' : '<i class="fa fa-users"></i> Create' !!} course</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        {{-- course base form --}}
                        <h3>{{ $course->name }}</h3>

                        <h4>
                            {{ $course->fullname }}
                        </h4>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-6 col-xs-12">

                        <h5><i class="fa fa-lock"></i> Usuários com acesso ao Curso</h5>
                        {{-- permissions --}}
                        @include('laravel-authentication-acl::admin.course.user-course-table')
                    </div>
                </div>
           </div>
        </div>
    </div>
</div>
@stop

@section('footer_scripts')
<script>
    $(".delete").click(function(){
        return confirm("Are you sure to delete this item?");
    });
</script>
@stop