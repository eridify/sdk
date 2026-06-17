<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\Enum;

enum ContractAction: string
{

    case OTHER = 'other';
    case ADVERTISING_PROMOTION = 'advertising_promotion';
    case COMMERCIAL_REPRESENTATION = 'commercial_representation';
    case REPRESENTATION = 'representation';
    case CONTRACT_CONCLUSION = 'contract_conclusion';

}
