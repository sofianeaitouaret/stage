@extends('template1')
@section('titre')

    Liste des congés en cours
@endsection
@section('main')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Gestion des congés</h3>
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
                        <h2>liste des congés en cours :</h2>
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
                            le tableau ci-dessous affiche la liste des congés en cours, ainsi que tous leurs informations  :
                        </p>
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                Suppression effectué avec succès.
                            </div>
                        @endif
                        <table id="datatable-responsive" name="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Durée</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>



                            @foreach( $conges as $conge)



                                @if (date('Y-m-d') < $conge->dateFin )



                                    <td> {{ $conge->id}} </td>
                                    @foreach( $salaries as $salarie)

                                        @if($salarie->id == $conge->salarie_id)
                                            <td>{{ $salarie->nameSalarie}} </td>
                                            <td>{{ $salarie->prenomSalarie}} </td>
                                        @endif

                                    @endforeach
                                    <td> {{ $conge->dateDebut}} </td>
                                    <td> {{ $conge->dateFin}} </td>
                                    <td>{{ $conge->duree}} </td>

                                    <td><a href="{{ URL::asset('/conge/'.$conge->id.'/edit') }}"> <button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</button></a></td>

                                    <td>
                                        {!! Form::open(['method' => 'POST', 'url' => $conge->id.'/supprimer_congé']) !!}
                                        <button class="btn btn-danger btn-xs" onclick="return confirm('Vraiment supprimer ce congé ?')" type="submit" ><i class="fa fa-trash-o"></i> Supprimer</button>
                                        {!! Form::close() !!}
                                    </td>

                                    </td>
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