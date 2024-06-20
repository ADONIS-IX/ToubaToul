<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'prenom' => ['required', 'string', 'between:3,255', 'regex:/^[\pL\s\-]+$/u'],
            'nom' => ['required', 'string', 'between:2,255', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'email', 'unique:users', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/'],
            'profession' => ['required', 'string', 'between:3,255', 'regex:/^[\pL\s\-]+$/u'],
            'genre' => ['required', 'string', 'in:homme,femme'],
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
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit avoir au moins 8 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            'password.regex' => 'Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.',
            'profession.required' => 'La profession est obligatoire.',
            'profession.between' => 'La profession doit avoir entre 3 et 255 caractères.',
            'profession.regex' => 'La profession ne peut contenir que des lettres, des espaces et des tirets.',
            'genre.required' => 'Le genre est obligatoire.',
            'genre.in' => 'Le genre doit être soit male, female, ou other.',
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

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('depositaire.index')->withStatus('Inscription réussie !');
    }
}
