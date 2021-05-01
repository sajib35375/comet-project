<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index(){
        $all_data = Tag::latest()->get();
        return view('admin.post.tag.index',[
            'tag_data' => $all_data
        ]);
    }
    public function tagStore(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);

        Tag::create([
            'name' => $request->name,
            'slug' =>$this->getSlug($request->name),
        ]);
        return redirect()->back()->with('success','Tag added successfully');
    }
    public function statusActive($id){
        $active_status = Tag::find($id);
        $active_status->status=false;
        $active_status->update();
    }
    public function statusInactive($id){
        $inactive_status = Tag::find($id);
        $inactive_status->status=true;
        $inactive_status->update();
    }
}
