@extends('templates.template')


@section('content')

<div class="container">
    <div class="row text-center my-4">
        <div class="col-lg-12">
            <img alt="User" src="/img/images.png">
            
        
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class=" my-4">Projeto Vogh_Tech</h1>
            <a href="/create">
            <button type="button" class="btn btn-success my-5"><h4>Cadastrar Uma Pessoa<h4></button>
            </a>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">Id da Pessoa</th>
                <th scope="col">Nome da Pessoa</th>
                <th scope="col">Idade</th>
                <th scope="col">Id do Usuário [User]</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pessoas as $pessoa)
                @php
                    $user=$pessoa->find($pessoa->id)->relUser;
                @endphp
                <tr>
                    <th scope="row">{{$pessoa->id}}</th>
                    <td>{{$pessoa->nome}}</td>
                    <td>{{$pessoa->idade}}</td>
                    <td>{{$user->id}}    -    [{{$user->name}}]</td>

                   
                   
                        <td>
                        <a href="editar/{{$pessoa->id}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>
                        </td>
                        <td>
                        <a href="/deletar/{{$pessoa->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Deletar</button>
                            
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection