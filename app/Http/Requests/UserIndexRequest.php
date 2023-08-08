<?php

declare (strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class UserIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'perpage' => ['nullable', 'numeric', 'min:1'],
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'max:255'],
        ];
    }
}
