<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i> Course search</h3>
    </div>
    <div class="panel-body">
        {!! Form::open(['route' => 'courses.list','method' => 'get']) !!}
        <!-- name text field -->
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'course name']) !!}
        </div>
        <span class="text-danger">{!! $errors->first('name') !!}</span>
        {!! Form::submit('Search', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>