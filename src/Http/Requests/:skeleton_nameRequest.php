<?php

namespace :namespace_vendor\:namespace_skeleton_name\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class :skeleton_nameRequest extends FormRequest
{
    protected $errorBag = 'admix';

    public function rules()
    {
        return [
            'is_active' => [
                'required',
                'boolean',
            ],
            'name' => [
                'required',
                'max:150',
            ],
            'media' => [
                'array',
                'nullable',
            ],
        ];
    }

    public function attributes()
    {
        return [
            'is_active' => 'ativo',
            'name' => 'nome',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
