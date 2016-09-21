@extends('template1')
@section('titre')

    Liste des absences
@endsection
@section('main')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Gestion des absences</h3>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="alert alert-success alert-dismissible hidden">
                Modification effectué avec succes.
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
                            <h2>Liste des absences</h2>
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
                                le tableau ci-dessous affiche la liste de toutes les absences des employés, ainsi que tous leurs informations:
                            </p>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    Suppression effectué avec succès.
                                </div>
                            @endif
                            <table id="datatable-responsive" name="exemple" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Date de l'absence</th>
                                    <th>Durée</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>

                                </tr>
                                </thead>
                                <tbody>



                                @foreach( $grades as $grade)


                                        <td> {{ $grade->id}} </td>
                                        @foreach( $grades2 as $grade2)

                                            @if($grade2->id == $grade->salarie_id)
                                                <td>{{ $grade2->nameSalarie}} </td>
                                                <td>{{ $grade2->prenomSalarie}} </td>
                                            @endif

                                        @endforeach
                                        <td> {{ $grade->dateDebut}} </td>
                                        <td>{{ $grade->duree}} </td>


                                        </td>

                                        <td><a href="{{ URL::asset('/absence/'.$grade->id.'/edit') }}"> <button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</button></a></td>



                                        <td>

                                            {!! Form::open(['method' => 'POST', 'url' => $grade->id.'/supprimer']) !!}
                                            <button class="btn btn-danger btn-xs" onclick="return confirm('Vraiment supprimer cet absence ?')" type="submit" ><i class="fa fa-trash-o"></i> Supprimer</button>
                                            {!! Form::close() !!}



                                        </td>
                                    </tr>

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