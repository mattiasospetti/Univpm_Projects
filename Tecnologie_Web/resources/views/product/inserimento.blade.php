@extends('layout.staff')

@section('title' , 'Inserimento' )
@section('scripts')
@parent  

<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('inserimento.store') }}";
    var formId = 'addproduct';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#addproduct").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });
});

$(function () {
    $('#discountPerc').hide();
    $('.label-discount').hide();
    $('#discounted').change(function (event) {
        var nid = $(this).val();
        if (nid === '1') {
            $('#discountPerc').show();
            $('.label-discount').show();
        }
        if (nid === '0') {
            $('.label-discount').hide();
            $('#discountPerc').hide();
        }
    }
    )
});
</script>


@endsection

@section('content')
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/staff.css') }}" >
</head>
<div class="contforminsprodotto">
    <div class="forminsprodotto">
        <h3>Aggiungi Prodotti</h3>
        <p>Utilizza questa form per inserire un nuovo prodotto nel Catalogo</p>

        <div class="">
            <div class="">
                {{ Form::open(array('route' => 'inserimento.store', 'id' => 'addproduct', 'files' => true, 'class' => 'contact-form')) }}
                <div  class="">
                    {{ Form::label('name', 'Nome Prodotto: ', ['class' => 'label-input']) }}
                    {{ Form::text('name', '', ['class' => 'input', 'id' => 'name']) }}

                </div>

                <br>

                <div  class="">
                    {{ Form::label('catId', 'Categoria: ', ['class' => 'label-input']) }}
                    {{ Form::select('catId', $cats, '', ['class' => 'input','id' => 'catId']) }}
                </div>

                <br>

                <div  class="">
                    {{ Form::label('image', 'Immagine: ', ['class' => 'label-input']) }}
                    {{ Form::file('image', ['class' => 'input', 'id' => 'image']) }}

                </div>

                <br>

                <div  class="">
                    {{ Form::label('descShort', 'Descrizione Breve: ', ['class' => 'label-input']) }}
                    {{ Form::text('descShort', '', ['class' => 'input', 'id' => 'descShort']) }}

                </div>

                <br>

                <div  class="">
                    {{ Form::label('price', 'Prezzo: ', ['class' => 'label-input']) }}
                    {{ Form::text('price', '', ['class' => 'input', 'id' => 'price']) }}

                </div>

                <br>

                <div  class="">
                    {{ Form::label('discounted', 'In Sconto: ', ['class' => 'label-input']) }}
                    {{ Form::select('discounted', ['0' => 'No', '1' => 'Si'], 0, ['class' => 'input','id' => 'discounted']) }}
                </div>

                <br>

                <div  class="">
                    {{ Form::label('discountPerc', 'Sconto (%): ', ['class' => 'label-discount']) }}
                    {{ Form::text('discountPerc', '0', ['class' => 'input', 'id' => 'discountPerc']) }}

                </div>

                <br>

                {{ Form::label('descLong', 'Descrizione Estesa: ', ['class' => 'label-input']) }}
                <div  class="boxdesclong">
                    {{ Form::textarea('descLong', '', ['class' => 'input', 'id' => 'descLong', 'rows' => 3, 'placeholder' => 'max 1500 caratteri']) }}

                </div>

                <br>

                <div class="bottoneins">                
                    {{ Form::submit('Aggiungi Prodotto', ['class' => 'form-btn1', 'id'=> 'bottone']) }}
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection

