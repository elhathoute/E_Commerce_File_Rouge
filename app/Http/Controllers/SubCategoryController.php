<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{
    public function index(){

        return view('e-commerce.subcategory');

    }
    // store
    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|min:3|max:30|unique:sub_categories,name',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if($request->hasFile('image')){

            $image_file =$request->image;
            $image_file_name=time().'.'.$image_file->getClientOriginalExtension();
            $image_file->move('assets/imageSubCategory',$image_file_name);
        }else{
            $image_file_name='';
        }

        $subCategory=new SubCategory();

        $subCategory->name=$validatedData['name'];
        $subCategory->image=$image_file_name;

        $subCategory->save();
        return redirect()->back()->with('add-subcategory-success', 'Subcategory created successfully!');
    }
      // delete
      public function delete($id){

        $subcategory=SubCategory::findOrFail($id);

        $subcategory->delete();

       if($subcategory){
        return back()->with('delete-subcategory-success','SubCategory delete with success');
       }else{
        return back()->with('delete-subcategory-error','Subcategory not delete');
       }
    }
     // edit
     public function edit($id){
        // dd($id);
        $subcategory=SubCategory::findOrFail($id);

        // dd($subCategories);
        return view('e-commerce.edit_subcategory',['subcategory'=>$subcategory]);
    }
    // update

    public function update (Request $request,$id){
        // dd($request);
        $subcategory=SubCategory::findOrFail($id);

  $validatedData = $request->validate([
    'name' => [
        'required',
        'string',
        'min:3',
        'max:30',
        Rule::unique('sub_categories')->ignore($subcategory->id)],
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);
        if($request->hasFile('image')){

            $image_file =$request->image;
            $image_file_name=time().'.'.$image_file->getClientOriginalExtension();
            $image_file->move('assets/imageSubCategory',$image_file_name);
        }else{
            $image_file_name=$subcategory->image;

        }

        $subcategory->name=$validatedData['name'];
        $subcategory->image=$image_file_name;
        $subcategory->update();

        return redirect('/subcategory')->with('add-subcategory-success', 'Subcategory update successfully!');


    }

}
