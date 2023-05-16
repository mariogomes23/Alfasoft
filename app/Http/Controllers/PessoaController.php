<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Http\Requests\Pessoa\PessoaCreateRequest;
use App\Http\Requests\Pessoa\PessoaUpdateRequest;
class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public $pessoa;
     
    public function __construct(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;

    }
    public function index()
    {
        $pessoa = $this->pessoa->with("contactos")->get();
        return View("pessoa.index",compact("pessoa"));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
              $pessoa = $this->pessoa->all();
        return View("pessoa.create",compact("pessoa"));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaCreateRequest $request)
    {
            
          $pessoa = $this->pessoa->create([
              "nome"=>$request->nome,
              "email"=>$request->email
              ]);
        return redirect()->route("pessoa.index")->with("message","criado com sucesso");
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
          $pessoa = $this->pessoa->findOrFail($id);
          
        return View("pessoa.show",compact("pessoa"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
          $pessoa = $this->pessoa->find($id);
        return View("pessoa.edit",compact("pessoa"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaUpdateRequest $request, $id)
    {
          $pessoa = $this->pessoa->find($id);
          $pessoa->update([
              "nome"=>$request->nome,
              "email"=>$request->email
              ]);
        return redirect()->route("pessoa.index")->with("message","atualizada com sucesso");
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
            $pessoa = $this->pessoa->find($id);
          $pessoa->delete();
        return redirect()->route("pessoa.index")->with("message","apagada com sucesso");
    }
}
