<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AjouterEmployerRequest extends Request
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
            'nom' => 'required|alpha|min:5|max:20',
            'prenom' => 'required|alpha|between:5,20',
            'nss' => 'required|numeric|unique:salaries,NSS',
            'lieu' => 'required|min:5|max:250',
            'date' => 'required|date',
             'recrutement' => 'required|date|after:date'
        ];
    }
}
