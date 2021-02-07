<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AllCat(){
        // echo "This is our Contect Page";
        return view('admin.category.index');
     }
}
