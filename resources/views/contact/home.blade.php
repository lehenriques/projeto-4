@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        <div class="col-lg-6 margin-tb">
                <h2>Lista de contatos</h2>
        </div>
        <div class="col-lg-6 margin-tb text-right">
                <a class="btn btn-success" href="{{ route('contact.create') }}"> Criar novo Contato</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="50px">No</th>
            <th width="60%">Name</th>
            <th>Action</th>
        </tr>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $contact->name }}</td>
            <td>
                <form action="{{ route('contact.destroy', ['contact' => $contact->id]) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('contact.email', ['contact' => $contact->id]) }}">E-mail</a>
                    <a class="btn btn-info" href="{{ route('contact.telephone', ['contact' => $contact->id]) }}">Telefone</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $contacts->links() !!}
</div>
@endsection
