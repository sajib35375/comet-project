<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
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
    public function blogSingleShow($slug){
        $post = Post::where('slug',$slug)->first();


        $post_id = $post->id;
        $this->getCount($post_id);

        return view('comet.blog-single',[
            'all_post' => $post
        ]);
    }
    public function blogSearchByName($id){

        $user =User::where('id',$id)->first();

        return view('comet.blog-name',[
            'all_data' =>$user->posts
        ]);
    }
    public function getCount($post_id){
        $post_view_count = Post::find($post_id);
        $old_view = $post_view_count->view;
        $post_view_count->view = $old_view+1;
        $post_view_count->update();
    }
}
