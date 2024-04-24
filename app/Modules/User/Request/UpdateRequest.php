<?php declare(strict_types=1);

namespace App\Modules\User\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|max:50',
            'surname' => 'string|max:50',
            'fias_id' => 'uuid',
            'birthdate' => 'date',
            'education_place' => 'string|max:100',
            'work_place' => 'string|max:100',
            'categories' => 'array',
            'categories.*' => 'string|max:50',
            'skills' => 'array',
            'skills.*' => 'string|max:50',
            'email' => 'email|max:255',
            'phone' => 'string|max:12',
            'website' => 'url|max:255',
            'telegram' => 'string|max:255',
            'vk' => 'string|max:255',
            'description' => 'string|max:500',
            'avatar' => 'file|mimes:jpeg,jpg,png,webp'
        ];
    }
}
