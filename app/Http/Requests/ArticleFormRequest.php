<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleFormRequest extends FormRequest
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
            'titreArticle' => 'required|string',
            'contenuArticle' => 'required|string|max:9999',
            'tags' => 'required|array|exists:tags,id',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
