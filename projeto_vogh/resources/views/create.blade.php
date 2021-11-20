@extends('templates.template')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class=" my-5">cadastrar</h1>
           
            <form name="formCad" id="formCad" method="post" action="{{url('/create')}}">
            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome da Pessoa:"><br>
            <input class="form-control" type="text" name="idade" id="idade" placeholder="idade:" required><br>
            <select class="form-control" name="id_user" id="id_user">
                <option value="">Usuário</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select><br>
            <input class="btn btn-primary" type="submit" value="Cadastrar">
            <a href="/"><button type="button" class="btn btn-success">Voltar</button></a>
        </form>
        </div>
    </div>
</div>


@endsection