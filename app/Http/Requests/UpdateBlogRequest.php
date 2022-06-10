<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'thumbnail' => ['nullable'],
            'title' => ['required', 'string'],
            'description' => ['required'],
            'status' => ['required', 'in:DRAFT,PUBLISHED,ARCHIVED,PRIVATE'],
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Kategori tidak boleh kosong.',
            'category_id.integer' => 'Kategori harus dipilih.',
            'category_id.exists' => 'Kategori tidak ditemukan.',
            'thumbnail.nullable' => 'Thumbnail tidak boleh kosong.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.max' => 'Ukuran maksimum thumbnail adalah 2048 KB.',
            'title.required' => 'Judul tidak boleh kosong.',
            'title.string' => 'Judul harus berupa string.',
            'description.required' => 'Deskripsi tidak boleh kosong.',
        ];
    }
}
