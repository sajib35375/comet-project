<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    public function blogPageShow(){
        $data = Post::where('status',true)->where('trash',false)->latest()->paginate(2);
        return view('comet.blog',[
            'all_data' => $data
        ]);
    }
}
