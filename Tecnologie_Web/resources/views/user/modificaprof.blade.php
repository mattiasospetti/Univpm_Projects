@extends('layout.public')

@section('title' , 'Modifica Profilo' )

@section('scripts')
@parent  

<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('modificaprof') }}";
    var formId = 'modifica';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#modifica").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });
});
</script>
@endsection

@section('content')
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modifica_profilo.css') }}" >
</head>
@isset($user)
<div class="modifica">
    <div class="contenitoremod">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-post">
                    {{ Form::open(array( 'route'=> 'modificaprof', 'id'=>'modifica', 'method'=>'post')) }}
                    @csrf
                    <div class="username">
                        <h2> Username: {{$user->username}} </h2>
                    </div>

                    <br>
                    <br>

                    <div class="input-group">
                        {{ Form::label('nome', 'Nome: ' , ['class' => 'label'])}}
                        &nbsp;
                        &nbsp;
                        {{ Form::text('nome', $user->nome, ['class' => 'input', 'id' => 'nome']) }}
                    </div>

                    <br>
                    <br>


                    <div class="input-group">
                        {{ Form::label('cognome', 'Cognome: ', ['class' => 'label-input']) }}
                        &nbsp;
                        &nbsp;
                        {{ Form::text('cognome', $user->cognome , ['class' => 'input', 'id' => 'cognome']) }}
                    </div>


                    <br>
                    <br>



                    <div class="input-group">
                        {{ Form::label('residenza', 'Luogo di residenza: ', ['class' => 'label-input']) }}
                        &nbsp;
                        &nbsp;
                        {{ Form::text('residenza', $user->residenza , ['class' => 'input', 'id' => 'residenza']) }}
                    </div>

                    <br>
                    <br>


                    <div class="input-group">
                        {{ Form::label('data', 'Data di nascita: ', ['class' => 'label-input',]) }}
                        &nbsp;
                        &nbsp;
                        {{ Form::date('data', $user->data, ['class' => 'input', 'id' => 'data']) }}
                    </div>


                    <br>
                    <br>


                    <div class="input-group">
                        {{ Form::label('occupazione', 'Occupazione: ', ['class' => 'label-input']) }}
                        &nbsp;
                        &nbsp;
                        {{ Form::select('occupazione', ['Studente', 'Operaio' , 'Impiegato', 'Privato'] , $user->occupazione , ['class' => 'input','id' => 'occupazione']) }}
                    </div>


                    <br>
                    <br>



                    <div class="input-group">
                        {{ Form::label('email', 'Email: ', ['class' => 'label-input']) }}
                        &nbsp;
                        &nbsp;
                        {{ Form::text('email', $user->email , ['class' => 'input', 'id' => 'email']) }}
                    </div>


                    <br>
                    <br>
                    
                    <a href="{{route ('modificaPassword')}}" > Modifica Password </a>

                    <br>
                    <br>

                    <div id="bottone">
                        {{ Form::submit('Modifica', ['class' => 'form-btn1']) }}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endisset
@endsection