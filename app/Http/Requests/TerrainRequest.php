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

    public function messages()
    {
        return [
            'piece_identite.required' => 'Le champ catre national d\'identité est requis.',
            'piece_identite.file' => 'Le champ :attribute doit être un fichier.',
            'piece_identite.mimes' => 'Le champ :attribute doit être de type JPEG, PNG ou PDF.',
            'piece_identite.max' => 'Le fichier du champ :attribute ne doit pas dépasser 2 Mo.',

            'type.required' => 'Le champ Type de Dossier est requis.',
            'type.in' => 'Le type de dossier sélectionné est invalide.',
        ];
    }
}
