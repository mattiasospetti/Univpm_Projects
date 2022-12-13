@extends('layout.public')

@section('title' , 'Registrazione')

@section('content')
<div class="registrati">
    <div class="contenitoremod">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-post">
                    <p>Registrati: </p>
                    <br>
                    
                    {{ Form::open(array('route' => 'register', 'class' => 'contact-form')) }}

                    @csrf

                    <div class="input-group">
                        {{ Form::label('nome', 'Nome', ['class' => 'label-input']) }}
                        &nbsp;
                        &nbsp;
                        {{ Form::text('nome', '', ['class' => 'input', 'id' => 'nome']) }}
                        @if ($errors->first('nome'))
                        <ul class="errors">
                            @foreach ($errors->get('nome') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>

                    <br>
                    <br>

                    <div class="input-group">
                        {{ Form::label('cognome', 'Cognome', ['class' => 'label-input']) }}
                        &nbsp;
                        &nbsp;
                        {{ Form::text('cognome', '', ['class' => 'input', 'id' => 'cognome']) }}
                        @if ($errors->first('cognome'))
                        <ul class="errors">
                            @foreach ($errors->get('cognome') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>


                    <br>
                    <br>


                    <div class="input-group">
                        {{ Form::label('residenza', 'Luogo di residenza', ['class' => 'label-input']) }}
                        &nbsp;
                        &nbsp;
                        {{ Form::text('residenza', '', ['class' => 'input', 'id' => 'residenza']) }}
                        @if ($errors->first('residenza'))
                        <ul class="errors">
                            @foreach ($errors->get('residenza') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>

                    <br>
                    <br>


                    <div class="input-group">
                        {{ Form::label('data', 'Data di nascita', ['class' => 'label-input']) }}
                        &nbsp;
                        &nbsp;
                        {{ Form::date('data', '', ['class' => 'input', 'id' => 'data']) }}
                        @if ($errors->first('data'))
                        <ul class="errors">
                            @foreach ($errors->get('data') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>

                    <br>
                    <br>


                    <div class="input-group">
                        {{ Form::label('occupazione', 'Occupazione', ['class' => 'label-input']) }}
                        &nbsp;
                        &nbsp;
                        {{ Form::select('occupazione', ['Studente', 'Operaio' , 'Impiegato', 'Privato'] ,'' , ['id' => 'occupazione']) }}
                    </div>

                    <br>
                    <br>


                    <div class="input-group">
                        {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
                        &nbsp;
                        &nbsp;
                        {{ Form::text('email', '', ['class' => 'input', 'id' => 'email']) }}

                        @if ($errors->first('email'))
                        <ul class="errors">
                            @foreach ($errors->get('email') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>


                    <br>
                    <br>


                    <div class="input-group">

                        {{ Form::label('username', 'Username', ['class' => 'label-input']) }}
                        &nbsp;
                        &nbsp;
                        {{ Form::text('username', '', ['class' => 'input', 'id' => 'username']) }}
                        @if ($errors->first('username'))
                        <ul class="errors">
                            @foreach ($errors->get('username') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>


                    <br>
                    <br>

                    <div class="input-group">

                        {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                        &nbsp;
                        &nbsp;
                        {{ Form::password('password', ['class' => 'input', 'id' => 'password']) }}

                        @if ($errors->first('password'))
                        <ul class="errors">
                            @foreach ($errors->get('password') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>

                    <br>

                    <div class="input-group">

                        {{ Form::label('password-confirm', 'Conferma password', ['class' => 'label-input']) }}
                        &nbsp;
                        &nbsp;
                        {{ Form::password('password_confirmation', ['class' => 'input', 'id' => 'password-confirm']) }}

                        @if ($errors->first('password_confirmation'))
                        <ul class="errors">
                            @foreach ($errors->get('password_confirmation') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>


                    <br>
                    <br>

                    <div id="bottone">
                        {{ Form::submit('Registrati', ['class' => 'form-btn1']) }}
                        &nbsp;
                        {{ Form::reset('Reset', ['class' => 'form-btln']) }}  
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
