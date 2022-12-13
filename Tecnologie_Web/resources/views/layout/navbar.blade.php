
<div class="nav-bg-color">
    <div class="nav-contain" style="float: right;">
        <div class="nav-list">
            <div class="elementi_nav">
                <a class="menu" href="{{route ('home')}}">Homepage</a>
                <a class="menu" href="{{route ('where')}}">Chi siamo</a>
                <a class="menu" href="{{route ('who')}}">Contattaci</a>
                @guest
                <a class="menu" href="{{ route('register') }}"> Registrati </a>
                @endguest
                @auth
                <a href="" class="menu menulogin" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @endauth
                @guest
                <a class="menu" style="float: right">
                    {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
                    {{ Form::text('username', '', ['class' => 'input', 'id' => 'username','placeholder' => 'Username']) }}
                    {{ Form::password('password', ['class' => 'input', 'id' => 'password', 'placeholder' => 'Password']) }}
                    {{ Form::submit('Login', ['class' => 'form-btn1']) }}
                    @if ($errors->first('username'))
                    <ul class="errors">
                        @foreach ($errors->get('username') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    {{ Form::close() }}    
                </a>
                @endguest
            </div>
        </div>
    </div>
</div> 