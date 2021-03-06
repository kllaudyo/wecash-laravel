<?php

namespace WeCash\Http\Controllers;

use Illuminate\Http\Request;
use WeCash\Categoria;
use WeCash\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = \Auth::user();
        $categorias = Categoria::all()->where("id_empresa", $usuario->id_empresa);
        return view("categoria.index")->with("categorias", $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = \Auth::user();
        return view("categoria.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        $usuario = \Auth::user();

        $categoria = new Categoria();
        $categoria->ds_categoria = $request->input("descricao");
        $categoria->tp_categoria = $request->input("tipo");
        $categoria->id_empresa = $usuario->id_empresa;
        $categoria->save();

        return redirect()->action("CategoriaController@index")->with("msg","Categoria criada com sucesso!");
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        if(!empty($categoria)){
            return view("categoria.create", ["categoria" => $categoria]);
        }

        return redirect()->action("CategoriaController@index");

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaRequest $request, $id)
    {
        $categoria = Categoria::find($id);

        if(!empty($categoria)){
            $categoria->ds_categoria = $request->input("descricao");
            $categoria->tp_categoria = $request->input("tipo");
            $categoria->update();
        }

        return redirect()->action("CategoriaController@index")->with("msg","Categoria salva com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if(!empty($categoria)){
            $categoria->delete();
        }

        return redirect()->action("CategoriaController@index")->with("msg", "Categoria removida com sucesso!");
    }
}
