<?php

namespace Jecar\Commerce\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePage extends FormRequest
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
            'name' => 'required|string|min:2|max:100',
            'title' => 'required|string|min:2|max:100',
            'path' => 'required|unique:'.app('jecar')->getTableName('pages').',path,'.$this->route('page').',id',
            'meta_title' => 'required|string',
            'meta_description' => 'nullable|string|max:200',
            'meta_keywords' => 'nullable|string|min:5',
            'meta_image' => 'nullable|active_url',
            'published' => 'nullable|boolean',
        ];
    }

    public function validated()
    {
        return [
            'name' => $this->input('name'),
            'title' => $this->input('title'),
            'path' => (str_starts_with($this->input('path'), '/') ? '' : '/') . $this->input('path'),
            'meta_title' => $this->input('meta_title'),
            'meta_description' => $this->input('meta_description'),
            'meta_keywords' => $this->input('meta_keywords'),
            'meta_image' => $this->input('meta_image'),
            'published' => (bool) $this->input('published'),
        ];
    }
}
