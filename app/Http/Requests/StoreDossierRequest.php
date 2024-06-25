<?php

namespace App\Http\Requests;

use App\Enums\TypeDossier;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDossierRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $rules = [
            'type' => ['required', Rule::in(TypeDossier::cases())],
        ];

        if ($this->type !== TypeDossier::Terrain->value) {
            $rules['parcelle_id'] = ['required', 'exists:parcelles,id'];
        }

        switch ($this->type) {
            case TypeDossier::Bail->value:
                $rules += [
                    'piece_identite_bail' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'notification_attribution_bail' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'extrait_plan_bail' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'quittance_paiement_bail' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                ];
                break;
            case TypeDossier::Construction->value:
                $rules += [
                    'attestation_attribution_construction' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'extrait_plan_cadastrale_construction' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'piece_identite_construction' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'plan_rez' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'plan_facade' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'plan_coupe' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'plan_masse' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'plan_terrasse' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'plan_fosse' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'devis_estimatif' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'devis_descriptif' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'lettre_urbanisme' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                ];
                break;
            case TypeDossier::Extrait_plan_cadastrale->value:
                $rules += [
                    'piece_identite_cadastre' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'notification_attribution_cadastre' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'plan_lotissement' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                ];
                break;
            case TypeDossier::Terrain->value:
                $rules += [
                    'piece_identite' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                ];
                break;
            case TypeDossier::Titre_Foncier->value:
                $rules += [
                    'piece_identite_foncier' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'acte_bail_foncier' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'demande_cession' => 'required|file|mimes:jpeg,png,pdf|max:2048'
                ];
                break;
            case TypeDossier::Mutation->value:
                $rules += [
                    'piece_identite_cedant' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'piece_identite_newproprietaire' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'acte_vente' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'acte_bail' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'acte_peine' => 'required|file|mimes:jpeg,png,pdf|max:2048',
                    'declaration_mutation' => 'required|file|mimes:jpeg,png,pdf|max:2048'
                ];
                break;
            // Ajoutez les règles pour les autres types de dossier ici
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'parcelle_id.required' => 'Le champ Sélectionnez une parcelle est requis.',
            'parcelle_id.exists' => 'La parcelle sélectionnée est invalide.',

            'type.required' => 'Le champ Type de Dossier est requis.',
            'type.in' => 'Le type de dossier sélectionné est invalide.',

            // Personnalisation des messages pour les champs spécifiques
            'piece_identite.required' => 'Le champ :attribute est requis pour ce type de dossier.',
            'piece_identite.file' => 'Le champ :attribute doit être un fichier.',
            'piece_identite.mimes' => 'Le champ :attribute doit être de type JPEG, PNG ou PDF.',
            'piece_identite.max' => 'Le fichier du champ :attribute ne doit pas dépasser 2 Mo.',

            // Personnalisation des messages pour Construction
            'attestation_attribution_construction.required' => 'Le champ attestation d\'attribution est requis.',
            'attestation_attribution_construction.file' => 'Le champ attestation d\'attribution doit être un fichier.',
            'attestation_attribution_construction.mimes' => 'Le champ attestation d\'attribution doit être de type JPEG, PNG ou PDF.',
            'attestation_attribution_construction.max' => 'Le fichier du champ attestation d\'attribution ne doit pas dépasser 2 Mo.',
            'extrait_plan_cadastrale_construction.required' => 'Le champ extrait de plan cadastrale est requis.',
            'extrait_plan_cadastrale_construction.max' => 'Le champ extrait de plan cadastrale ne doit pas dépasser 2 Mo.',
            'piece_identite_construction.required' => 'Le champ carte d\'identité national est requis.',
            'piece_identite_construction.max' => 'Le champ carte d\'identité national ne doit pas dépasser 2 Mo.',
            'plan_rez.required' => 'Le champ plan architectural - Rez-de-chaussée est requis.',
            'plan_rez.max' => 'Le champ plan architectural - Rez-de-chaussée ne doit pas dépasser 2 Mo.',
            'plan_facade.required' => 'Le champ plan architectural - Façade principale est requis.',
            'plan_facade.max' => 'Le champ plan architectural - Façade principale ne doit pas dépasser 2 Mo.',
            'plan_coupe.required' => 'Le champ plan architectural - Plan de coupe est requis',
            'plan_coupe.max' => 'Le champ plan architectural - Plan de coupe ne doit pas dépasser 2 Mo.',
            'plan_masse.required' => 'Le champ plan architectural - Plan de masse est requis.',
            'plan_masse.max' => 'Le champ plan architectural - Plan de masse ne doit pas dépasser 2 Mo.',
            'plan_terrasse.required' => 'Le champ plan architectural - Plan terrasse est requis',
            'plan_terrasse.max' => 'Le champ plan architectural - Plan terrasse ne doit pas dépasser 2 Mo.',
            'plan_fosse.required' => 'Le champ Plan architectural - Plan fosse septique est requis',
            'plan_fosse.max' => 'Le champ Plan architectural - Plan fosse septique ne doit pas dépasser 2 Mo.',
            'devis_estimatif.required' => 'Le champ devis estimatif est requis',
            'devis_estimatif.max' => 'Le champ devis estimatif ne doit pas dépasser 2 Mo.',
            'devis_descriptif.required' => 'Le champ devis_descriptif est requis.',
            'devis_descriptif.max' => 'Le champ devis descriptif ne doit pas dépasser 2 Mo.',
            'lettre_urbanisme.required' => 'Le champ lettre au chef urbanisme est requis.',
            'lettre_urbanisme.max' => 'Le champ lettre au chef urbanisme ne doit pas dépasser 2 Mo.',

             // Personnalisation des messages pour Bail
            'piece_identite_bail.required' => 'Le champ carte d\'identité national est requis.',
            'piece_identite_bail.max' => 'Le champ carte d\'identité national ne doit pas dépasser 2 Mo.',
            'notification_attribution_bail.required' => 'Le champ notification d\'attribution est requis.',
            'notification_attribution_bail.max' => 'Le champ notification d\'attribution ne doit pas dépasser 2 Mo.',
            'extrait_plan_bail.required' => 'Le champ extrait de plan cadastral est requis.',
            'extrait_plan_bail.max' => 'Le champ extrait de plan cadastral ne doit pas dépasser 2 Mo.',
            'quittance_paiement_bail.required' => 'Le champ quittance de paiementest est requis.',
            'quittance_paiement_bail.max' => 'Le champ quittance de paiementest ne doit pas dépasser 2 Mo.',









            // Ajoutez d'autres messages selon vos règles de validation
        ];
    }
}

