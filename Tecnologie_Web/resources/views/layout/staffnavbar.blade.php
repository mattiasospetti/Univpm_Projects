<div class="nav-bg-color">
    <div class="nav-contain" style="float:right;">
        <div class="nav-list">
            <div class="elementi_nav">
                <a class="menu" href="{{route ('home')}}">Homepage</a>
                <a class="menu" href="{{route ('where')}}">Chi siamo</a>
                <a class="menu" href="{{route ('who')}}">Contattaci</a>
                <a class="menu" href="{{route ('staff')}}"> Area Staff </a>
                <a class="menu" href="{{route ('inserimento')}}"> Inserisci Prodotto </a>
                <a class="menu" href="{{route ('showProducts')}}"> Modifica/Elimina Prodotto </a>
                <a class="menu" href="{{route ('insertcat')}}"> Inserisci Categorie </a>
                @auth
                <a href="" class="menu_login" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @endauth
            </div>
        </div>
    </div>
</div>
