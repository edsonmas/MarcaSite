@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Inscrição/Inscrito ') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('inscricao.update', $inscricao->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <input type="hidden" value="{{ $inscricao->id }}" id="id" name="id">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Inscrito') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $inscricao->aluno->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>

                            <div class="col-md-6">
                                <select id="categoria" class="js-example-basic-single form-control  @error('categoria') is-invalid @enderror" name="categoria" value="{{ old('categoria') }}" required autocomplete="categoria" autofocus>
                                    @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome_categoria }}</option>
                                @endforeach
                                </select>

                                @error('categoria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unidade_federativa" class="col-md-4 col-form-label text-md-right">{{ __('Unidade Federativa') }}</label>

                            <div class="col-md-6">
                                <select id="unidade_federativa" class="js-example-basic-single form-control  @error('unidade_federativa') is-invalid @enderror" name="unidade_federativa" value="{{ $inscricao->aluno->unidade_federativa }}" required autocomplete="name" autofocus>
                                    @foreach ($ufs as $ufKey=>$ufName)
                                        <option value="{{ $ufKey }}">{{ $ufName }}</option>
                                    @endforeach
                                </select>

                                @error('unidade_fededariva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ $inscricao->aluno->cpf }}" required autocomplete="cpf" autofocus>

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $inscricao->aluno->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="valor_incricao" class="col-md-4 col-form-label text-md-right">{{ __('Valor da Incricao') }}</label>

                            <div class="col-md-6">
                                <input id="valor_incricao" type="valor_incricao" class="form-control @error('valor_incricao') is-invalid @enderror" name="valor_incricao" value="{{ $inscricao->valor_incricao }}" required autocomplete="valor_incricao">

                                @error('valor_incricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Alterar') }}
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
