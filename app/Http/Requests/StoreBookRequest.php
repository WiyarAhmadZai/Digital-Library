<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize()
    {
        // Change to `true` if all users can store books
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'author_id' => 'nullable|exists:authors,id',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'currency_type' => 'required|string|max:50',
            'language' => 'required|string|max:50',
            'publish_year' => 'required|date',
            'status' => 'required|string|max:100',
            'total_pages' => 'required|integer|min:1',
            'sku' => 'required|string|max:100',
            'format' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'discount' => 'nullable|numeric|min:0|max:100',
            'tags' => 'nullable|string',
            'image_path' => 'nullable|array',
            'image_path.*.url' => 'nullable|string', // Optional: validate each image url if needed
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'کتاب باید نام داشته باشد.',
            'description.required' => 'شرح کتاب لازم است.',
            'author_id.exists' => 'نویسنده انتخاب شده معتبر نیست.',
            // Add more custom messages as needed
        ];
    }
}
