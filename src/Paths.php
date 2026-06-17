<?php

declare(strict_types = 1);

namespace Eridify\SDK;

/**
 * Полные пути (pathname) методов внешнего API, без схемы и хоста.
 */
final class Paths
{

    public const EXT_V1_PING = '/ext/v1/ping';

    public const EXT_V1_CREATIVES_LIST = '/ext/v1/creatives/list';
    public const EXT_V1_CREATIVES_CREATE = '/ext/v1/creatives/create';

    public const EXT_V1_CONTRAGENTS_LIST = '/ext/v1/contragents/list';
    public const EXT_V1_CONTRAGENTS_GET = '/ext/v1/contragents/get';
    public const EXT_V1_CONTRAGENTS_CREATE = '/ext/v1/contragents/create';

    public const EXT_V1_CONTRACTS_LIST = '/ext/v1/contracts/list';
    public const EXT_V1_CONTRACTS_GET = '/ext/v1/contracts/get';
    public const EXT_V1_CONTRACTS_CREATE = '/ext/v1/contracts/create';

    public const EXT_V1_TENCHAT_CAMPAIGNS_CREATE = '/ext/v1/tenchat/campaigns/create';
    public const EXT_V1_TENCHAT_CAMPAIGNS_GET = '/ext/v1/tenchat/campaigns/get';
    public const EXT_V1_TENCHAT_CAMPAIGNS_START = '/ext/v1/tenchat/campaigns/start';
    public const EXT_V1_TENCHAT_CAMPAIGNS_STOP = '/ext/v1/tenchat/campaigns/stop';

    public const EXT_V1_TENCHAT_SLOTS_LIST = '/ext/v1/tenchat/slots/list';
    public const EXT_V1_TENCHAT_AGE_LIMITS_LIST = '/ext/v1/tenchat/ageLimits/list';

    public const EXT_V1_KKTU_CODES_LIST = '/ext/v1/kktuCodes/list';
    public const EXT_V1_OKSM_LIST = '/ext/v1/oksm/list';

    public const EXT_V1_TENCHAT_ADVERTISEMENTS_CREATE = '/ext/v1/tenchat/advertisements/create';
    public const EXT_V1_TENCHAT_ADVERTISEMENTS_STATISTICS = '/ext/v1/tenchat/advertisements/statistics';

    public const EXT_V1_TENCHAT_SPENDS_LIST_UNALLOCATED = '/ext/v1/tenchat/spends/listUnallocated';
    public const EXT_V1_TENCHAT_SPENDS_ALLOCATE = '/ext/v1/tenchat/spends/allocate';

    public const EXT_V1_ACTS_GET = '/ext/v1/acts/get';
    public const EXT_V1_ACTS_CREATE = '/ext/v1/acts/create';
}
