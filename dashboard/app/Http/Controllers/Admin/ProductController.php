<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Traits\Media;

class ProductController extends Controller
{
    use Media;
    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $brands = DB::table('brands')->select('id', 'name_en', 'name_ar')->orderBy('name_en')->orderBy('name_ar')->get();
        $subcategories = DB::table('subcategories')->select('id', 'name_en', 'name_ar')->orderBy('name_en')->orderBy('name_ar')->get();
        return view('products.create', compact('brands', 'subcategories'));
    }

    public function edit($id)
    {
        $brands = DB::table('brands')->select('id', 'name_en', 'name_ar')->orderBy('name_en')->orderBy('name_ar')->get();
        $subcategories = DB::table('subcategories')->select('id', 'name_en', 'name_ar')->orderBy('name_en')->orderBy('name_ar')->get();
        $product = DB::table('products')->where('id', $id)->first();
        return view('products.edit', compact('brands', 'subcategories', 'product'));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->except('_token','image');
        $photoName = $this->upload($request->image,'products');
        $data['image'] = $photoName;
        DB::table('products')->insert($data);
        return redirect()->route('dashboard.products.index')->with('success','Product Created Successfully');
    }

    public function update(UpdateProductRequest $request,$id)
    {
        $data = $request->except('_token','_method','image');
        if($request->has('image')){
            $photoName = $this->upload($request->image,'products');
            $data['image'] = $photoName;
            $photoName = DB::table('products')->select('image')->where('id',$id)->value('image');
            $this->delete(public_path("images\products\\{$photoName}"));
        }
        DB::table('products')->where('id',$id)->update($data);
        return redirect()->route('dashboard.products.index')->with('success','Product Updated Successfully');
    }

    public function destroy($id)
    {
        $photoName = DB::table('products')->select('image')->where('id',$id)->value('image');
        $this->delete(public_path("images\products\\{$photoName}"));
        DB::table('products')->where('id',$id)->delete();
        return redirect()->back()->with('success','Product Deleted Successfully');
    }

    public function updateStatus($id,$status)
    {
        DB::table('products')->where('id',$id)->update(['status'=>!$status]);
        return redirect()->back()->with('success','Product Status Changed Successfully');
    }
}
