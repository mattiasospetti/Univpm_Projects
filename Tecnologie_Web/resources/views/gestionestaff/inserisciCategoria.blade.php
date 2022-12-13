@extends('layout.staff')

@section('title' , 'Inserisci Categoria')
@section('scripts')
@parent
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    $(function () {
        $('.sceltaMic').hide();
        $('#sceltaCat').change(function (event) {
            var nid = $(this).val();
            if (nid === '0') {
                $('.image').show();
                $('.sceltaMic').hide();
            }
            if (nid === '1') {
                $('.sceltaMic').show();
                $('.image').hide();
            }
        }
        )
    }
    );
</script>
@endsection
@section('content')
<div class="contforminsprodotto">
    <div class="forminsprodotto">
        <h3>Aggiungi Categorie</h3>
        <p>Utilizza questa form per inserire nuove categorie </p>

        <div class="">
            <div class="">
                {{ Form::open(array('route' => 'insertcat', 'files' => true, 'class' => 'contact-form')) }}

                <div  class="sceltaCat">
                    {{ Form::label('sceltaCat', 'Scelta Livello: ', ['class' => 'label-input']) }}
                    {{ Form::select('sceltaCat', ['0' => 'Macrocategoria', '1' => 'Microcategoria'], ['class' => 'input', 'id' => 'sceltaCat']) }}
                </div>

                <br>

                <div  class="">
                    {{ Form::label('sceltaMic', 'MacroCategoria: ', ['class' => 'sceltaMic', 'id' =>'sceltaMic']) }}
                    {{ Form::select('sceltaMic', $macro , '1', ['class' => 'sceltaMic','id' => 'sceltaMic']) }}
                </div>

                <br>

                <div  class="">
                    {{ Form::label('name', 'Nome Categoria: ', ['class' => 'label-input']) }}
                    {{ Form::text('name', '', ['class' => 'input', 'id' => 'name']) }}
                </div>

                <br>

                <div  class="">
                    {{ Form::label('desc', 'Descrizione Breve: ', ['class' => 'label-input']) }}
                    {{ Form::text('desc', '', ['class' => 'input', 'id' => 'desc']) }}
                </div>

                <br>

                <div  class="">
                    {{ Form::label('image', 'Immagine: ', ['class' => 'image']) }}
                    {{ Form::file('image', ['class' => 'image', 'id' => 'image']) }}
                </div>

                <br>

                <div class="bottoneins">                
                    {{ Form::submit('Aggiungi Categoria', ['class' => 'form-btn1', 'id'=> 'bottone']) }}
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection