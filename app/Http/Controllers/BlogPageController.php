<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    public function blogPageShow(){
        $data = Post::where('status',true)->where('trash',false)->latest()->paginate(2);
        return view('comet.blog',[
            'all_data' => $data
        ]);
    }
    public function blogSearch(Request $request){
        $search = $request->search;
        $search_data = Post::where('title','LIKE','%'.$search.'%')->orWhere('content','LIKE','%'.$search.'%')->latest()->paginate();
        return view('comet.blog-search',[
            'all_data' => $search_data
        ]);
    }
    public function blogSearchByCat($slug){
        $cat = Category::where('slug',$slug)->first();
        return view('comet.blog-cat',[
            'all_data'=>$cat->post
        ]);
    }
    public function blogSearchByTag($slug){
        $tag = Tag::where('slug',$slug)->first();
        return view('comet.blog-tag',[
            'all_data' => $tag->postData
        ]);
    }
    public function blogPostShow($slug){
       $post = Post::where('slug',$slug)->get();
       return view('comet.blog-post',[
           'all_data' => $post
       ]);
    }
}
