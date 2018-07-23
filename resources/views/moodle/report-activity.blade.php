@extends('laravel-authentication-acl::admin.layouts.base-2cols')
@extends('laravel-authentication-acl::moodle.layouts.defaultmoodle')

@section('title')
    Relatório de Atividades
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
    {{--{!! HTML::style('packages/gentelella/build/css/custom.min.css') !!}--}}

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading">
            <h2 class="panel-title bariol-thin"><i class="fa fa-bar-chart-o"></i> Acesso dos usuários </h2>
        </div>
        <div class="panel-body">

            <div class="row info_modulo">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-2 col-sm-2 col-xs-2 col-lg-1" for="first-name">Curso: </label>
                    <span id="nome_disciplina" class="col-md-10 col-sm-10 col-xs-10">{{ $curso_info->name }} - {{ $curso_info->fullname }}</span>
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="first-name">Disciplina <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <select onchange="troca_course()" id="courseid" name="courseid" required="required" class="form-control col-md-7 col-xs-12">
                                            <option value="0">Selecione uma Disciplina</option>
                                        </select>
                                        <span id="link_courseid"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="last-name">Atividade <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <select onchange="troca_atividade()" id="assignid" name="assignid" required="required" class="form-control col-md-7 col-xs-12">
                                            <option value="0">Selecione uma atividade</option>
                                        </select>
                                        <span id="link_assignid"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="last-name">Polo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <select onchange="troca_group()" id="groupid" name="groupid" required="required" class="form-control col-md-7 col-xs-12">
                                            <option value="0">TODOS</option>
                                        </select>
                                        <span id="link_groupid"></span>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="reset">Limpar campos</button>
                                        <button type="button" onclick="showAtividades()" class="btn btn-success">Pesquisar</button>
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
                            <h2>Atividades</h2>
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
                                Esta listagem mostra todos os envios da atividade e feedbacks.
                            </p>
                            <h4 class="data_entrega" style="color: black;">Data de entrega: </h4>
                            <div class="nome_tutor"></div>

                            <table id="assign_course" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Polo</th>
                                    <th>Postagens</th>
                                    <th>Nota</th>
                                    <th>Feedback</th>
                                    <th>Envio</th>
                                    <th>Correção</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@stop

@section('footer_scripts')

<!-- jQuery -->
{{--<script src="../vendors/jquery/dist/jquery.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/jquery/dist/jquery.min.js') !!}
<!-- Bootstrap -->
{{--<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') !!}
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

    var atividades_id = [];
    var table;

    var limpar_dados = function(){

        if ( $.fn.dataTable.isDataTable( '#assign_course' ) ) {
            table.clear();
            table.destroy();
        }

        $(".nome_tutor").html('');
    }

    var showLinks = function(){
        if($("#courseid").val() != 0){
            $("#link_courseid").html('<a class="red" target="_blank" href="'+aux_info.url+'/course/view.php?id='+ $("#courseid").val()+'">Disciplina</a>');
        }else{
            $("#link_courseid").html('<a></a>');
        }

        if($("#assignid").val() != 0){
            var assignlink = 0;
            for(x in atividades_id){
                if($("#assignid").val() == atividades_id[x].id){
                    assignlink = atividades_id[x].instance;
                    break;
                }
            }
            $("#link_assignid").html('<a class="red" target="_blank" href="'+aux_info.url+'/mod/assign/view.php?id='+ assignlink +'">Atividade</a>');
        }else{
            $("#link_assignid").html('<a></a>');
        }

        if($("#groupid").val() != 0 && $("#courseid").val() != 0){
            $("#link_groupid").html('<a class="red" target="_blank" href="'+aux_info.url+'/enrol/users.php?id='+$("#courseid").val()+'&filtergroup='+ $("#groupid").val()+'">Grupo</a>');
        }else{
            $("#link_groupid").html('<a></a>');
        }
    }

    var courses = function(){

        var curso = getUrlParameters("curso", "", true);

        $.get( URL_API + "?type=modulos_curso&curso="+curso, function( data ) {

            var html = '';
            $.each(data, function(index, item){
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
            });
            $("#courseid").append(html);
        }, "json");
    }

    courses();

    var troca_course = function(){
        if($('#courseid').val() > 0){
            atividades($('#courseid').val());
            grupos($('#courseid').val());
        }
        limpar_dados();
        showLinks();
    }

    var troca_atividade = function(){
        limpar_dados();
        showLinks();
    }

    var troca_group = function(){
        limpar_dados();
        showLinks();
    }

    var atividades = function(courseid){

        $.get( URL_API + "?type=assign_modulo&courseid="+courseid, function( data ) {

            var html = '<option value="0">Selecione um Quiz</option>';
            $.each(data, function(index, item){
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
                atividades_id.push(item);
            });
            $("#assignid").html(html);
        }, "json");
    }

    var grupos = function(courseid){

        $.get( URL_API + "?type=grupos_modulo&courseid="+courseid, function( data ) {

            var html = '<option value="0">TODOS</option>';
            $.each(data, function(index, item){
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
            });
            $("#groupid").html(html);
        }, "json");
    }

    var data_entrega = function(){
        var assignid = $('#assignid').val();
        var groupid = $('#groupid').val();

        $.get( URL_API + "?type=assign_data_entrega&assignid="+assignid+"&groupid="+groupid, function( data ) {

            var html = '';
            $.each(data, function(index, item){
                if(item.entrega != null && item.entrega != "31/12/1969"){
                    html += item.entrega;
                }else{
                    html = '-';
                }
            });
            $(".data_entrega").html('Data de entrega: '+html);

        }, "json");

    }

    var nome_tutor = function(){
        var courseid = $('#courseid').val();
        var groupid = $('#groupid').val();

        $.get( URL_API + "?type=name_tutor&courseid="+courseid+"&groupid="+groupid, function( data ) {

            var html = '';
            $.each(data, function(index, item){
                // if(data.length > 1 && index > 0){
                //     html += '';
                // }
                html += '<li class="red">'+item.nome+'</li>';
            });

            $(".nome_tutor").html('<small style="color: black;">Tutor:</small> <ul>'+html+'</li>');

        }, "json");

    }

    var showAtividades = function(){
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

        data_entrega();
        nome_tutor();

        var groupid = $('#groupid').val();
        var assignid = $('#assignid').val();

        $.ajax({
            type: "GET",
            url: URL_API + "?type=assign_student&groupid="+groupid+"&assignid="+assignid+"&courseid="+$('#courseid').val(),
            dataType: "json",
            success: function (data) {
                // var html = '';
                var dados = [];
                var nota = '-';
                var feedback = '-';
                var envio = '-';
                var correcao = '-';
                var grupo = '-';


                $.each(data, function(index, item){
                    if(item.nota == null){ nota = '-'; }else{nota = item.nota;}
                    if(item.feedback == null){ feedback = '-'; }else{feedback = item.feedback;}
                    if(item.envio == null){ envio = '-'; }else{envio = item.envio;}
                    if(item.correcao == null){ correcao = '-'; }else{correcao = item.correcao;}
                    if(item.grupo == null){ grupo = '-'; }else{grupo = item.grupo;}

                    dados.push({
                        'Nome': item.nome,
                        'Polo': grupo,
                        'Postagens': item.total,
                        'Nota': item.nota,
                        'Feedback': feedback,
                        'Envio': envio,
                        'Correção': correcao,
                    });

                });

                table = $('#assign_course').DataTable({
                    paging: true,
                    data: dados,
                    columns: [
                        {data: 'Nome' },
                        {data: 'Polo' },
                        {data: 'Postagens' },
                        {data: 'Nota' },
                        {data: 'Feedback' },
                        {data: 'Envio' },
                        {data: 'Correção' }
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