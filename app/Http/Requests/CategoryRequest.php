<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    public function rules()
    {
        $unique = Rule::unique('categories');

        if($category = $this->route('category'))
            $unique->ignoreModel($category);

        return [
            'title' => 'required', 'string', 'max:30', $unique
        ];
    }
}
