<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(request()->isMethod('POST')){
            $data = [
                'name' => 'required|unique:products',
                'description' => 'required',
                'stock' => 'required',
            ];
        }elseif(request()->isMethod('PUT')){
            $data = [
                'name' => 'required','unique:products,name,'. $this->id,
                'description' => 'required',
                'stock' => 'required',
            ];
        }

        return $data;
    }
}
