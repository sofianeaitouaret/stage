@extends('template1')
@section('titre')

    Voir dossier employé retraité
@endsection
@section('main')

    <div class="right_col" role="main">
        <div class="">
            <a href="javascript:history.back()" class="btn btn-default">
                <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
            </a>
            <div class="col-sm-offset-0 col-sm-12">
                </br>
                <div class="panel panel-default ">
                    <div class="panel-heading">Fiche salarié</div>
                    <div class="panel-body">
                        <p><strong>Nom : </strong></strong>{{ $user->nameSalarie }}</p>
                        <p><strong>Presnom :</strong> {{ $user->prenomSalarie }}</p>
                        <p><strong>Nss : </strong> {{ $user->NSS}}</p>

                        <p><strong>Date de recrutement : </strong>{{ $user->dateRecrutement}}</p>
                        <p><strong>Grade :</strong> {{ $user->grade_id}}</p>

                        <p><strong>Bureau : </strong>{{ $user->bureau_id}}</p>

                            <p><strong>Date d'arret de travail : </strong>{{ $user->dateArret}}</p>


                    </div>
                </div>
                </br>

                <?php
                $z = "01-01";
                $a = date("Y");
                $b = $a . "-"; // $b contient "Bonjour Monde !"
                $b =$b . $z ;


                $a = $a +1 ;
                $r = $a . "-"; // $b contient "Bonjour Monde !"
                $r =$r . $z ;



                ?>
                <div class="panel panel-info ">
                    <div class="panel-heading">Fiche congés</div>
                    <div class="panel-body">
                        @foreach( $conges as $conge)
                                <p><strong>Date debut :</strong>  {{ $conge->dateDebut }}   ===>   <strong>Date Fin :</strong> {{ $conge->dateFin }}</p>
                                </br>


                        @endforeach


                    </div>
                </div>
                </br>
                <div class="panel panel-primary">
                    <div class="panel-heading">Fiche absences</div>
                    <div class="panel-body">



                        @foreach( $absences as $absence)

                                <p><strong>Date debut :</strong>  {{ $absence->dateDebut }}  ===>   <strong>Durée :</strong> {{ $conge->duree }}</p>
                                </br>

                        @endforeach
                    </div>
                </div>
                </br>


            </div>
        </div>
    </div>


@endsection