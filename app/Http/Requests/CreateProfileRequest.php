<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateProfileRequest extends FormRequest
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
        //$request = Request::All();
        //dd($request);
        return [
            'user_id' => 'required|max:255|unique:profiles|exists:users,id',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            // 'is_admin' => 'required|in:0,1',
            // 'is_user1' => 'required|in:0,1',
            // 'is_user2' => 'required|in:0,1',
            // 'is_user3' => 'required|in:0,1',
        ];
    }
}
