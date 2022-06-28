<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Traits\Media;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Subcategory;
use App\Traits\ApiTrait;

class ProductController extends Controller
{
    use Media, ApiTrait;
    public function index(Request $request)
    {
        $products = Product::all();
        if ($request->expectsJson()) {
            return $this->data(compact('products'));
        }
        return view('products.index', compact('products'));
    }

    public function create(Request $request)
    {
        $brands = Brand::select('id', 'name_en', 'name_ar')->orderBy('name_en')->orderBy('name_ar')->get();
        $subcategories = Subcategory::select('id', 'name_en', 'name_ar')->orderBy('name_en')->orderBy('name_ar')->get();
        if ($request->expectsJson()) {
            return $this->data(compact('brands', 'subcategories'));
        }
        return view('products.create', compact('brands', 'subcategories'));
    }

    public function edit(Request $request, $id)
    {
        $brands = Brand::select('id', 'name_en', 'name_ar')->orderBy('name_en')->orderBy('name_ar')->get();
        $subcategories = Subcategory::select('id', 'name_en', 'name_ar')->orderBy('name_en')->orderBy('name_ar')->get();
        $product = Product::find($id);
        if ($request->expectsJson()) {
            if (is_null($product)) {
                return $this->errorResponse(['id' => 'Invaild Id'], "Not Found", 404);
            }
            return $this->data(compact('brands', 'subcategories', 'product'));
        }
        return view('products.edit', compact('brands', 'subcategories', 'product'));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->except('_token', 'image');
        $photoName = $this->upload($request->image, 'products');
        $data['image'] = $photoName;
        Product::create($data); // create
        if ($request->expectsJson()) {
            return $this->successResponse('Product Created Successfully');
        }
        return redirect()->route('dashboard.products.index')->with('success', 'Product Created Successfully');
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->except('_token', '_method', 'image');
        if ($request->has('image')) {
            $photoName = $this->upload($request->image, 'products');
            $data['image'] = $photoName;
            $photoName = Product::select('image')->where('id', $id)->value('image');
            $this->delete(public_path("images\products\\{$photoName}"));
        }
        $product = Product::find($id);
        if (is_null($product)) {
            if ($request->expectsJson()) {
                return $this->errorResponse(['id' => 'Invaild Id'], "Not Found", 404);
            }
            return redirect()->route('dashboard.products.index')->with('error', 'Something Went Wrong');
        } else {
            $product->update($data);
            if ($request->expectsJson()) {
                return $this->successResponse('Product Updated Successfully');
            }
            return redirect()->route('dashboard.products.index')->with('success', 'Product Updated Successfully');
        }
    }

    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return $this->errorResponse(['id' => 'Invaild Id'], "Not Found", 404);
        }
        $this->delete(public_path("images\products\\{$product->image}"));
        $product->delete();
        if ($request->expectsJson()) {
            return $this->successResponse('Product Deleted Successfully');
        }
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }

    public function updateStatus(Request $request, $id, $status)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return $this->errorResponse(['id' => 'Invaild Id'], "Not Found", 404);
        }
        $product->update(['status' => !$status]);
        if ($request->expectsJson()) {
            return $this->successResponse('Product Status Changed Successfully');
        }
        return redirect()->back()->with('success', 'Product Status Changed Successfully');
    }
}
