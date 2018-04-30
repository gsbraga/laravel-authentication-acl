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
                        <h4>General data</h4>
                        {!! Form::model($course, [ 'url' => [URL::route('courses.edit'), $course->id], 'method' => 'post'] ) !!}
                        <!-- name text field -->
                        <div class="form-group">
                            {!! Form::label('name','Name: *') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'course name']) !!}
                        </div>
                        <!-- ful name text field -->
                        <div class="form-group">
                            {!! Form::label('name','Full Name: *') !!}
                            {!! Form::text('fullname', null, ['class' => 'form-control', 'placeholder' => 'course full name']) !!}
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon form-button button-add-perm"><span class="glyphicon glyphicon-plus-sign add-input"></span></span>
                            {!! Form::select('moodles_id', $moodles_values, '', ["class"=>"form-control permission-select"]) !!}
                        </div>
                        <span class="text-danger">{!! $errors->first('name') !!}</span>
                        {!! Form::hidden('id') !!}
                        <a href="{!! URL::route('courses.delete',['id' => $course->id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">Delete</a>
                        {!! Form::submit('Save', array("class"=>"btn btn-info pull-right ")) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-6 col-xs-12">
                    {{-- course permission form --}}
                        <h4><i class="fa fa-lock"></i> Permissions</h4>
                        {{-- permissions --}}
{{--                        @include('laravel-authentication-acl::admin.course.perm')--}}
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