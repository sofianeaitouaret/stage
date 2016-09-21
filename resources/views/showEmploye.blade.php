@extends('template1')
@section('titre')

    Voir dossier employé
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
                @if ($user->etat == "0")
                <p><strong>Date d'arret de travail : </strong>{{ $user->dateArret}}</p>
                @endif

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
            <div class="panel-heading">Fiche congés de l'année en cours</div>
            <div class="panel-body">
                @foreach( $conges as $conge)
                    @if ((  $b < $conge->dateDebut ) && ($r > $conge->dateFin))
                    <p><strong>Date debut :</strong>  {{ $conge->dateDebut }}   ===>   <strong>Date Fin :</strong> {{ $conge->dateFin }}</p>
                    </br>
                    @endif

                @endforeach


            </div>
        </div>
        </br>
        <div class="panel panel-primary">
            <div class="panel-heading">Fiche absences de l'année en cours</div>
            <div class="panel-body">



                @foreach( $absences as $absence)
                        @if (  $b <$absence->dateDebut )
                        <p><strong>Date debut :</strong>  {{ $absence->dateDebut }}  ===>   <strong>Durée :</strong> {{ $conge->duree }}</p>
                        </br>
                        @endif

                @endforeach
            </div>
        </div>
        </br>
        <div class="panel panel-warning">
            <div class="panel-heading">Fiche des grades</div>
            <div class="panel-body">

             <?php
                $ts = strtotime($user->dateRecrutement);
                $unJour = 3600 * 24; // nombre de secondes dans une journée

                $ts+= "912" * $unJour; // 912 jours de plus
                if (date('Y-m-d', $ts) < date ('Y-m-d'))
                {
                    echo "oops, vouos avez depasser la date ".date('Y-m-d', $ts). " il faut faire une  PROGRESSION " ;
                 }
                 else
                 {
                     $d1=strtotime($ts);
                     $d2=ceil(($d1-time())/60/60/24);
                     echo "Désolé, votre prochaine PROGRESSION est le ".date('Y-m-d', $ts) ;
                 };

                ?>


            </div>
        </div>

    </div>
        </div>
    </div>


@endsection