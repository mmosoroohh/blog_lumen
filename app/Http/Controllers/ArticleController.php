<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArticleController extends Controller
{
    /**
     * Create Article controller instance
     * 
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showAllArticles()
    {
        return response()->json(Article::all());
    }

    public function showSingleArticle($id)
    {
        try {
            return response()->json(Article::findorFail($id));
        } catch (ModelNotFoundException $e)
        {
            return response()->json('Article not found!', 404);
        }
         
    }

    public function create(Request $request)
    {
        // Validation
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'status'
        ]);

        // insert data
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }

    public function update($id, Request $request)
    {
        // Validation
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'status'
        ]);

        // update record
        $article = Article::findorFail($id);
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete($id)
    {
        try{
            Article::findorFail($id)->delete();
            return response('Deleted Successfully', 200);
            //do some stuff
        } catch(ModelNotFoundException $e)
        {
            // Not found 
            return response()->json('Article Not Found!', 404);
        }
        
    }
}