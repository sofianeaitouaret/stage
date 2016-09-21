@extends('template1')
@section('titre')

    Liste des employés
@endsection
@section('main')



    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Gestion des employés</h3>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="alert alert-success alert-dismissible hidden">
                You are now registered, you can login.
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:history.back()" class="btn btn-default">
                        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                    </a>
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row">

                                <div class="col-md-12 col-sm-12 col-xs-12">

                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Nos employés</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>

                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <p class="text-muted font-13 m-b-30">
                                                le tableau ci-dessous affiche la liste des salariés, ainsi que tous leurs informations dont nom, prenom et numéro de securite social :
                                            </p>
                                            @if (session('status'))
                                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                    Suppression effectué avec succès.
                                                </div>
                                            @endif
                                            <table id="datatable-responsive"  name="exemple" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Numéro</th>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Nss</th>

                                                    <th>Date de recrutement</th>
                                                    <th>Voir</th>
                                                    <th>Modifier</th>
                                                    <th>Supprimer</th>
                                                    <th>Retraite</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach( $gradess as $grade)

                                                    @if ($grade->etat == "1")
                                                <tr>
                                                    <td>{{ $grade->id}}</td>
                                                    <td>{{ $grade->nameSalarie}}</td>
                                                    <td>{{ $grade->prenomSalarie}}</td>
                                                    <td>{{ $grade->NSS}}</td>

                                                    <td>{{ $grade->dateRecrutement}}</td>




                                                    <td><a href="{{ URL::asset('/user/'.$grade->id) }}"> <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Voir</button></a></td>





                                                    <td><a href="{{ URL::asset($grade->id.'/editer') }}"> <button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</button></a></td>

                                                    <td>

                                                        {!! Form::open(['method' => 'POST', 'url' => $grade->id.'/supprimer_employé']) !!}
                                                        <button class="btn btn-danger btn-xs" onclick="return confirm('Vraiment supprimer cet employé ?')" type="submit" ><i class="fa fa-trash-o"></i> Supprimer</button>
                                                        {!! Form::close() !!}




                                                    </td>
                                                    <td><a href="{{ URL::asset($grade->id.'/retraite_employe') }}"> <button type="button" class="btn btn-info btn-xs"><i class="fa fa-forward"></i> retraite</button></a></td>
                                                </tr>
                                                    @endif
                                                @endforeach


                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Register</h4>
                </div>
                <div class="modal-body">

                    <form id="formRegister" class="form-horizontal" role="form" method="POST" action="{{ url($grade->id.'/editer') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nom" value="{{ $grade->nameSalarie }}">
                                <small class="help-block"></small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Prenom</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="prenom">
                                <small class="help-block"></small>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>





    <script>

        $(function(){

            $('#register').click(function() {
                $('#myModal').modal();
            });

            $(document).on('submit', '#formRegister', function(e) {
                e.preventDefault();

                $('input+small').text('');
                $('input').parent().removeClass('has-error');

                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json"
                })
                        .done(function(data) {
                            $('.alert-success').removeClass('hidden');
                            $('#myModal').modal('hide');
                        })
                        .fail(function(data) {
                            $.each(data.responseJSON, function (key, value) {
                                var input = '#formRegister input[nom=' + key + ']';
                                $(input + '+small').text(value);
                                $(input).parent().addClass('has-error');
                            });
                        });
            });

        })

    </script>

    <script>
        $(document).ready(function () {
            var oTable = $('#example').DataTable({
                "oLanguage": {
                    "sSearch": "Recherche :"
                },
                "aoColumnDefs": [
                    {
                        'bSortable': false,
                        'aTargets': [5,6],
                    } //disables sorting for column six and seven
                ],
                'iDisplayLength': 10,
                "sPaginationType": "full_numbers",
                "dom": 'T<"clear">lfrtip',

            });


        });
    </script>


@endsection