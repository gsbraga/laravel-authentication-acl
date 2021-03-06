<div class="row margin-bottom-12">
    <div class="col-md-12">
        <a href="{!! URL::route('courses.edit') !!}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New</a>
    </div>
</div>
@if( ! $courses->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <th>Course name</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td style="width:70%">{!! $course->name !!} - {!! $course->fullname !!}</td>
            <td style="width:30%">
                <a title="Relatórios" href="{!! URL::route('reports.moodle', ['id' => $course->id, 'curso' => $course->category_id]) !!}"><i class="fa fa-bar-chart-o fa-2x"></i></a>
                @if(! $course->protected)
                <a title="Usuários" href="{!! URL::route('courses.course-view-user', ['id' => $course->id]) !!}"><i class="fa fa-user fa-2x"></i></a>
                <a title="Editar curso" href="{!! URL::route('courses.edit', ['id' => $course->id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <a title="Excluir curso" href="{!! URL::route('courses.delete',['id' => $course->id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            @else
                <i class="fa fa-times fa-2x light-blue"></i>
                <i class="fa fa-times fa-2x margin-left-12 light-blue"></i>
            @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<span class="text-warning"><h5>No results found.</h5></span>
@endif
<div class="paginator">
    {{--{!! $courses->appends($request->except(['page']) )->render() !!}--}}
</div>