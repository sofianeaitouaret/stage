<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Attestation de travail</title>

    <style type="text/css" title="mes_styles" media="all">
        h1
        {
            text-align: center;
            font-size: 1.3em;
            text-decoration: underline;


        }
        .introduction
        {
            text-align: left;
            font-size: 1.3em;
            text-decoration: underline;
        }
        .soso
        {
            text-align: center;
            font-size: 2.5em;
            text-decoration: underline;
        }
        .so
        {
            text-align: left;
            font-size: 1.3em;
            text-indent: 90px;
            line-height : 50px;


        }
        .dodo
        {
            text-align: right;
            font-size: 1.3em;
            text-indent: 40px;

        }
        .do
        {
            text-align: justify;
            font-size: 1.3em;
            text-indent: 450px;

        }
    </style>



</head>

            <br>
            <h1>REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE</h1>

            <h1 class="introduction">WILLAYA DE BEJAIA </br>
                DAIRA D'AMIZOUR</br>
                COMMUNE DE SMAOUN
            </h1>

            <br>
            <br>
            <br><br><br>
            <div class="soso">
               ATTESTATION DE TRAVAIL
            </div>
            </br>
            </br>
            </br>

            <p class="so">Le Président de l'Assemblée Populaire Communale de La Commune de Smaoun, soussigné certifie par la présente que le nommé: <strong>{{ $results->nameSalarie }}{{" "}}{{ $results->prenomSalarie }} </strong>Né le:<strong>{{ $results->dateNaissance }}</strong>{{" "}}à <strong>{{ $results->lieuNaissance }}</strong> à été employéau sein de la commune en qualité....... </p>
            <p class="so">Du: <strong>{{ $results->dateRecrutement }}</strong> à ce jour. </P>
            <p class="so">La présente attestation est délivrée a l'intéressé pour servir et valoir ce que de droit</P>


            <P class="dodo">Fait à Smaoun le : <strong>{{date('Y,m,d')}}</strong></p>
            </br>
            <p class="do" >Le Président de l'A.P.C
            </p>


            <script type="text/javascript">
                window.print();
            </script>

</body>
</html>
