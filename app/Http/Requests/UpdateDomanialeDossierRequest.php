<?php

namespace App\Http\Requests;

use App\Enums\EtatDossier;
use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDomanialeDossierRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
{
    $rules = [
        'statut' => ['required', Rule::in(array_column(EtatDossier::cases(), 'value'))],
    ];

    if ($this->input('statut') === EtatDossier::Approuve->value) {
        $rules = array_merge($rules, [
            'numeroLot' => 'required|unique:parcelles,numeroLot',
            'superficie' => 'required|numeric|min:0',
            'coordonne_x' => 'required|numeric',
            'coordonne_y' => 'required|numeric',
            'lotissement_id' => 'required|exists:lotissements,id',
            'statut_parcelle_id' => 'required|exists:statut_parcelles,id',
            'droit_propriete' => 'required|array',
            'droit_propriete.*' => 'exists:droit_proprietes,id',
            'plan_lotissement' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'notification' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
    }

    return $rules;
}

    public function messages()
    {
        return [
            'statut.required' => 'Le statut du dossier est requis.',
            'statut.in' => 'Le statut sélectionné n\'est pas valide.',
            'numeroLot.required' => 'Le numéro de lot est requis.',
            'numeroLot.unique' => 'Ce numéro de lot existe déjà.',
            'superficie.required' => 'La superficie est requise.',
            'superficie.numeric' => 'La superficie doit être un nombre.',
            'superficie.min' => 'La superficie doit être supérieure à 0.',
            'coordonne_x.required' => 'La coordonnée X est requise.',
            'coordonne_x.numeric' => 'La coordonnée X doit être un nombre.',
            'coordonne_y.required' => 'La coordonnée Y est requise.',
            'coordonne_y.numeric' => 'La coordonnée Y doit être un nombre.',
            'lotissement_id.required' => 'Le lotissement est requis.',
            'lotissement_id.exists' => 'Le lotissement sélectionné n\'existe pas.',
            'statut_parcelle_id.required' => 'Le statut de la parcelle est requis.',
            'statut_parcelle_id.exists' => 'Le statut de parcelle sélectionné n\'existe pas.',
            'droit_propriete.required' => 'Au moins un droit de propriété doit être sélectionné.',
            'droit_propriete.array' => 'Les droits de propriété doivent être fournis sous forme de tableau.',
            'droit_propriete.*.exists' => 'Un ou plusieurs droits de propriété sélectionnés n\'existent pas.',
            'plan_lotissement.required' => 'Le plan de lotissement est requis.',
            'plan_lotissement.file' => 'Le plan de lotissement doit être un fichier.',
            'plan_lotissement.mimes' => 'Le plan de lotissement doit être un fichier PDF, JPG, JPEG ou PNG.',
            'plan_lotissement.max' => 'Le plan de lotissement ne doit pas dépasser 10 Mo.',
            'notification.required' => 'La notification d\'attribution est requis.',
            'notification.file' => 'La notification d\'attribution doit être un fichier.',
            'notification.mimes' => 'La notification d\'attribution doit être un fichier PDF, JPG, JPEG ou PNG.',
            'notification.max' => 'La notification d\'attribution ne doit pas dépasser 2 Mo.'
        ];
    }
}
