<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'thumb_image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,svg'],
            'name' => ['required'],
            'short_description' => ['required'],
            'long_description' => ['required'],
            'price' => ['required'],
            'offer_price' => ['required'],
            'sku' => ['required'],
            'seo_title' => ['required'],
            'seo_description' =>['required'],
            'categories_id' => ['required'],
            'status' => ['required'],
            'show_at_home' => ['required'],
        ];
    }
}
