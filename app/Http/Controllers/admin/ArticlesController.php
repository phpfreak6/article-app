<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;
use Illuminate\Support\Facades\Auth;
class ArticlesController extends Controller
{
    public function singleArticle($id){
        $articles = Articles::find($id);
        return view('single-article')->with('article',$articles);
    }
    public function addArticle(Request $request){
        if(Auth::check()){
            return view('admin.articles');
        }else{
            return redirect('/');
        }
    }
    public function postArticle(Request $request){
        $this->validate($request, [
            'articleimage.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if($request->input('name') != ''){

            $articles = new Articles;
            $articles->name = $request->input('name');
            $articles->descriptions = $request->input('description');
            foreach ($request->file('articleimage') as $image) {
                $name = $image->getClientOriginalName();
                $data[] = $name;
            }
            $articles->tags = $request->input('tags');
            $articles->featured_image = json_encode($data, JSON_FORCE_OBJECT);
            $articles->save();
            $id = $articles->id;
            foreach ($request->file('articleimage') as $image) {
                $name = $image->getClientOriginalName();
                $uploadpath   = public_path('images/' . $id);
                $image->move($uploadpath, $name);
            }
            // $name = $request->input('articleimage');
            // $uploadpath   = public_path('images/' . $id);
            // if (!is_dir($uploadpath)) {
            //     mkdir(public_path('images/' . $id));
            // }
            // $request->articleimage->move($uploadpath, $imgname);
            return redirect('admin/add-article')->withSuccess("Article saved!");
        }else{
            return view('admin.articles');
        }
    }
    public function allArticles(){
        if(Auth::check()){
            $articles = Articles::all();
            return view('admin.all-articles')->with('articles', $articles);
        }else{
            return redirect('/');
        }
    }
    public function editArticle($id){
        if(Auth::check()){
            $articles = Articles::find($id);
            return view('admin.edit-article')->with('articles', $articles);
        }else{
            return redirect('/');
        }
    }
    public function updateArticle(Request $request){
        $articles = Articles::find($request->input('updateid'));
        //echo '<pre>'; print_r($request->all()); die;
        if($request->input('name') != ''){
            //$imgname = $request->file('articleimage')->getClientOriginalName();
            $articles->name = $request->input('name');
            $articles->descriptions = $request->input('descriptions');
            $id = $request->input('updateid');
            $articles->save();
            /*$uploadpath   = public_path('images/' . $id);
            if(is_file($uploadpath.'/'.$articles->featured_image)){
                unlink($uploadpath.'/'.$articles->featured_image);
            }
            $articles->featured_image = $imgname;
            $articles->save();
            $name = $request->input('articleimage');
            if (!is_dir($uploadpath)) {
                mkdir(public_path('images/' . $id));
            }
            $request->articleimage->move($uploadpath, $imgname);*/
            return redirect('admin/articles')->withSuccess("Article saved!");
        }else{
            return view('admin.articles');
        }
    }

    public function deleteArticle($id){
        $articles = Articles::find($id);
        $articles->delete();
        return redirect('admin/articles')->withError('Article Deleted!');
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/admin/login');
    }

}
