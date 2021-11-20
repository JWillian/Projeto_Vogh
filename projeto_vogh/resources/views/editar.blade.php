@extends('templates.template')

@section('content')
    <h1 class="text-center">Editar</h1> <hr>

    <div class="col-8 m-auto">

        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif

        @if(isset($pessoas))
            <form name="formEdit" id="formEdit" method="post" action="/update/{{$pessoas->id}}">
                @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="/editar">
        @endif
                @csrf
                <input class="form-control" type="text" name="nome" id="nome" placeholder="nome:" value="{{$pessoas->nome ?? ''}}" required><br>
                <input class="form-control" type="text" name="idade" id="idade" placeholder="idade:" value="{{$pessoas->idade ?? ''}}" required><br>
                <select class="form-control" name="id_user" id="id_user" required>
                    <option value="{{$pessoas->relUsers->id ?? ''}}">{{$pessoas->relUsers->name ?? 'Nome do Usuário'}}</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select><br>
                <input class="btn btn-primary" type="submit" value="Editar">
                <a href="/"><button type="button" class="btn btn-success">Voltar</button></a>
            </form>
    </div>
@endsection