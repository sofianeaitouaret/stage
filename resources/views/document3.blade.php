<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des absences</title>

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
        .mo
        {
            text-align: center;
            font-size: 1.3em;

            line-height : 25px;


        }
        table
        {
            border-collapse: collapse; /* Les bordures du tableau seront collées (plus joli) */
            width:800px;
        }
        td
        {
            border: 1px solid black;
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
    Liste des absences
</div>
</br>
</br>
</br>

<table>
    <tr>
        <td class="mo">Numero</td>
        <td class="mo">Nom</td>
        <td class="mo">Prénom</td>
        <td class="mo">Date de l'absence</td>
        <td class="mo">Durée</td>
    </tr>

    </tr>
    <tr>
        @foreach( $absences as $absence)
            <td class="mo">{{ $absence->id}}</td>
            @foreach( $salaries as $salarie)
                @if($salarie->id == $absence->salarie_id)
                    <td class="mo">{{ $salarie->nameSalarie}}</td>
                    <td class="mo">{{ $salarie->prenomSalarie}}</td>
                @endif
            @endforeach
            <td class="mo">{{ $absence->dateDebut}}</td>
            <td class="mo">{{ $absence->duree}}</td>


    </tr>



    @endforeach
</table>
</br>
</br>
<P class="dodo">Fait à Smaoun le : <strong>{{date('Y-m-d')}}</strong></p>
</br>
<p class="do" >Le Président de l'A.P.C
</p>


<script type="text/javascript">
    window.print();
</script>



</body>
</html>
