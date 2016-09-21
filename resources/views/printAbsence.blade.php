@extends('template1')
@section('titre')

    Liste d'absences :
@endsection
@section('main')



    <div class="right_col" role="main">
        <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="javascript:history.back()" class="btn btn-default">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                </a>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Liste des absences <small></small></h2>
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
                            En utilisant les boutons Print, excel ... vous pouvez avoir divers exetension de votre table  </p>
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de l'absence</th>
                                <th>Durée</th>

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

                                </tr>

                            @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

























    <!-- page content -->




    <!-- /page content -->
























@endsection