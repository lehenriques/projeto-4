@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        <div class="col-lg-6 margin-tb">
                <h2>Lista de e-mails do {{$contacts->name || ''}}</h2>
        </div>
        <div class="col-lg-6 margin-tb text-right">
                <a class="btn btn-success" href="{{ route('email.create',['contact' => $contacts]) }}"> Adicionar Email</a>
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
        @foreach ($contacts->email as $email)
        <tr>
            <td>{{ $email->email }}</td>
            <td>
                <form action="{{ route('email.destroy',['email' => $email, 'contact' => $contacts]) }}" method="POST">
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
