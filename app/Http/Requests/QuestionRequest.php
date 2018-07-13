<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'img_url' => 'required|',
            'qty_answ' => 'required|integer',
            'cor_answ' => 'required|integer',
            'answers' => 'required|min:5|max:255',
            'user_id' => 'required',
            'theme_id' => 'required',
            'pdd_links' => 'required|min:5|max:255',
            'feature' => 'required|min:5|max:255',
            'comments' => 'required|min:5|max:255'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            // 'name' => 'Имя',
            // 'img_url' => 'Изображение',
            // 'qty_answ' => 'Кол-во ответов',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            
        ];
    }
}
