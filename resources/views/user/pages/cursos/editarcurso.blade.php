@extends('user.layouts.userlayout')

@section('title', 'Editar curso')
    
@section('content')
    <h1>Editar curso {{ $id }}</h1>
        <form action="{{route('cursos.update', $id)}}" method="post">
            @method('PUT')
            @csrf

            <input type="text" id="nome_curso" placeholder="Nome do Curso">
            <input type="text" id="descricao" placeholder="Descrição do Curso">
            <input type="number" id="valor_curso" placeholder="Valor do Curso">
            <input type="date" name="data_inicio_inscricao" id="data_inicio_inscricao" placeholder="Data de inicio das inscrições no Curso">
            <input type="date" name="data_fim_inscricao" id="data_fim_inscricao" placeholder="Data final das inscrições no Curso">
            <input type="number" name="qnt_max_inscritos" id="qnt_max_inscritos" placeholder="Quantidade máxima de inscritos no Curso">

            <button type="submit">Submit</button>
            
        </form>
@endsection
