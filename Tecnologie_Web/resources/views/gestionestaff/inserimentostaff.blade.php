@extends('layout.admin')

@section('title' , 'Inserisci Staff' )

@section('content')
<div class="contenitoreforminsstaff">
    <div class="forminsstaff">
        <p> Inserisci un nuovo utente dello staff </p>
        {{ Form::open(array( 'route' => 'inserimentostaff', 'id'=>'inserisci', 'method'=>'post')) }}


        <div class="input-group">
            {{ Form::label('username', 'Username: ', ['class' => 'label-input'])}}
            &nbsp;
            {{ Form::text('username' , null, ['class' => 'input', 'id' => 'username']) }}
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
            {{ Form::label('nome', 'Nome: ', ['class' => 'label-input'] )}}
            &nbsp;
            {{ Form::text('nome', null, ['class' => 'input', 'id' => 'nome']) }}
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
            {{ Form::label('cognome', 'Cognome: ', ['class' => 'label-input']) }}
            &nbsp;
            {{ Form::text('cognome',null, ['class' => 'input', 'id' => 'cognome']) }}
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
            {{ Form::label('password', 'Password: ', ['class' => 'label-input']) }}
            &nbsp;
            {{ Form::password('password', null, ['class' => 'label-input', 'id' => 'password'] ) }}
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
            {{ Form::label('password_confirmation', 'Conferma Password: ', ['class' => 'label-input']) }}
            &nbsp;
            {{ Form::password('password_confirmation' ) }}
        </div>


        <br>
        <br>

        <div class="bottone">
            {{ Form::submit('Inserisci', ['class' => 'form-btn1', 'id'=> 'bottone']) }}
        </div>
        {{Form::close()}}

    </div>
</div>
@endsection
