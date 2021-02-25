<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_name' => [
                'required','string', 'max:30'
            ],
            'product_price' => [
                'required', 'numeric'
            ],
            'product_description' => [
                'required', 'string', 'max:255'
            ],
            'category_id' => [
                'required', 'numeric'
            ],
            'image' => [
                'nullable', 'file', 'image'
            ]

        ];
    }
    //test commit
    function validatedWithImage() {
        $data = $this->validated();
        if($this->hasFile('image')) {
            /**
             * @var Product $product
             */
            if($product = $this->route('product')) {
                $product->deleteImage();
            }
            $data['img'] = $this->file('image')->store('public/images');
        }
        return $data;
    }
}
