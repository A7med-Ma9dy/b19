@extends('layouts.parent')
@section('title', 'Edit Product')
@section('content')

    <div class="row">
        <div class="col-12 ">
            <div class="card ">
                <div class="card-header  bg-primary">
                    <h4>Product Informations</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.products.update', ['id' => $product->id]) }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-6">
                                <label for="name_en">Name(EN)</label>
                                <input type="text" name="name_en" id="name_en" value="{{ $product->name_en }}"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                @error('name_en')
                                    <div class="text-danger font-weight-bold">* {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="name_ar">Name(AR)</label>
                                <input type="text" name="name_ar" id="name_ar" value="{{ $product->name_ar }}"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                @error('name_ar')
                                    <div class="text-danger font-weight-bold">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label for="code">Code</label>
                                <input type="number" name="code" id="code" value="{{ $product->code }}"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                @error('code')
                                    <div class="text-danger font-weight-bold">* {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" value="{{ $product->price }}"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                @error('price')
                                    <div class="text-danger font-weight-bold">* {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                                @error('quantity')
                                    <div class="text-danger font-weight-bold">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label for="status">Status </label>
                                <select name="status" id="status" class="form-control">
                                    <option @selected($product->status == 1) value="1">Active</option>
                                    <option @selected($product->status == 0) value="0">Not Active</option>
                                </select>
                                @error('status')
                                    <div class="text-danger font-weight-bold">* {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="brand_id">Brand </label>
                                <select name="brand_id" id="brand_id" class="form-control">
                                    @foreach ($brands as $brand)
                                        <option @selected($brand->id == $product->brand_id) value="{{ $brand->id }}">
                                            {{ $brand->name_en }} - {{ $brand->name_ar }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="text-danger font-weight-bold">* {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="subcategory_id">Subcategory </label>
                                <select name="subcategory_id" id="subcategory_id" class="form-control">
                                    @foreach ($subcategories as $subcategory)
                                        <option @selected($subcategory->id == $product->subcategory_id) value="{{ $subcategory->id }}">
                                            {{ $subcategory->name_en }} - {{ $subcategory->name_ar }}</option>
                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                    <div class="text-danger font-weight-bold">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <label for="desc_en">Desc(EN)</label>
                                <textarea name="desc_en" id="desc_en" cols="30" rows="10" class="form-control">{{ $product->desc_en }}</textarea>
                                @error('desc_en')
                                    <div class="text-danger font-weight-bold">* {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="desc_ar">Desc(AR)</label>
                                <textarea name="desc_ar" id="desc_ar" cols="30" rows="10" class="form-control">{{ $product->desc_ar }}</textarea>
                                @error('desc_ar')
                                    <div class="text-danger font-weight-bold">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-3 my-5">
                                <img src="{{ asset("images/products/{$product->image}") }}" class="w-100"
                                    alt="{{ $product->name_en }}">
                                <input type="file" name="image" class="form-control" id="">
                                @error('image')
                                    <div class="text-danger font-weight-bold">* {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm"> Update </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
