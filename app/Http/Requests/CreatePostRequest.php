<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'category_id' => 'required|numeric|exists:\App\Models\Category,id',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5120|dimensions:max_width=1920,max_height=1080',
        ];
    }
}
