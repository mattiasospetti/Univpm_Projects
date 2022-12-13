<div class="nav-bg-color">
    <div class="nav-contain" style="float:right;">
        <div class="nav-list">
            <div class="elementi_nav">
                <a class="menu" href="{{route ('home')}}">Homepage</a>
                <a class="menu" href="{{route ('where')}}">Chi siamo</a>
                <a class="menu" href="{{route ('who')}}">Contattaci</a>
                <a class="menu" href="{{route ('admin')}}"> Area Admin </a>
                <a class="menu" href="{{route ('inserimentostaff')}}"> Inserimento Staff </a> 
                <a class="menu" href="{{route ('listastaff')}}"> Lista Staff </a> 
                <a class="menu" href="{{route ('listautenti')}}"> Lista Utenti </a>
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