@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-6 margin-tb">
            <h2>Adicionar novo tipo de telefone</h2>
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

<form action="{{ route('type.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tipo de telefone:</strong>
                <input type="text" name="name" class="form-control" placeholder="Type de telefone">
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
