{{-- @extends('user.layouts.userlayout') --}}
@extends('layouts.app')

@section('title','Gestão dos Cursos')

@section('content')
    
<h1>Cursos</h1>
<header>
    <div class="container" id="nav-container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('cursos.index') }}">Lista dos Cursos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('cursos.create') }}">Cadastrar Curso</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('inscricao.create') }}">Inscrever-se em um Curso</a>
                  </li>
                  @can('admin')
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('inscricao.index') }}">Admnistrar Inscrições</a>
                  </li>
                  @endcan
                </ul>
              </div>
            </div>
          </nav>
    </div>
</header>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id do Curso</th>
                <th>Nome do Curso</th>
                <th>Descrição</th>
                <th>Valor do Curso</th>
                <th>Data inicio das inscrições</th>
                <th>Data fim das incrições</th>
                <th>Maximo de inscritos</th>
                <th width="100">Ações</th>
            </tr>
        </thead>
        <tbody>
            
            @if (isset($cursos))
            @forelse ($cursos as $curso)
            <tr>
              <td>{{ $curso->id }}</td>
              <td>{{ $curso->nome_curso }}</td>
              <td>{{ $curso->descricao_curso }}</td>
              <td>{{ $curso->valor_curso }}</td>
              <td>{{ $curso->data_inicio_inscricao }}</td>
              <td>{{ $curso->data_fim_inscricao }}</td>
              <td>{{ $curso->qnt_max_inscritos }}</td>
              <td>
                  <a href="{{ route('inscricao.create') }}/?curso_id={{ $curso->id }}">Inscrever-se</a>
              </td>
          </tr>
            @empty
            <tr>
              <td colspan="8">Nenhum curso cadastrado</td>
            </tr>
            @endforelse
    
            @endif
        </tbody>
    </table>
    <hr>
    {{$cursos->links()}}

@endsection

