<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    // get sub_category for each category
    public function get_sub_category(Request $request){
        if($request->query('category')){

            $category = Category::where('id','=',$request->category)->with('subCategories')->first();

            $subCategories = $category->subCategories->pluck('name', 'id'); // Get subcategories' names and IDs
            return response()->json($subCategories); // Return a JSON respons
        }
    }
    public function index(){

        return view('e-commerce.category');
    }

    public function store(Request $request) {

        // save


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
    // edit
    public function edit($id){
        // dd($id);
        $category=Category::find($id);
        // dd($category);

        $subCategories=$category->subCategories()->get();
        // dd($subCategories);
        return view('e-commerce.edit_category',['subCategories'=>$subCategories,'category'=>$category]);
    }
    // update
    public function update (Request $request,$id){
        // dd($request);
        $category=Category::findOrFail($id);
        $validatedData = $request->validate([
            'name' => [
            'required',
            'string',
            'min:3',
            'max:20',
            Rule::unique('categories')->ignore($category->id)],
            'sub_category_ids' => 'required|array',
        ]);

        // get category
        // $category = Category::find($request['id']);

        $existing_sub_category_ids = $category->subCategories()->pluck('sub_categories.id')->toArray();
        $category->subCategories()->detach($existing_sub_category_ids);

        $category->name=$validatedData['name'];
        $category->update();
        // dd($category);

        $category->subCategories()->attach($validatedData['sub_category_ids']);
        if($category){
            return redirect('/category')->with('add-category-success','Category update with success');

        }else{
        return back()->with('add-category-error','Category not  update ')->withInput();

        }


    }
}
