<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryFilterRequest extends FormRequest
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
           'category' => 'nullable|integer|exists:categories,id',
            'search' =>'nullable|string|min:3',
            'price_min' => 'nullable|numeric',
            'price_max' => 'nullable|numeric',
            'order' => 'nullable|in:price,updated_at'
        ];
    }
}
