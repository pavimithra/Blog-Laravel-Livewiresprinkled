<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|unique:categories,name,'.$this->category->id,
            'slug' => 'required|max:255|unique:categories,slug,'.$this->category->id,
            'description' => 'required',
            'image' => 'image',
            //'parent_id' => 'nullable',
        ];
    }
}
