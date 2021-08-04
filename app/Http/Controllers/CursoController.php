<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cursos = Curso::paginate(6);

        return view('user.pages.cursos.index', [
            'cursos' => $cursos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('user.pages.cursos.cadastrocurso');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        {      

            $input = $request->all();
        
            $this->validate($request, [
                
                'nome_curso' => 'required|string',
                'descricao_curso' => 'sometimes|string',
                'valor_curso' => 'required',
                'data_inicio_inscricao' => 'date|required',
                'data_fim_inscricao' => 'date|required',
                'qnt_max_inscritos' => 'required|integer|min:1',
                'path_arquivo' => 'sometimes|string',
                'user_id' => 'sometimes|integer|exists:users,id',
            ]);
    

        if ($request->file('path_arquivo')) {

            $nameFile = Str::of($request->title)->slug('-') . '.' .$request->file('path_arquivo')->getClientOriginalExtension();

            $file = $request->file('path_arquivo')->storeAs('cursos',$nameFile);

        }

        $userId = Auth::id();

        $curso = Curso::create([
            'nome_curso' => $input['nome_curso'],
            'descricao_curso' => $input['descricao_curso'],
            'valor_curso' => $input['valor_curso'],
            'data_inicio_inscricao'=>$input['data_inicio_inscricao'],
            'data_fim_inscricao'=>$input['data_fim_inscricao'],
            'qnt_max_inscritos'=>$input['qnt_max_inscritos'],
            'user_id'=>$userId,
            'path_arquivo'=>$file??''
        ]);

        return redirect()
                ->route('cursos.index')
                ->with('message', 'Curso criado com sucesso');
    };
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.pages.cursos.editarcurso', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('Update Method!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //
    }

    public function formularioInscricaoCurso(){

        // return view('user.pages.cursos.inscricaocurso');
    }

}
