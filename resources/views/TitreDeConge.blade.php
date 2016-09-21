<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Titre de congé</title>

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

            line-height : 10px;


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

            line-height : 10px;


        }
        table
        {
            border-collapse: collapse; /* Les bordures du tableau seront collées (plus joli) */
        width:800px;
            height:150px;"
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
    TITRE DE CONGE </br> Exercice {{ date('Y') }}
</div>
</br>
</br>
</br>

<p class="so">Nom : <strong>{{ $nom }} </strong></p>
<p class="so">Prénom : <strong>{{ $prenom }}</strong> </P>
<p class="so">Grade :<strong> {{ $grade->nomGrade}}</strong> </P>
<p class="so">Date de sortie :<strong> {{ $dateDebut	 }}</strong> </P>
<p class="so">date de retour :<strong> {{ $dateFin }}</strong> </P>
<p class="so">Durée du congé :<strong> {{ $duree }}</strong></P>
<p class="so">Reliquat :<strong> ...</strong>  jours</P>
</br>
<table>
    <tr>
        <td class="mo">Signature de l'intéressé</td>
        <td class="mo">Nom et prénom du remplaçant</td>

    </tr>
    <tr>
        <td class="mo">.............................</td>
        <td class="mo">.............................</td>

    </tr>
</table>
</br>

<P class="dodo">Fait à Smaoun le : <strong>{{date('Y,m,d')}}</strong></p>
</br>
<p class="do" >Le Président de l'A.P.C
</p>


<script type="text/javascript">
    window.print();
</script>



</body>
</html>
