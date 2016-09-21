<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContratRequest extends Request
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
            'type' => 'required|alpha|min:5|max:20',
            'model' => 'required|alpha|between:5,20',
            'nom' => 'required|unique:contacts'

        ];
    }
}
