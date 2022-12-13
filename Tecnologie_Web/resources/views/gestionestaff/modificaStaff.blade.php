@extends('layout.admin')

@section('title' , 'Modifica Staff' )

@section('content')

<div class="contenitoreforminsstaff">
    <div class="forminsstaff">
        @isset($staff)
        {{ Form::open(array( 'route'=> ['modificast', $staff->id], 'id'=>'mods' , 'method'=>'post')) }}

        <div class="username">
            <h2> Username: {{$staff->username}} </h2>
        </div>

        <br>
        <br>

        <div class="input-group">
            {{ Form::label('nome', 'Nome: ' , ['class' => 'label'])}}
            &nbsp;
            &nbsp;
            {{ Form::text('nome', $staff->nome, ['class' => 'input', 'id' => 'nome']) }}
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
            {{ Form::label('cognome', 'Cognome: ' , ['class' => 'label'])}}
            &nbsp;
            &nbsp;
            {{ Form::text('cognome', $staff->cognome, ['class' => 'input', 'id' => 'cognome']) }}
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

            {{ Form::label('password', 'Nuova Password: ', ['class' => 'label-input']) }}
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

            {{ Form::label('password_confirmation', 'Conferma password: ', ['class' => 'label-input']) }}
            &nbsp;
            &nbsp;
            {{ Form::password('password_confirmation', ['class' => 'input', 'id' => 'password_confirmation']) }}

        </div>

        <br>
        <br>

        <div id="bottone" style="text-align: center">
            {{ Form::submit('Modifica', ['class' => 'form-btn1']) }}
        </div>
        {{Form::close()}}
    </div>
</div>
@endisset
@endsection