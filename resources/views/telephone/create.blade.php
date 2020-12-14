@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-6 margin-tb">
            <h2>Adicionar novo telefone</h2>
    </div>
    <div class="col-lg-6 margin-tb text-right">
            <a class="btn btn-primary" href="{{ route('contact') }}"> Voltar</a>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opa!</strong> Houve alguns problemas com sua entrada.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('telephone.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Tipo de telefone:</strong>
                <select name="telephone_type_id" class="form-control" >
                    <option value="">Selecione</option>
                    @foreach ($types_telephones as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="form-group">
                <a class="btn btn-secondary mt-4" href="{{ route('type.create',['contact' => $contact]) }}"> Adicionar novo tipo</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefone:</strong>
                <input type="text" name="telephone" id="telephone" class="form-control phone_ddd" placeholder="Telefone">
                <input type="hidden" name="contact_id" value="{{$contact->id}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>

</form>
</div>
@endsection

@section('js')
<script>
 function mascaraTelefone( campo ) {

      function trata( valor,  isOnBlur ) {
         valor = valor.replace(/\D/g,"");
         valor = valor.replace(/^(\d{2})(\d)/g,"($1)$2");
         if( isOnBlur ) {
            valor = valor.replace(/(\d)(\d{4})$/,"$1-$2");
         } else {
            valor = valor.replace(/(\d)(\d{3})$/,"$1-$2");
         }
         return valor;
      }

      campo.onkeypress = function (evt) {
         var code = (window.event)? window.event.keyCode : evt.which;
         var valor = this.value
         if(code > 57 || (code < 48 && code != 8 ))  {
            return false;
         } else {
            this.value = trata(valor, false);
         }
      }

      campo.onblur = function() {

      var valor = this.value;
         if( valor.length < 13 ) {
            this.value = ""
         }else {
            this.value = trata( this.value, true );
         }
      }

      campo.maxLength = 14;
 }
 mascaraTelefone( document.getElementById('telephone') );
</script>
@endsection
