<?php
Route::auth();
Route::get('/', function () {return redirect('/home');});
Route::get('email', 'EmailController@getForm');
Route::post('email', ['uses' => 'EmailController@postForm', 'as' => 'storeEmail']);

Route::resource('user', 'SalarieController');
Route::resource('absence', 'AbsenceController');
Route::resource('conge', 'CongeController');

Route::get('/erreur', 'WelcomeController@erreur');


Route::get('/home', 'HomeController@index');

Route::get('/contrat', 'WelcomeController@indexx');
Route::post('/contrat', 'WelcomeController@indexx2');

Route::get('/employes', 'HomeController@index2');
Route::get('/employes_retraités', 'HomeController@retraités');
Route::get('/show_employes_retraités/{n}', 'SalarieController@show2');

Route::get('/{n}/editer', 'SalarieController@vueEditerUtilisateurs');
Route::post('/{n}/editer', 'SalarieController@editerUtilisateurs');

Route::get('/{n}/editer_absence', 'AbsenceController@vueEditerUtilisateurs');
Route::post('/{n}/editer_absence', 'AbsenceController@editerUtilisateurs');

Route::get('/{n}/editer_congé', 'CongeController@vueEditerUtilisateurs');
Route::post('/{n}/editer_congé', 'CongeController@editerUtilisateurs');



Route::post('/{n}/supprimer', 'AbsenceController@supprimerUtilisateurs');

Route::post('/{n}/supprimer_employé', 'SalarieController@supprimerUtilisateurs');
Route::post('/{n}/supprimer_congé', 'CongeController@supprimerUtilisateurs');

Route::post('/modifier_employes', 'SalarieController@soso');

Route::get('/Ajouter_employe', 'HomeController@ajouter');
Route::post('/Ajouter_employe', 'HomeController@ajouter2');

Route::get('/{n}/retraite_employe', 'SalarieController@retraite');
Route::post('/{n}/retraite_employe', 'SalarieController@retraite2');

Route::get('/Liste_conge', 'WelcomeController@listeConge');

Route::get('/Ajouter_conge', 'WelcomeController@index');
Route::post('/Ajouter_conge', 'WelcomeController@index2');


Route::get('/Titre_de_conge', 'WelcomeController@index');
Route::post('/Titre_de_conge', 'WelcomeController@index2');

Route::get('/Conges_en_cours', 'WelcomeController@listeConge2');
Route::get('/Salaries_par_bureau', 'WelcomeController@parBureau');



Route::get('/print_excel', 'HomeController@printe');

Route::get('/Listeabsence', 'HomeController@index3');

Route::get('/Absences_date', 'WelcomeController@Date');
Route::post('/Absences_date', 'WelcomeController@Date2');

Route::get('/absence_document', 'HomeController@printe2');


Route::get('/print_excel_absence', 'HomeController@printe2');

Route::get('/certificat_de_travail', 'HomeController@index4');
Route::post('/certificat_de_travail', 'HomeController@index44');

Route::get('/attestation_de_travail', 'HomeController@index5');
Route::post('/attestation_de_travail', 'HomeController@index55');




Route::get('/signalerAbsence', 'WelcomeController@signaler');
Route::post('/signalerAbsence', 'WelcomeController@signaler2');

Route::get('/Ajouter_un_bureau', 'WelcomeController@bureau');
Route::post('/Ajouter_un_bureau', 'WelcomeController@bureau2');

Route::get('/Ajouter_un_service', 'WelcomeController@service');
Route::post('/Ajouter_un_service', 'WelcomeController@service2');

Route::get('/Ajouter_un_grade', 'WelcomeController@grade');
Route::post('/Ajouter_un_grade', 'WelcomeController@grade2');

Route::get('/Ajouter_un_contrat', 'WelcomeController@contrat');
Route::post('/Ajouter_un_contrat', 'WelcomeController@contrat2');


//Route::get('/', 'WelcomeController@index');
Route::resource('post', 'PostController', ['except' => ['show', 'edit', 'update']]);

