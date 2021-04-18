<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function postIndex(){
        $data = Post::where('trash',false)->get();
        $published = Post::where('trash',false)->get()->count();
        $trash = Post::where('trash',true)->get()->count();

        return view('admin.post.index',[
            'all_data'=>$data,
            'published' => $published,
            'trash' => $trash,
        ]);
    }

    public function postTrash(){
        $data = Post::where('trash',true)->get();
        $published = Post::where('trash',false)->get()->count();
        $trash = Post::where('trash',true)->get()->count();
        return view('admin.post.trash',[
            'all_data'=>$data,
            'published' => $published,
            'trash' => $trash,
        ]);
    }



    public function postCreate(){
        $cat = Category::all();
        $tag = Tag::all();
        return view('admin.post.create',[
            'all_cat' => $cat,
            'all_tag' => $tag,
        ]);
    }
    public function postStore(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
        ]);
        $unique_name='';
        if ($request->hasFile('image')){
            $img=$request->file('image');
            $unique_name=md5(time().rand()).'.'.$img->getClientOriginalExtension();
            $img->move(public_path('admin/assets/img/'),$unique_name);

        }
        $gallery_img=[];
        if ($request->hasFile('gallery')){
            foreach($request->file('gallery') as $gall){
                $unique_gal_name=md5(time().rand()).'.'.$gall->getClientOriginalExtension();
                $gall->move(public_path('admin/assets/img/'),$unique_gal_name);
                array_push($gallery_img,$unique_gal_name);
            }
        }
        $video='';
        $youtube=substr($request->video,12,7);
        $vimeo=substr($request->video,8,5);
        if ($youtube=='youtube'){
            $video=str_replace('watch?v=','embed/',$request->video);
        }else if ($vimeo=='vimeo'){
            $video=str_replace('https://vimeo.com/','https://player.vimeo.com/video/',$request->video);
        }


        $post_feature=[
            'post_type' => $request->post_type,
            'post_title' => $request->title,
            'post_image' =>$unique_name,
            'post_gallery'=>$gallery_img,
            'post_video'=>$video,
            'post_audio'=>$request->audio,
        ];

        $post_data = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'user_id' => Auth::user()->id,
            'featured'=>json_encode($post_feature),
            'content' => $request->content,
        ]);
        $post_data->category()->attach($request->category);
        return redirect()->back()->with('success','Post added successfully');
    }
    public function postTrashUpdate($id){
          $update_data = Post::find($id);
          if ($update_data->trash==false){
              $update_data->trash=true;
          }else{
              $update_data->trash=false;
          }
          $update_data->update();
          return redirect()->back()->with('success','trash updated successfully');
    }
    public function postTrashDelete($id){
        $delete_data = Post::find($id);
        $delete_data->delete();
        return redirect()->back()->with('success','data permanently delete');
    }
}
