<?php declare(strict_types=1);

namespace App\Modules\User\Request;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first' => 'required|integer',
            'page' => 'integer',
            'category_id' => 'ulid|exists:categories,id',
            'skills' => 'array',
            'skills.*' => 'ulid|exists:skills,id'
        ];
    }
}
