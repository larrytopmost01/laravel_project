<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function category(){

         $categories = Category::latest()->paginate(5);
        // $categories = DB::table('categories')->latest()->paginate(5);
        $trashcat = Category::onlyTrashed()->latest()->paginate(3);


        return view('admin.category.index', compact('categories', 'trashcat'));
    }

    public function  addcat(Request $request){


        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'please input category name',
            'category_name.max' => 'The Character is less than 255',
        ]);  
        
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();

        return redirect()->back()->with('success', 'Category inserted succesfully');
     }

     public function catedit($id){

        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
     }

     public function catupdate(Request $request, $id){

        $update =Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id'=>Auth::user()->id
        ]);

        return Redirect()->route('all.category')->with('success', 'Category updated succesfully');

     }

     public function catdelete($id){
         $delete = Category::find($id)->delete();
         return redirect()->back()->with('success', 'Category soft deleted succesfully');

     }

     public function catrestore($id){

        $delete =Category::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Category restore succesfully');

     }

     public function delete($id){

        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Category parmanently  deleted');

     }
}
