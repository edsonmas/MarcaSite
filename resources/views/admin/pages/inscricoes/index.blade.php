
@extends('layouts.app')

@section('title','Gestão dos Cursos')

@section('content')
<h1>Inscrições</h1>  
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
                <th>Id Inscrição</th>
                <th>Inscrito</th>
                <th>Data de inscrição</th>
                <th>Categoria</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>UF</th>
                <th>Valor</th>
                <th>Status</th>
                <th width="100">Ações</th>
            </tr>
        </thead>
        <tbody>
          
               @forelse ($inscricoes as $inscrito)
                   <tr>
                     <td>{{ $inscrito->id }}</td>
                     <td>{{ $inscrito->aluno->name }}</td>
                     <td>{{ $inscrito->created_at }}</td>
                     <td>{{ $inscrito->aluno->categoria->nome_categoria }}</td>
                     <td>{{ $inscrito->aluno->cpf }}</td>
                     <td>{{ $inscrito->aluno->email }}</td>
                     <td>{{ $inscrito->aluno->unidade_federativa }}</td>
                     <td>{{ $inscrito->valor_incricao }}</td>
                     <td>
                       <select class="edita-status" data-idInscricao="{{ $inscrito->id }}">
                         @foreach (['pendente','pago','cancelado'] as $status)
                             <option  value="{{ $status }}" @if ($inscrito->status == $status)
                                 selected
                             @endif>{{ $status }}</option>
                         @endforeach
                       </select>
                     </td>
                     <td>
                       <a href="{{ route('inscricao.edit',$inscrito->id) }}">Editar</a>
                       <a href="{{ route('inscricao.deleteForm',$inscrito->id) }}">Excluir</a>
                      </td>

                   </tr>
               @empty
                   <tr>
                     <td colspan="8">Não foi feito nenhuma inscrição</td>
                   </tr>
               @endforelse
            
        </tbody>
    </table>
    <hr>
    {{$inscricoes->links()}}

@endsection
@push('scripts')
    <script type="text/javascript">
   
    $(document).ready(function(){

      $('.edita-status').change(
        function(){
          let status = $(this).val();
          let idinscricao = $(this).data().idinscricao;
          $.ajax(
            {
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              'url':'{{ route('inscricao.index') }}/'+idinscricao,
              'type':'PUT',
              'success': function(result){
                alert('Salvo com Succes!')
              },
              'data': {
                'status': status
              }

            }
          )
        }
      );
    })
    </script>
@endpush

