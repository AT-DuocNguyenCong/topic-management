<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicCreateRequest extends FormRequest
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
            'name' => 'required',
            'fields_id' => 'required',
            'level_id'  => 'required',
            'expense'  => 'required',
            'over_view'  => 'required',
            'urgency'  => 'required',
            'own_user_id'  => 'required',
            'max_member' => 'required',
            'method' => 'required',
            'document_path',
            'date_begin' => 'required',
            'date_end'  => 'required',
        ];
    }
}
