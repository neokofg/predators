<?php declare(strict_types=1);

namespace App\Modules\Auth\Request;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function rules(): array
    {
        return  [
            'login' => 'required|max:30',
            'password' => 'required|max:30'
        ];
    }
}
