<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    //
    public function AllBrand(){

        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function StoreBrand(Request $request){
        //Default Error Message
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
           // 'body' => 'required',
        ],

            //Customized Error Message
        [
            'brand_name.required' => 'Please Enter Brand Name!',
            'brand_image.min' => 'Please Enter Brand Image!',

           // 'category_name.max' => 'Less than 255 char',
           // 'body' => 'required',
        ]);

        $brand_image = $request -> file('brand_image');
          
        //generta uniqu ID
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/brand/';
        $last_img =  $up_location.$img_name;
        $brand_image->move($up_location,$last_img);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Brand Inserted Successfully');


    }

    public function Edit($id){
        $brands = Brand::find($id);
        return view('admin.brand.edit',compact('brands'));

    }

    public function Update(Request $request, $id){


        $validatedData = $request->validate([
            'brand_name' => 'required|min:4',
           
        ],
        [
            'brand_name.required' => 'Please Enter Brand Name!',
            'brand_image.min' => 'Please Enter Brand Image!',
        ]);

        $old_image = $request->old_image;
        $brand_image = $request -> file('brand_image');

        if($brand_image){

            //generta uniqu ID
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/brand/';
        $last_img =  $up_location.$img_name;
        $brand_image->move($up_location,$last_img);

        unlink($old_image);
        Brand::find($id)->Update([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Brand Updated Successfully');

        }else{

            Brand::find($id)->Update([
                'brand_name' => $request->brand_name,
                
                'created_at' => Carbon::now()
            ]);
    
            return Redirect()->back()->with('success','Brand Updated Successfully');

            
        }
          
        

    }
}
