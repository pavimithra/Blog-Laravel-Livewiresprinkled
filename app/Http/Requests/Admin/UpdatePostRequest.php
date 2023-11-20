<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|max:255|unique:posts,title,'.$this->post->id,
            'slug' => 'required|max:255|unique:posts,slug,'.$this->post->id,
            'content' => 'required',
            'categories' => 'required|array',
            //'status' => 'required',
            //'image' => 'required|image',
        ];
    }
}
