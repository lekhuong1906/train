<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use Brian2694\Toastr\Facades\Toastr;

class TypeTicketFormRequest extends FormRequest
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
            'type_name'=>'required',
            'type_description'=>'required',
            'total_day'=>'required|numeric',
            'type_price'=>'required|numeric',
        ];
    }
    protected function formatErrors(Validator $validator)
    {

        $messages = $validator->messages();

        foreach ($messages->all() as $message)
        {
            Toastr::error($message, 'error', ['timeOut' => 10000]);
        }

        return $validator->errors()->all();
    }
}
