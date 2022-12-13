@extends('layout.public')

@section('title' , 'Modifica Password' )

@section('content')    
<div id="contenitorepassw">
    <div class="modificapassword">

        <p> Modifica la password del tuo profilo</p>


        {{ Form::open(array( 'route'=> 'modificaPassword', 'method'=>'post')) }}

        <div id='input-group'>
            {{ Form::label('old_password', 'Vecchia password: ', ['class' => 'label-input']) }}
            &nbsp;
            &nbsp;
            {{ Form::password('old_password', ['class' => 'input', 'id' => 'old_password']) }}
            @if ($errors->first('old_password'))
            <ul class="errors">
                @foreach ($errors->get('old_password') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <br>

        <div id='input-group'>
            {{ Form::label('password', 'Nuova password: ', ['class' => 'label-input']) }}
            &nbsp;
            &nbsp;
            {{ Form::password('modpassword', ['class' => 'input', 'id' => 'modpassword']) }}
            @if ($errors->first('modpassword'))
            <ul class="errors">
                @foreach ($errors->get('modpassword') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <br>

        <div id='input-group'>
            {{ Form::label('password_confirmation', 'Conferma password: ', ['class' => 'label-input']) }}
            &nbsp;
            &nbsp;
            {{ Form::password('modpassword_confirmation', ['class' => 'input', 'id' => 'modpassword_confirmation']) }}
        </div>

        <div id="bottone">
            {{ Form::submit('Modifica', ['class' => 'form-btn1']) }}
        </div>
        {{Form::close()}}
    </div>
</div>

@endsection