@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        <div class="col-lg-6 margin-tb">
                <h2>Telefones do {{$contacts->name}}</h2>
        </div>
        <div class="col-lg-6 margin-tb text-right">
                <a class="btn btn-success" href="{{ route('telephone.create',['contact' => $contacts]) }}"> Adicionar Telefone</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th width="100px">Action</th>
        </tr>
        @foreach ($contacts->telephones as $telephone)
        <tr>
            <td>{{ $telephone->telephone }}</td>
            <td>
                <form action="{{ route('telephone.destroy', ['telephone' => $telephone]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection

