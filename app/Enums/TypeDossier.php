<?php

namespace App\Enums;

enum TypeDossier: string
{
    case Bail = 'Bail';
    case Construction = 'Construction';
    case Extrait_plan_cadastrale = 'Extrait plan cadastrale';
    case Terrain = 'Terrain';
    case Titre_Foncier = 'Titre foncier';
    case Mutation = 'Mutation';
}
