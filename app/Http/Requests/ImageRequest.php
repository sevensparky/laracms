<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required|min:5|string|unique:media',
            'description' => 'required|min:5|string',
            'slug' => 'required',
            'images' => 'required|mimes:png,jpg,jpeg,svg',
            'status' => 'required'
        ];
    }
}
