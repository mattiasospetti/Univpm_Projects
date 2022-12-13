<html>
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- font awesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- owl carousel -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
        <!--fonts   -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('css/images/auto-image.jpg') }}">
        <!--<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" media="screen"/>-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/who.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/where.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}" >
        <title>  UNIAuto | @yield('title', 'default') </title>
        @show
        @section('scripts')
        @show
    </head>
    <body>
        @guest
        @include('layout/navbar')
        @endguest
        @can('isUser')
        @include('layout/usernavbar')
        @endcan
        @can('isStaff')
        @include('layout/staffnavbar')
        @endcan
        @can('isAdmin')
        @include('layout/adminnavbar')
        @endcan
        <div class="main-container carousel-height">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">            
                <div class="carousel-inner">
                    <div class="carousel-item active first-slider">
                        <div class="inside-container">
                            <div class="row row-head">
                                <div class="col-lg-12  ">
                                    <div class="carousel-text">
                                        <h1>Concessionaria UNIAuto, tutti i veicoli a tua disposizione </h1>
                                        <p>Sempre disponibili con sconti imperdibili <br> Tutti i veicoli che cerchi li puoi trovare qui </p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>  
                </div>     
            </div>
        </div>
        
        <br>
        <br>
        
        <div id="blog-description">
            <div class="text-center" style="margin: -20 20 10 20 ; font-style: italic">
            <p>
            La concessionaria d'auto UNIAuto è quell'azienda che vende auto e veicoli nuovi. Inoltre svolge altre attività  complementari quali i lavori di officina e 
            le vendite di magazzino. Il nostro obiettivo è quello di offrire il più vasto catalogo di veicoli possibile.
            </p>
            </div>
        </div>
        
        <div class="contenuto">
        @yield('content')
        </div>
        
        <footer class="page-footer footer-bg">
            <div class="inside-container">
                <div class="row footer-padd">
                    <div class=" col-sm-6 col-lg-3 foot-col-padd">
                        <div class="dream-text"> 
                            <p>Puoi anche trovarci su questi social:</p>
                        </div>
                        <div>
                            <a href="https://it-it.facebook.com/" target="_blank"><i class="fab fa-facebook-f foot-icon "> </i> </a>
                            <a href="https://twitter.com/login?lang=it" target="_blank"> <i class="fab fa-twitter foot-icon "></i> </a>
                            <a href="https://it.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in foot-icon "></i> </a>
                        </div>
                    </div>      
                    <div class=" col-sm-6 col-lg-3 pop-col">
                        <span> Link popolari </span>
                        <hr>
                        <div class="row">
                            <div class="col-6 pop-link">
                                <a href="{{route ('where')}}"> Chi siamo </a> 
                                <a href="{{route ('who')}}"> Contattaci </a>
                                <a href="{{route ('modalita')}}"> Modalità di Acquisto </a>
                                <a href="{{route ('iscrizione')}}"> Modalità d'Iscrizione </a>
                            </div>
                            <div class=" col-6  pop-link">
                                <a href="{{route ('privacy')}}"> Privacy Policy </a> 
                                <a href="{{asset('DocumentazioneGRP_08.pdf')}}" target="_blank"> Documentazione </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6  col-lg-3 pop-col">
                        <span> Recenti notizie </span>
                        <hr>
                        <div class="row ltl-blog row-ltl-blog">
                            <div class="col-9 max-award">
                                <p> Il nostro Team di sviluppo vi ringrazia per aver visualizzato il nostro sito</p>
                            </div>
                        </div>
                    </div>

                </div>
        </footer>
    </div>
</body>
</html>
