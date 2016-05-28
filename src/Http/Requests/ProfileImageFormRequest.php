<?php

namespace Meccado\AclAdminControlPanel\Http\Requests;

use Meccado\AclAdminControlPanel\Http\Requests\Request;

class ProfileImageFormRequest extends Request
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
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'avatar' => "required|image|mimes:jpeg,bmp,png,jpg",
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'avatar' => "required|image|mimes:jpeg,bmp,png,jpg",
                ];
            }
            default:break;
        }
    }
}
