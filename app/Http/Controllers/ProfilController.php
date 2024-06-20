<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $user = auth()->user();

        return view('profile.information', [
            'user' => $user
        ]);
    }

    public function updateProfil(Request $request): RedirectResponse
    {
        $user = auth()->user();

        $validated = $request->validate([
            'prenom' => ['required', 'string', 'between:3,255', 'regex:/^[\pL\s\-]+$/u'],
            'nom' => ['required', 'string', 'between:2,255', 'regex:/^[\pL\s\-]+$/u'],
            'profession' => ['required', 'string', 'between:3,255', 'regex:/^[\pL\s\-]+$/u'],
            'genre' => ['required', 'string', 'in:Homme,Femme'],
            'adresse' => ['required', 'string', 'max:255'],
            'numero_cni' => ['required', 'string', 'size:13', 'regex:/^[0-9]+$/'],
            'telephone' => ['required', 'string', 'between:9,12'],
            'date_naissance' => ['required', 'date', 'before:-18 years'],
            'lieu_naissance' => ['required', 'string', 'max:255'],
        ], [
            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.between' => 'Le prénom doit avoir entre 3 et 255 caractères.',
            'prenom.regex' => 'Le prénom ne peut contenir que des lettres, des espaces et des tirets.',
            'nom.required' => 'Le nom est obligatoire.',
            'nom.between' => 'Le nom doit avoir entre 2 et 255 caractères.',
            'nom.regex' => 'Le nom ne peut contenir que des lettres, des espaces et des tirets.',
            'email.required' => "L'email est obligatoire.",
            'email.email' => "L'email doit être une adresse email valide.",
            'email.unique' => "Cet email est déjà utilisé.",
            'email.max' => "L'email ne peut pas dépasser 255 caractères.",
            'profession.required' => 'La profession est obligatoire.',
            'profession.between' => 'La profession doit avoir entre 3 et 255 caractères.',
            'profession.regex' => 'La profession ne peut contenir que des lettres, des espaces et des tirets.',
            'genre.required' => 'Le genre est obligatoire.',
            'genre.in' => 'Le genre doit être soit Homme, Femme.',
            'adresse.required' => "L'adresse est obligatoire.",
            'adresse.max' => "L'adresse ne peut pas dépasser 255 caractères.",
            'numero_cni.required' => 'Le numéro de CNI est obligatoire.',
            'numero_cni.size' => 'Le numéro de CNI doit avoir exactement 13 chiffres.',
            'numero_cni.regex' => 'Le numéro de CNI doit contenir uniquement des chiffres.',
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'telephone.between' => 'Le numéro de téléphone doit avoir entre 9 et 12 chiffres.',
            'telephone.regex' => 'Le numéro de téléphone doit contenir uniquement des chiffres.',
            'date_naissance.required' => 'La date de naissance est obligatoire.',
            'date_naissance.date' => 'La date de naissance doit être une date valide.',
            'date_naissance.before' => 'Vous devez avoir au moins 18 ans.',
            'lieu_naissance.required' => 'Le lieu de naissance est obligatoire.',
            'lieu_naissance.max' => 'Le lieu de naissance ne peut pas dépasser 255 caractères.',

        ]);

        $user->update($validated);

        switch ($user->role->value) {
            case 'agent_domaniale':
                return redirect()->route('domaniale.index')->withStatus('Profil mis à jour avec succès!');;
            case 'agent_urbanisme':
                return redirect()->route('urbanisme.index')->withStatus('Profil mis à jour avec succès!');;
            case 'agent_cadastrale':
                return redirect()->route('cadastrale.index')->withStatus('Profil mis à jour avec succès!');;
            case 'agent_impots_domaines':
                return redirect()->route('impots-domaines.index')->withStatus('Profil mis à jour avec succès!');;
            case 'agent_hygiene':
                return redirect()->route('hygiene.index')->withStatus('Profil mis à jour avec succès!');;
            case 'depositaire':
                return redirect()->route('depositaire.index')->withStatus('Profil mis à jour avec succès!');;
            case 'maire':
                return redirect()->route('maire.index')->withStatus('Profil mis à jour avec succès!');;
            case 'proprietaire':
                return redirect()->route('proprietaire.index')->withStatus('Profil mis à jour avec succès!');;
            default:
                return redirect()->intended('/');

        }

    }

}
