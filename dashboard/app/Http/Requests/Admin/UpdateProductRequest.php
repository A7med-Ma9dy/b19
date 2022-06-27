<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name_en" => ['required','string','max:512'],
            "name_ar" => ['required','string','max:512'],
            "code" => ['required','digits:6','numeric',"unique:products,code,{$this->id},id"],
            "price" => ['required','numeric','between:1.00,99999.99'],
            "quantity" => ['required','integer','between:1,999'],
            "status" => ['required','integer','in:0,1'],
            "brand_id" => ['nullable','integer','exists:brands,id'],
            "subcategory_id" => ['required','integer','exists:subcategories,id'],
            "desc_en" => ['required','string'],
            "desc_ar" => ['required','string'],
            "image" => ['nullable','max:1000','mimes:jpg,png,jpeg'],
        ];
    }
}
