<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

            
     }
}
