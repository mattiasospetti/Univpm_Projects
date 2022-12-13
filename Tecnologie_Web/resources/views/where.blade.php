@extends ('layout.public')

@section ('title','Chi siamo')

@section('content')
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/where.css') }}" >
</head>
<hr>

<div class="dove_siamo">
    <div class="descrizione">
        <p>La nostra concessionaria offre i migliori servizi per l'acquisto di automobili, motoveicoli, camper, quad. <br> Offriamo assistenza e massima disponibilità. </p>
    </div>
    <hr>
    <div class="mappa">
        <p>Puoi trovarci qui:</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2889.9489824925204!2d13.51440631545738!3d43.586778979123594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132d80233dd931ef%3A0x161719e4f3f5daaf!2sUniversit%C3%A0%20Politecnica%20delle%20Marche%20-%20Facolt%C3%A0%20di%20Ingegneria!5e0!3m2!1sit!2sit!4v1589916058566!5m2!1sit!2sit"  target="_blank" frameborder="0" style="border:0;"  width="1000px" height="400px"> </iframe>
    </div>
</div>
@endsection
