<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $articles = Article::orderBy('created_at', 'DESC')->paginate(10);
        return view(
            'articles.list',
            ['articles' => $articles]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|min:5',
                'author' => 'required|min:5'
            ]
        );

        if ($validator->passes()) {

            $article = new Article();
            $article->title = $request->title;
            $article->text = $request->text;
            $article->author = $request->author;

            $article->save();



            return redirect()->route('articles.create')->with('success', 'Article added Successfully.');
        } else {
            return redirect()->route('articles.create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
        $id = $request->id;

        $articles = Article::find($id);

        if ($articles == null) {

            session()->flash('error', 'articles not found');
            return response()->json([
                'status' => false
            ]);
        }
        $articles->delete();


        session()->flash('success', 'articles Deleted Successfully .');
        return response()->json([
            'status' => True

        ]);
    }
}
