<?php

namespace Meccado\AclAdminControlPanel\Http\Requests;

use App\Http\Requests\Request;

class PasswordResetFormRequest extends Request
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
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'token' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|confirmed',
                ];
            }
            case 'PATCH':
            {
                return [
                    'token' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|confirmed',
                ];
            }
        }
    }
}
