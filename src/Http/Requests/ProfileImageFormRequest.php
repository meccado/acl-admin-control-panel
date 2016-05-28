<?php

namespace Meccado\AclAdminControlPanel\Http\Requests;

use App\Http\Requests\Request;

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
            dd($this->method(), $this);
            case 'PATCH':
            {
                return [
                    'avatar' => "required|image|mimes:jpeg,bmp,png,jpg",
                ];
            }
        }
    }
}
