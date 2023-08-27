<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // campos do form nao podem ser deixados vazios
        return [
            'question'=>'required',
            'correct_answer'=>'required',
            'incorrect_answer1'=>'required',
            'incorrect_answer2'=>'required',
            'incorrect_answer3'=>'required' 
        ];
    }

    public function messages()
    {
        // mensagens apresentadas caso utilizador submeta o form com campos vazios
        return [
            'question.required' => "Please enter a question.",
            'incorrect_answer1' => "Please enter an incorrect answer.",
            'incorrect_answer2' => "Please enter an incorrect answer.",
            'incorrect_answer3' => "Please enter an incorrect answer."
        ];
    }
}
