<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegisterFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rulesMail = 'required|email';
        if(Auth::user() == null)
            $rulesMail .= '|unique:users,mailUtilisateur';
        return [
            'nomUtilisateur' => 'required|string',
            'mailUtilisateur' => $rulesMail,
            'password' => 'required|string|min:8|confirmed'
        ];
    }
}
