<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        return view('e-commerce.category');
    }

    public function store(Request $request,$id=null) {

        // save
       if($id==null){

        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:20|unique:categories,name',
            'sub_category_ids' => 'required|array',
        ]);

        $category = new Category;
        $category->name = $validatedData['name'];
        $category->save();

        $category->subcategories()->attach($validatedData['sub_category_ids']);

        if($category){
            return back()->with('add-category-success','Category add with success')->withInput();

        }else{
        return back()->with('add-category-error','Category not  add ')->withInput();

        }
       }
    //    update
       else{
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:20',
            'sub_category_ids' => 'required|array',
        ]);

        $category = Category::find($id);

        if (!$category) {
            // dd('stop');
           return  view('e-commerce.404');
        }


        $existing_sub_category_ids = $category->subCategories()->pluck('sub_categories.id')->toArray();
    // delete existing subcategories from the category
    $category->subCategories()->detach($existing_sub_category_ids);
    //save category
        $category->name = $validatedData['name'];
        $category->save();
    // add  subcategories to the category

        $category->subCategories()->attach($validatedData['sub_category_ids']);

        if($category){
            return back()->with('add-category-success','Category update with success')->withInput();

        }else{
        return back()->with('add-category-error','Category not  updated ')->withInput();

        }
       }
    }
    // delete
    public function delete($id){

        $category=Category::find($id);

        $category->delete();

       if($category){
        return back()->with('delete-category-success','Category delete with success');
       }else{
        return back()->with('delete-category-error','category not delete');
       }
    }
}
