<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudent extends FormRequest
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
            'name' => 'required|min:3',
            'email' =>'required|email',
            'address' =>'required',

        ];
    }

    public function data()
    {
        $data=[
            'name'=>$this->get('name'),
            'email'=>$this->get('email'),
            'address'=>$this->get('address')
        ];
        return $data;
    }


}
