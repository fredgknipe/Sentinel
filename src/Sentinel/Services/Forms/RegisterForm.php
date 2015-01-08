<?php namespace Sentinel\Services\Forms;

use Sentinel\Services\Validation\FormValidator;

class RegisterForm extends FormValidator {

    protected $rules = [
        'email' => 'required|min:4|max:254|email',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required',
        'username' => 'unique:users,username'
    ];

    protected $messages = [];
}