<?php

namespace App\Enums;

enum Role: string
{
    case Depositaire = 'depositaire';
    case Agent_Cadastrale = 'agent_cadastrale';
    case Agent_Domaniale = 'agent_domaniale';
    case Agent_Hygiene = 'agent_hygiene';
    case Agent_Impots_Domaines = 'agent_impots_domaines';
    case Agent_Urbanisme = 'agent_urbanisme';
    case Maire = 'maire';
    case Proprietaire = 'proprietaire';
}
