<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Http\Request;

class EditProfileRequest extends FormRequest
{

    private $route;

    public function __construct(Route $route){

        $this->route = $route;

    }

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
        //$request = Request::All();
        //dd(Request::All());
        return [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            // 'is_admin' => 'required|in:0,1',
            // 'is_user1' => 'required|in:0,1',
            // 'is_user2' => 'required|in:0,1',
            // 'is_user3' => 'required|in:0,1',
        ];
    }
}
