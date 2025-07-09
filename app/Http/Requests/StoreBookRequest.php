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
            'author_id' => 'required',
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

            // ✅ Validate image array with minimum 2 and max 11
            'image_path' => 'required|array|min:2|max:11',

            // ✅ Validate each image as a proper base64 format
            'image_path.*.url' => [
                'required',
                'regex:/^data:image\/(png|jpg|jpeg|gif);base64,[A-Za-z0-9+\/=]+$/',
            ],
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'کتاب باید نام داشته باشد.',
            'description.required' => 'شرح کتاب لازم است.',
            'author_id.exists' => 'نویسنده انتخاب شده معتبر نیست.',

            'image_path.required' => 'لطفاً حداقل دو تصویر برای کتاب آپلود کنید.',
            'image_path.min' => 'حداقل باید :min تصویر آپلود کنید.',
            'image_path.max' => 'حداکثر تعداد تصاویر :max می‌باشد.',
            'image_path.*.url.required' => 'آدرس تصویر الزامی است.',
            'image_path.*.url.regex' => 'فرمت تصویر باید معتبر باشد (Base64).',
        ];
    }
}
