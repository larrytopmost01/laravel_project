<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;


class BrandController extends Controller
{
    public function allbrand(){

        $brand = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brand'));
    }

    public function addbrand( Request $request){

        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'brand_image' => 'required|mimes:jpeg.jpg,png',

        ],
        [
            'brand_name.required' => 'please input brand name',
            'brand_image.min' => 'Brand longer than 4 character',
        ]);  

        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location.$img_name;
        $brand_image->move($up_location, $img_name);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
            
        ]);

        return redirect()->back()->with('success', 'Brand inserted succesfully');


    }

}