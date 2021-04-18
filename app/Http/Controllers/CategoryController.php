<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function categoryShow(){
        $all_data = Category::latest()->get();
        return view('admin.post.category.index',[
            'data' => $all_data
        ]);
    }
    public function categoryStore(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->back()->with('success','Category added successfully');

    }
    public function categoryStatusActive($id){
            $active_data = Category::find($id);
            $active_data->status=false;
            $active_data->update();
    }
    public function categoryStatusInactive($id){
        $inactive_data = Category::find($id);
        $inactive_data->status=true;
        $inactive_data->update();
    }
    public function categoryDelete($id){
        $delete_data = Category::find($id);
        $delete_data->delete();
        return redirect()->back()->with('success','Category deleted successfully');
    }
    public function categoryEdit($id){
       return $edit_data = Category::find($id);

    }
    public function categoryUpdate(Request $request){
        $id = $request->update_id;
        $update_data = Category::find($id);
        $update_data->name = $request->name;
        $update_data->slug = Str::slug($request->name);
        $update_data->update();

    }
}
