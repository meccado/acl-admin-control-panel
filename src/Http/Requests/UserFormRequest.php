<?php

namespace Meccado\AclAdminControlPanel\Http\Requests;

use Meccado\AclAdminControlPanel\Http\Requests\Request;

class UserFormRequest extends Request
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
                  'username' => 'required|alpha_dash',
                  //'name'     => 'required|max:255',
                  'email'    => 'required|email',
                  'password' => 'required|between:8,20|confirmed',
                  //'age'      => 'required|integer|max:60'
                ];
            }
            case 'PATCH':
            {
              // Grab the user id from the URL
              $user_id = \Route::current()->getParameter('users');
                return [
                  'username' => 'required|alpha_dash',
                  //'name'     => 'required|max:255',
                  //'email'    => 'required|email',
                  'email'    => 'unique:users,email,'.$user_id.'|email|required',
                  'password' => 'required|between:8,20|confirmed',
                  //'age'      => 'required|integer|max:60'
                ];
            }
        }
    }
}
