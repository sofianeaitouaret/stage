

$(document).ready(function() {

    var $contenu_div = $('#contenu div');
    $( "script" ).empty();

    $('#nav a').on('click', function() {
        var url = $(this).attr('href');

        if(window.location.href!=$(this).attr('href')) {

            $('#contenu').waitMe({
                //effect: "progressBar",
                effect: "ios",
                text: 'Veuillez patienter ...',
                bg: 'rgba(255,255,255,0.7)',
                color: '#000',
                maxSize: '',
                source: '',
                onClose: function() {}
            });

            $('#sidebar-menu a[href="' + window.location + '"]').parent('li').addClass('current-page');
            $('#sidebar-menu a').filter(function () {
                return this.href == window.location;
            }).parent('li').removeClass('current-page').parent('ul');

            $.ajax({
                url: url,
                cache: false,
                success: function (html) {
                    
                    $contenu_div.html(html);
                    

                    $('#sidebar-menu a[href="' + window.location+ '"]').parent('li').addClass('current-page');
                    $('#sidebar-menu a').filter(function () {
                        return this.href == window.location;
                    }).parent('li').addClass('current-page').parent('ul').slideDown().parent().addClass('active');

                    $("#contenu").find("script").each(function(){
                        eval($(this).text());
                    });

                    $('#contenu').waitMe('hide');

                }
            });

            history.pushState(document.location.pathname, 'historique', url);

            document.title = $(this).text();

            window.onpopstate = function( event ){

                $('#contenu').waitMe({
                    //effect: "progressBar",
                    effect: "ios",
                    text: 'Veuillez patienter ...',
                    bg: 'rgba(255,255,255,0.7)',
                    color: '#000',
                    maxSize: '',
                    source: '',
                    onClose: function() {}
                });

                $.ajax({
                    url: document.location.href,
                    cache: false,
                    success: function(html) {

                        $contenu_div.html(html);


                        $('#sidebar-menu li').removeClass('active');
                        $('#sidebar-menu li ul li').removeClass('current-page');

                        url3 = window.location;
                        $('#sidebar-menu a[href="' + url3 + '"]').parent('li').addClass('current-page');
                        $('#sidebar-menu a').filter(function () {
                            return this.href == url3;
                        }).parent('li').addClass('current-page').parent('ul').slideDown().parent().addClass('active');

                        $('#sidebar-menu li:not(.active) ul').slideUp();


                        $("#contenu").find("script").each(function(){
                            eval($(this).text());
                        });

                        $('#contenu').waitMe('hide');

                        document.title = $("#sidebar-menu li ul li.current-page a").text();

                        /*if (document.location.pathname == ("/home")) document.title = "Accueil";
                        else if (document.location.pathname == ("/utilisateurs")) document.title = "Liste utilisateurs";
                        else if (document.location.pathname == ("/utilisateurs/ajouter")) document.title = "Ajouter utilisateurs";
                        else if (document.location.pathname == ("/user")) document.title = "Gestion des udflisdsdqdsfrs";
                        else if (document.location.pathname == ("/test2")) document.title = "Form validation";
                        else if (document.location.pathname == ("/merde")) document.title = "Merde";
                        else if (document.location.pathname == ("/account/login")) document.title = "Degout";
                        else if (document.location.pathname == ("/test")) document.title = "Les tests";
                        else if (document.location.pathname == ("/test/create")) document.title = "Ajouter un test";*/

                    }

                });


            };

        }
        return false;
    });

});
