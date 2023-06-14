<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'sku' => ['required', 'unique:articles,sku', 'max:6' ],
            'article' => ['required'],
            'brand' => ['required'],
            'model' => ['required'],
            'family' => ['required'],
            'stock' => ['required'],
            'quantity' => ['required'],
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'sku.required' => 'El SKU del articulo es requerido.',
            'sku.unique' => 'Ya existe el SKU.',
            'sku.max' => 'El SKU debe ser de maximo 6 digitos',

            'article.required' => 'El Nombre del articulo es requerido.',
            'brand.required' => 'La Marca del articulo es requerido.',
            'model.required' => 'El Modelo del articulo es requerido.',
            'family.required' => 'La Familia del articulo es requerido.',
            'stock.required' => 'El Stock del articulo es requerido.',
            'quantity.required' => 'La cantidad del articulo es requerido.',
        ];
    }
}
