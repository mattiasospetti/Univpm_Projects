@extends ('layout.public')

@section ('title','Contattaci')

@section('content')
<div class="testo">
    <h5>Nel caso in cui si presentassero problemi di spedizione, acquisto o eventuali danni del veicolo </h5>
    <br>
<h4> Puoi trovarci su: </h4>
</div>
<hr>
<ul id="listalogo">
    <li>
        <div class="contenitore">
            <a href="https://it-it.facebook.com/" target="_blank" ><img src ="{{asset('css/images/logofb.jpeg')}}" width="80px" height="80px" ></a>
        </div>
        <a href="https://it-it.facebook.com/" target="_blank" >Facebook</a>
    </li> 
    <li> 
        <div class="contenitore">
            <a href="https://www.instagram.com/?hl=it" target="_blank"> <img src ="{{asset('css/images/logoinsta.jpg')}}" width="80px" height="80px" ></a>
        </div>
        <a href="https://www.instagram.com/?hl=it" target="_blank" >Instagram</a>
    </li>
    <li>
        <div class="contenitore">
            <a href="https://twitter.com/login?lang=it" target="_blank"> <img src ="{{asset('css/images/logotwitter.png')}}" width="80px" height="80px" ></a>
        </div>
        <a href="https://twitter.com/login?lang=it" target="_blank" >Twitter</a>
    </li>
    <li> 
        <div class="contenitore">
            <a href="https://it.linkedin.com/" target="_blank"> <img src ="{{asset('css/images/logolinkedin.png')}}" width="80px" height="80px" ></a>
        </div>
        <a href="https://it.linkedin.com/" target="_blank" >Linkedin</a>
    </li>
    <li>
        <div class="contenitore">
            <a href=mailto: indirizzo@esempio.com> <img src="{{asset('css/images/logoemail.png')}}" width="80px" heigth="80px" > </a>
        </div>
        <a href=mailto: indirizzo@esempio.com>indirizzo@esempio.it</a>
    </li>        
</ul>   
@endsection
