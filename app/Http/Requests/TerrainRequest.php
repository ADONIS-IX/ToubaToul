<?php

namespace App\Http\Requests;

use App\Enums\TypeDossier;
use Illuminate\Foundation\Http\FormRequest;

class TerrainRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|in:' . implode(',', array_column(TypeDossier::cases(), 'value')),
            'piece_identite' => 'required|file|mimes:jpeg,png,pdf|max:2048',
        ];
    }
}
