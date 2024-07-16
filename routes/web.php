<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CadastraleInstructionController;
use App\Http\Controllers\DomanialeInstructionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LotController;
use App\Http\Controllers\MaireDemandeController;
use App\Http\Controllers\MaireLocaliteController;
use App\Http\Controllers\MaireLotissementController;
use App\Http\Controllers\MaireParcelleController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\User\AgentCadastraleController;
use App\Http\Controllers\User\AgentDomanialeController;
use App\Http\Controllers\User\AgentHygieneController;
use App\Http\Controllers\User\AgentImpotsDomainesController;
use App\Http\Controllers\User\AgentUrbanismeController;
use App\Http\Controllers\User\DepositaireController;
use App\Http\Controllers\User\MaireController;
use App\Http\Controllers\User\ProprietaireController;
use Illuminate\Support\Facades\Route;



Route::get('/inscription', [RegisterController::class, 'showRegistrationForm'])->name('inscription');
Route::post('/inscription', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', [HomeController::class, 'index'])->name('index')->middleware('role');



Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::patch('/profil', [ProfilController::class, 'updateProfil']);
Route::get('/profil/password-update', [PasswordController::class, 'index'])->name('password');
Route::patch('/profil/password-update', [PasswordController::class, 'updatePassword']);

Route::get('/lot', [LotController::class, 'index'])->name('lot');





Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:agent_domaniale'])->group(function () {
        Route::resource('/agent/domaniale', AgentDomanialeController::class);
        Route::resource('/domaniale/instruction', DomanialeInstructionController::class)->names('domaniale.instruction');
    });
    Route::middleware(['role:agent_cadastrale'])->group(function () {
        Route::resource('/agent/cadastrale', AgentCadastraleController::class);
        Route::resource('/cadastrale/instruction', CadastraleInstructionController::class)->names('cadastrale.instruction');
    });
    Route::middleware(['role:agent_impots_domaines'])->group(function () {
        Route::resource('/agent/impots-domaines', AgentImpotsDomainesController::class);
    });
    Route::middleware(['role:agent_hygiene'])->group(function () {
        Route::resource('/agent/hygiene', AgentHygieneController::class);
    });
    Route::middleware(['role:agent_urbanisme'])->group(function () {
        Route::resource('/agent/urbanisme', AgentUrbanismeController::class);
    });
    Route::middleware(['role:depositaire'])->group(function () {
        Route::resource('/depositaire', DepositaireController::class)->names('depositaire');
    });
    Route::middleware(['role:maire'])->group(function () {
        Route::resource('/maire', MaireController::class);
        Route::get('/mairie/demande', [MaireDemandeController::class,'index'])->name('demande');
        Route::get('/mairie/parcelle', [MaireParcelleController::class,'index'])->name('parcelle');
        Route::get('/mairie/localite', [MaireLocaliteController::class,'index'])->name('localite');
        Route::post('/localite', [MaireLocaliteController::class, 'store'])->name('store');
        Route::get('/mairie/lotissement', [MaireLotissementController::class,'index'])->name('lotissement');
        Route::post('lotissements', [MaireLotissementController::class, 'store'])->name('store');

    });
    Route::middleware(['role:proprietaire'])->group(function () {
        Route::resource('/proprietaire', ProprietaireController::class);
    });
});
