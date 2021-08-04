@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('TEste') }}</div>

                    <div class="card-body">
                        <header>
                            <div class="container" id="nav-container">
                                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                    <div class="container-fluid">

                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                            aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarNav">
                                            <ul class="navbar-nav">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('cursos.index') }}">Lista dos
                                                        Cursos</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('cursos.create') }}">Cadastrar
                                                        Curso</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Inscrever-se em um Curso</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </header>
                        <div>
                            <h1>Cursos</h1>

                            <hr>
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
                                        @foreach ($cursos as $curso)
                                            <tr>
                                                <td>{{ $curso->id }}</td>
                                                <td>{{ $curso->nome_curso }}</td>
                                                <td>{{ $curso->descricao }}</td>
                                                <td>{{ $curso->valor_curso }}</td>
                                                <td>{{ $curso->data_inicio_inscricao }}</td>
                                                <td>{{ $curso->data_fim_inscricao }}</td>
                                                <td>{{ $curso->qnt_max_inscritos }}</td>
                                                <td>
                                                    <a href="">Detalhes</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
