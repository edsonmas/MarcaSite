<?php

namespace App\Http\Controllers;

use App\Models\CategoriaAluno;
use App\Models\InscricaoAluno;
use App\Models\Curso;
use App\Models\UF;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscricaoAlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $inscricoes = InscricaoAluno::paginate(6);
    
    //    dd($inscricoesid);

        return view('admin.pages.inscricoes.index',[
            'inscricoes' => $inscricoes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $aluno =  Auth::user();
        $cursos = Curso::all();
        $idCursoSelecionado = $request->curso_id;
        
        return view('user.pages.cursos.inscricaocurso',[
            'aluno'=> $aluno,
            'cursos'=>$cursos,
            'idCursoSelecionado'=> $idCursoSelecionado
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $this->validate($request, [
                
            'valor_incricao' => 'sometimes',
            'user_id' => 'sometimes|integer|exists:users,id',
            'curso_id' => 'sometimes|integer|exists:cursos,id',
        ]);

        $input = $request->all();
      
        $cursoSelecionado = Curso::find($input['curso_id']);
        $valorInscricao = $cursoSelecionado->valor_curso;

        InscricaoAluno::create([
            'user_id' => $input['user_id'],
            'curso_id' => $input['curso_id'],
            'valor_incricao'=> $valorInscricao,
            'status'=>'pendente'
            
        ]);

        return redirect()
        ->route('cursos.index')
        ->with('message', 'Inscrição feita com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InscricaoAluno  $inscricaoAluno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        if (!$inscricao = InscricaoAluno::find($id)) {
            return redirect()->back();
        }

        $alunoId = $inscricao->aluno->id;
        
        return view('admin.pages.inscricoes.editarinscricao',[
            'inscricao'=> $inscricao,
            'alunoId'=>$alunoId
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InscricaoAluno  $inscricaoAluno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inscricao = InscricaoAluno::find($id);
        $alunoId = $inscricao->aluno->id;

        $ufs = UF::UFS;
        $categorias = CategoriaAluno::all();
        
        if (!$inscricao = InscricaoAluno::find($id)) {
            return redirect()->view();
        }
        
        return view('admin.pages.inscricoes.editarinscricao',[
            'inscricao'=> $inscricao,
            'alunoId'=>$alunoId,
            'ufs'=>$ufs,
            'categorias'=>$categorias
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InscricaoAluno  $inscricaoAluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   

        $this->validate($request, [
                
            'valor_incricao' => 'sometimes',
            'categoria_id' => 'sometimes|integer|exists:categorias,id',
            'curso_id' => 'sometimes|integer|exists:cursos,id',
            'name'=>'sometimes|string|max:100',
            'cpf'=>'sometimes|string|max:14',
            'unidade_federativa'=>'sometimes|string|max:100',
            'email' => 'string|email|max:255'
        ]);

        $inscricaoAluno = InscricaoAluno::findOrFail($id);
        
        $dadosInscricao = $request->only([
            'status',
            'valor_incricao',
            'id'

        ]);

        $inscricaoAluno->update($dadosInscricao);
       
        $userUpdate = User::find($inscricaoAluno->user_id);
        $dadosUserUpdate = $request->only([
            'name',
            'categoria_id',
            'cpf',
            'unidade_federativa',
            'email',

        ]);
      
        $userUpdate->update($dadosUserUpdate);

        return redirect()
        ->route('inscricao.index')
        ->with('message', 'Inscrição atualizada com sucesso');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InscricaoAluno  $inscricaoAluno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            
            $inscricao = InscricaoAluno::findOrFail($id);
            
            $inscricao->delete();

            return redirect()
            ->route('inscricao.index')
            ->with('message', 'Inscrição deletada com sucesso');
    
    }

    public function formDelete($id){

        $inscricao = InscricaoAluno::find($id);
        $alunoId = $inscricao->aluno->id;
        
        if (!$inscricao = InscricaoAluno::find($id)) {
            return redirect()->back();
        }
        
        return view('admin.pages.inscricoes.excluirinscricao',[
            'inscricao'=> $inscricao,
            'alunoId'=>$alunoId
            
        ]);
        
    }
}
