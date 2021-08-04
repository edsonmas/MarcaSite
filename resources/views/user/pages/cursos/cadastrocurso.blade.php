@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Curso') }}</div>

                <div class="card-body">
                    <form action="{{route('cursos.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nome_curso" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Curso') }}</label>

                            <div class="col-md-6">
                                <input id="nome_curso" type="text" class="form-control @error('nome_curso') is-invalid @enderror" name="nome_curso" value="{{ old('nome_curso') }}" required autocomplete="nome_curso" autofocus>

                                @error('nome_curso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao_curso" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                            <div class="col-md-6">
                                <input id="descricao_curso" type="text" class="form-control @error('descricao_curso') is-invalid @enderror" name="descricao_curso" value="{{ old('descricao_curso') }}" required autocomplete="descricao_curso" autofocus>

                                @error('descricao_curso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="valor_curso" class="col-md-4 col-form-label text-md-right">{{ __('Valor R$') }}</label>

                            <div class="col-md-6">
                                <input id="valor_curso" type="text" class="form-control @error('valor_curso') is-invalid @enderror" name="valor_curso" value="{{ old('valor_curso') }}" required autocomplete="valor_curso" autofocus>

                                @error('valor_curso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="data_inicio_inscricao" class="col-md-4 col-form-label text-md-right">{{ __('Data para o início das inscrições') }}</label>

                            <div class="col-md-6">
                                <input id="data_inicio_inscricao" type="date" class="form-control @error('data_inicio_inscricao') is-invalid @enderror" name="data_inicio_inscricao" value="{{ old('data_inicio_inscricao') }}" required autocomplete="data_inicio_inscricao" autofocus>

                                @error('data_inicio_inscricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="data_fim_inscricao" class="col-md-4 col-form-label text-md-right">{{ __('Data para o fim das inscrições') }}</label>
                            
                            <div class="col-md-6">
                                <input id="data_fim_inscricao" type="date" class="form-control @error('data_fim_inscricao') is-invalid @enderror" name="data_fim_inscricao" value="{{ old('data_fim_inscricao') }}" required autocomplete="data_fim_inscricao" autofocus>
                                
                                @error('data_fim_inscricao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="qnt_max_inscritos" class="col-md-4 col-form-label text-md-right">{{ __('Quantidade máxima de inscritos') }}</label>

                            <div class="col-md-6">
                                <input id="qnt_max_inscritos" type="number" class="form-control @error('qnt_max_inscritos') is-invalid @enderror" name="qnt_max_inscritos" value="{{ old('qnt_max_inscritos') }}" required autocomplete="qnt_max_inscritos" autofocus>

                                @error('qnt_max_inscritos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="path_arquivo" class="col-md-4 col-form-label text-md-right">{{ __('Upload do arquivo') }}</label>

                            <div class="col-md-6">
                                <input id="path_arquivo" type="file" class="form-control @error('path_arquivo') is-invalid @enderror" name="path_arquivo" value="{{ old('path_arquivo') }}" autocomplete="path_arquivo" autofocus>

                                @error('path_arquivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar Curso') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

