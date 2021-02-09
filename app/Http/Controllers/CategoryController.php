<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function AllCat(){
        // echo "This is our Contect Page";
        return view('admin.category.index');
     }

    public function AddCat(Request $request){

            //Default Error Message
            $validated = $request->validate([
                'category_name' => 'required|unique:categories|max:255',
               // 'body' => 'required',
            ],

                //Customized Error Message
            [
                'category_name.required' => 'Please Enter Category Name!',
               // 'category_name.max' => 'Less than 255 char',
               // 'body' => 'required',
            ]);

            //Inserting data by using Eloquent ORM 
            Category::insert([
                'category_name'  => $request->category_name,
                'user_id'  => Auth::user()->id,
                'created_at'  => Carbon::now()
            ]);

            //Inserting data by using Query Building
            // $category = new Category;
            // $category->category_name = $request->category_name;
            // $category->user_id = Auth::user()->id;
            // $category->save();

            return Redirect()->back()->with('success','Category Inserted Successfully');


            
     }
}
