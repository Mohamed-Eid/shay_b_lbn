<?php

namespace App\Http\Controllers\Dashboard;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use App\Video;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('dashboard.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {

        $article_data = $request->except('_token','videos','image','header');
        
        $article_data['image'] = upload_image_without_resize('articles',$request->image);
        $article_data['header'] = upload_image_without_resize('articles',$request->header);
        
        $article = Article::create($article_data);

        if($request->videos){
            foreach (process_videos($request) as $video) {
                $article->videos()->create($video);
            }
        }


        return redirect()->back()->with('success','تمت الإضافة بنجاح');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('dashboard.articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article_data = $request->except('_token','videos','image','header','old_videos');
        
        if($request->image){
            $article_data['image'] = upload_image_without_resize('articles',$request->image);

        }
        if($request->header){
            $article_data['header'] = upload_image_without_resize('articles',$request->header);
        }
        
        $article->update($article_data);

        if($request->videos){
            foreach (process_videos($request) as $video) {
                $article->videos()->create($video);
            }
        }

        if($request->old_videos){
            foreach ($request->old_videos as $key => $value) {
                $old_video = Video::find($key);
                $data['ar']['name'] = $value['ar_name'];
                $data['en']['name'] = $value['en_name'];
                $data['url']        = $value['url'];
                $old_video->update($data);
            }
        }

        return redirect()->back()->with('success','تم الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if ($article->image != 'default.png' ) {
            delete_image('articles',$article->image);
        }

        if ($article->header != 'default.png' ) {
            delete_image('articles',$article->header);
        }

        $article->delete();

        return redirect()->back()->with('success','تم الحذف بنجاح');   
    }
}
