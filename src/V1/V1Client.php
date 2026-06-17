<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1;

use Eridify\SDK\Http\HttpClient;
use Eridify\SDK\V1\Tenchat\TenchatClient;

/**
 * Клиент для внешнего API (prefix `/ext/v1`). Все обращения — HTTP POST.
 */
final class V1Client
{

    public readonly PingEndpoint $ping;
    public readonly CreativesEndpoint $creatives;
    public readonly ContragentsEndpoint $contragents;
    public readonly ContractsEndpoint $contracts;
    public readonly TenchatClient $tenchat;
    public readonly KktuCodesEndpoint $kktuCodes;
    public readonly OksmEndpoint $oksm;
    public readonly ActsEndpoint $acts;

    public function __construct(HttpClient $transport)
    {
        $this->ping = new PingEndpoint($transport);
        $this->creatives = new CreativesEndpoint($transport);
        $this->contragents = new ContragentsEndpoint($transport);
        $this->contracts = new ContractsEndpoint($transport);
        $this->tenchat = new TenchatClient($transport);
        $this->kktuCodes = new KktuCodesEndpoint($transport);
        $this->oksm = new OksmEndpoint($transport);
        $this->acts = new ActsEndpoint($transport);
    }

}
