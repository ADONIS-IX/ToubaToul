<?php

namespace App\Enums;

enum EtatDossier: string
{
    case En_attente = 'En attente';
    case Approuve = 'Approuve';
    case Refuse = 'Refuse';
}
