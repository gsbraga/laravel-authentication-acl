@extends('laravel-authentication-acl::admin.layouts.base-2cols')
{{--@extends('laravel-authentication-acl::moodle.layouts.defaultmoodle')--}}

@section('title')
    Relatório de Disciplinas
@stop

    <!-- Bootstrap -->
{{--    {!! HTML::style('packages/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') !!}--}}
    {{--<link href="../node_modules/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    <!-- Font Awesome -->
{{--    {!! HTML::style('packages/gentelella/vendors/font-awesome/css/font-awesome.min.css') !!}--}}
    {{--<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">--}}
    <!-- NProgress -->
    {{--<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/nprogress/nprogress.css') !!}
    <!-- iCheck -->
    {{--<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/iCheck/skins/flat/green.css') !!}
    <!-- Datatables -->
    {{--<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
    {{--<link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') !!}
    {{--<link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') !!}
    {{--<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') !!}
    {{--<link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') !!}

    <!-- bootstrap-daterangepicker -->
    {{--<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css') !!}
    <!-- bootstrap-datetimepicker -->
    {{--<link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') !!}

    <!-- Custom Theme Style -->
    {{--<link href="../build/css/custom.min.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/build/css/custom.min.css') !!}

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading">
            <h2 class="panel-title bariol-thin"><i class="fa fa-bar-chart-o"></i> Acesso dos usuários </h2>
        </div>
        <div class="panel-body">

            <div class="row info_modulo">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-2 col-sm-2 col-xs-2 col-lg-1" for="first-name">Ambiente: </label>
                    <span id="nome_disciplina" class="col-md-10 col-sm-10 col-xs-10">{{ $moodle->name }}</span>
                </div>

            </div>
            <hr/>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Informe os dados da pesquisa:</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="search_form" class="form-horizontal form-label-left">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="first-name">Curso <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <select onchange="troca_course()" id="curso" name="curso" required="required" class="form-control col-md-7 col-xs-12">
                                            <option value="0">Selecione um Curso</option>
                                            @foreach($courses as $course)
                                                <option value="{{ $course->category_id }}">{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                        <span id="link_curso"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="last-name">Polo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <select onchange="troca_group()" id="group_name" name="group_name" required="required" class="form-control col-md-7 col-xs-12">
                                            <option value="0">TODOS</option>
                                        </select>
                                        <span id="link_group_name"></span>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                                        <button class="btn" type="reset">Limpar campos</button>
                                        <button type="button" onclick="showDisciplina()" class="btn btn-success">Pesquisar</button>
                                    </div>
                                </div>

                                <div class="form-group loading_icon" style="display: none;">
                                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"></div>

                                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                                        <img src="/images/load.gif" width="90" alt="">
                                    </div>

                                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Alunos do Curso</h2>
                            <!-- <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>

                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                                Esta listagem mostra os alunos do Curso.
                            </p>

                            <table id="table_course" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>CPF</th>
                                    <th>E-mail</th>
                                    <th>Nome</th>
                                    <th>Polo</th>
                                    <th>Cidade</th>
                                    <th>Tefelefone1</th>
                                    <th>Tefelefone2</th>                                   
                                    <th>Acesso</th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>
@stop

@section('footer_scripts')

<!-- jQuery -->
{{--<script src="../vendors/jquery/dist/jquery.min.js"></script>--}}
{{--{!! HTML::script('packages/gentelella/vendors/jquery/dist/jquery.min.js') !!}--}}
<!-- Bootstrap -->
{{--<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>--}}
{{--{!! HTML::script('packages/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') !!}--}}
<!-- FastClick -->
{{--<script src="../vendors/fastclick/lib/fastclick.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/fastclick/lib/fastclick.js') !!}
<!-- NProgress -->
{{--<script src="../vendors/nprogress/nprogress.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/nprogress/nprogress.js') !!}
<!-- iCheck -->
{!! HTML::script('packages/gentelella/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') !!}

<!-- bootstrap-daterangepicker -->
{{--<script src="../vendors/moment/min/moment.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/moment/min/moment.min.js') !!}

{{--<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js') !!}

{{--<script src="../vendors/iCheck/icheck.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/iCheck/icheck.min.js') !!}

<!-- bootstrap-datetimepicker -->
{{--<script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') !!}

{!! HTML::script('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') !!}
{!! HTML::script('https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js') !!}
{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') !!}
{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js') !!}
{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js') !!}
{!! HTML::script('https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js') !!}


{{--<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/pdfmake/build/pdfmake.min.js') !!}
{{--<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/pdfmake/build/vfs_fonts.js') !!}

<!-- Custom Theme Scripts -->
{{--<script src="../build/js/custom.min.js"></script>--}}
{{--{!! HTML::script('packages/gentelella/build/js/custom.min.js') !!}--}}
{{--<script src="js/config.js"></script>--}}
{!! HTML::script('packages/gentelella/build/js/config.js') !!}

<script type="text/javascript">

    var table;

    var limpar_dados = function(){

        if ( $.fn.dataTable.isDataTable( '#table_course' ) ) {
            table.clear();
            table.destroy();
        }

        $(".nome_tutor").html('');
    }

    var showLinks = function(){
        if($("#curso").val() != 0){
            $("#link_curso").html('<a class="red" target="_blank" href="'+aux_info.url+'/course/view.php?id='+ $("#curso").val()+'">Disciplina</a>');
        }else{
            $("#link_curso").html('<a></a>');
        }

        if($("#group_name").val() != 0 && $("#curso").val() != 0){
            $("#link_group_name").html('<a class="red" target="_blank" href="'+aux_info.url+'/enrol/users.php?id='+$("#curso").val()+'&filtergroup='+ $("#group_name").val()+'">Grupo</a>');
        }else{
            $("#link_group_name").html('<a></a>');
        }
    }

    var courses = function(){

        var curso = $("#curso").val();

        $.get( URL_API + "?type=grupos_categoria&id_curso="+curso, function( data ) {

            var html = '';
            $.each(data, function(index, item){
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
            });
            $("#curso").append(html);
        }, "json");
    }

    courses();

    var troca_course = function(){
        if($('#curso').val() > 0){
            grupos($('#curso').val());
        }
        limpar_dados();
        showLinks();
    }

    var troca_group = function(){
        limpar_dados();
        showLinks();
    }

    var grupos = function(curso){

        $.get( URL_API + "?type=grupos_modulo&categoryid="+curso, function( data ) {

            var html = '<option value="0">TODOS</option>';
            $.each(data, function(index, item){
                html += '<option value="'+ item.nome +'">'+ item.nome +'</option>';
            });
            $("#group_name").html(html);
        }, "json");
    }


    var showDisciplina = function(){
        $('.loading_icon').show();
        var flag = true;
        $('form input, form select').each(function (x, y) {
            console.log($(y).val().length);
            if ($(y).val().length == 0 ) {
                flag = false;
            }
        });

        if(!flag){
            $('.loading_icon').hide();
            alert('Escolha um perfil de usuário');
            return false;
        }


        var group_name = $('#group_name').val();
        var assignid = $('#assignid').val();

        $.ajax({
            type: "GET",
            url: URL_API + "?type=students_moodle&group_name="+group_name+"&curso="+$('#curso').val(),
            dataType: "json",
            success: function (data) {
                // var html = '';
                var dados = [];
                // var id = 0;
                var cpf = 0;
                var nome = '';
                var email = '';
                var ultimoacesso = '';
                var grupo = '-';
                var city = '-';
                var phone1 = '-';
                var phone2 = '-';
                
                $.each(data, function(index, item){

                   
                    if(item.grupo == null){ grupo = '-'; }else{grupo = item.grupo;}
                    if(item.city == null){ city = '-'; }else{city = item.city;}
                    if(item.phone1 == null){ phone1 = '-'; }else{phone1 = item.phone1;}
                    if(item.phone2 == null){ phone2 = '-'; }else{phone2 = item.phone2;}

                    dados.push({
                        'CPF': item.cpf,
                        'E-mail': item.email,
                        'Nome': item.nome,
                        'Polo': grupo,
                        'Cidade': city,
                        'Tefelefone1': phone1,
                        'Tefelefone2': phone2,
                        'Acesso': item.ultimoacesso
                    });

                });

                table = $('#table_course').DataTable({
                    paging: true,
                    data: dados,
                    columns: [
                        {data: 'CPF' },
                        {data: 'E-mail' },
                        {data: 'Nome' },
                        {data: 'Polo' },
                        {data: 'Cidade' },
                        {data: 'Tefelefone1' },
                        {data: 'Tefelefone2' },
                        {data: 'Acesso' }
                    ],
                    dom: "Blfrtip",

                    buttons: [
                        $.extend( true, {}, buttonCommon, {
                            extend: 'copyHtml5'
                        } ),
                        $.extend( true, {}, buttonCommon, {
                            extend: 'excelHtml5'
                        } ),
                        $.extend( true, {}, buttonCommon, {
                            extend: 'pdfHtml5'
                        } )
                    ],
                    responsive: true
                } );
                $('.loading_icon').hide();
            }
        });


    }

</script>
@stop