<ul class="nav nav-sidebar">
@if(isset($sidebar_items) && $sidebar_items)
@foreach($sidebar_items as $name => $data)
    <li class="{!! LaravelAcl\Library\Views\Helper::get_active($data['url']) !!}"><a href="{!! $data['url'] !!}">{!! $data['icon'] !!} {{$name}}</a></li>
@endforeach
@endif
    @if(isset($curso_info) && $curso_info)
        <li><h4>Relatórios</h4></li>
    <li><a href="/admin/reports/useraccess/?curso={{ $curso_info->category_id }}"><i class="fa fa-comments-o"></i>Acesso</a></li>
    <li><a href="/admin/reports/reportactivity/?curso={{ $curso_info->category_id }}"><i class="fa fa-check"></i>Atividades</a></li>
    <li><a href="/admin/reports/reportforum/?curso={{ $curso_info->category_id }}"><i class="fa fa-comments"></i>Forum</a></li>
    <li><a href="/admin/reports/reportquiz/?curso={{ $curso_info->category_id }}"><i class="fa fa-comments-o"></i>Quiz</a></li>
    <li><a href="/admin/reports/reportcourse/?curso={{ $curso_info->category_id }}"><i class="fa fa-comments-o"></i>Disciplina</a></li>

    @endif

</ul>
