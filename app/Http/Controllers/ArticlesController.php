<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Article::all();
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $article = Article::create([
            'head' => $request->head,
            'body' => $request->body
        ]);

        $article->save();

        return response()->json([
            "message" => "Artigo criado com sucesso",
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Article::findOrFail($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $article = Article::find($id);
        if ($article != null) {
            # code...
            $article->head = $request->input("head");
            $arrticle->body = $request->input("body");

            $article->save();
        } else {
            return response()->json([
                'message'=>'Artigo não encontrado'
            ]);
        }
        
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
        $article = Article::find($id);
        if ($article != null) {
            $article->delete();
            return response()->json([
                'message'=>'Artigo excluído com sucesso'
            ]);
        } else {
            return response()->json([
                'message'=>'Artigo não encontrado'
            ]);
        }
    }
}
