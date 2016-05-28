<?php

namespace Meccado\AclAdminControlPanel\Http\Requests;

use Meccado\AclAdminControlPanel\Http\Requests\Request;

class ProfileFormRequest extends Request
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
                    'bio'         => 'required|min:3|max:255',
                    'experience'  => 'required|min:3|max:60',
                    'address'     => 'required|min:3|max:160',
                    'city'        => 'required|min:3|max:60',
                    'state'       => 'required|min:3|max:60',
                    'zip'         => 'required|size:5|integer',
                ];
            }
            case 'PATCH':
            {
                return [
                  'bio'         => 'required|min:3|max:255',
                  'experience'  => 'required|min:3|max:60',
                  'address'     => 'required|min:3|max:160',
                  'city'        => 'required|min:3|max:60',
                  'state'       => 'required|min:3|max:60',
                  'zip'         => 'required|size:5|integer',
                ];
            }
        }
    }
}
