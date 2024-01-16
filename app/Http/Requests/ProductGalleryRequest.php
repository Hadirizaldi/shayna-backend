<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductGalleryRequest extends FormRequest
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
    public function messages()
    {
        return [
            'is_default.boolean' => 'The is_default field must be a boolean.',
            'is_default.unique' => 'Gambar Default untuk product ini telah ada.',
        ];
    }

    public function rules(): array
    {
        $productId = $this->input('products_id');

        return [
            'products_id' => 'required|integer|exists:products,id',
            'photo' => 'required|image',
            'is_default' => [
                'boolean',
                // $this->uniqueDefaultRule($productId),
            ],
        ];
    }

    // funciton for check unique is_default if value true
    protected function uniqueDefaultRule($productId)
    {
        return Rule::unique('product_galleries')
            ->where('products_id', $productId)
            ->where('is_default', true);
    }
}
