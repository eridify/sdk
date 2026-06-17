<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1;

use DateTimeImmutable;
use Eridify\SDK\Exception\BaseException;
use Eridify\SDK\V1\DTO\Acts\V1ActsCreateRequest;
use Eridify\SDK\V1\DTO\Acts\V1ActsCreateResponse;
use Eridify\SDK\V1\DTO\Acts\V1ActsGetResponse;
use Eridify\SDK\V1\DTO\Common\PaginationDto;
use Eridify\SDK\V1\DTO\Common\SortDto;
use Eridify\SDK\V1\DTO\Contracts\V1ContractsCreateRequest;
use Eridify\SDK\V1\DTO\Contracts\V1ContractsCreateResponse;
use Eridify\SDK\V1\DTO\Contracts\V1ContractsGetResponse;
use Eridify\SDK\V1\DTO\Contracts\V1ContractsListRequest;
use Eridify\SDK\V1\DTO\Contracts\V1ContractsListResponse;
use Eridify\SDK\V1\DTO\Contragents\V1ContragentsCreateRequest;
use Eridify\SDK\V1\DTO\Contragents\V1ContragentsCreateResponse;
use Eridify\SDK\V1\DTO\Contragents\V1ContragentsGetResponse;
use Eridify\SDK\V1\DTO\Contragents\V1ContragentsListRequest;
use Eridify\SDK\V1\DTO\Contragents\V1ContragentsListResponse;
use Eridify\SDK\V1\DTO\Creative\CreativeAudienceAgeIntervalDto;
use Eridify\SDK\V1\DTO\Creative\CreativeCreateRequestDto;
use Eridify\SDK\V1\DTO\Creative\CreativeListRequestDto;
use Eridify\SDK\V1\DTO\Creative\CreativeListResponseDto;
use Eridify\SDK\V1\DTO\Creative\CreativeResourceDto;
use Eridify\SDK\V1\DTO\Creative\Kktu;
use Eridify\SDK\V1\DTO\Creative\RfRegion;
use Eridify\SDK\V1\DTO\KktuCodes\V1KktuCodesListResponse;
use Eridify\SDK\V1\DTO\Oksm\V1OksmListResponse;
use Eridify\SDK\V1\DTO\Tenchat\Advertisements\V1TenchatAdvertisementsCreateRequest;
use Eridify\SDK\V1\DTO\Tenchat\Advertisements\V1TenchatAdvertisementsCreateResponse;
use Eridify\SDK\V1\DTO\Tenchat\Advertisements\V1TenchatAdvertisementsStatisticsRequest;
use Eridify\SDK\V1\DTO\Tenchat\Advertisements\V1TenchatAdvertisementsStatisticsResponse;
use Eridify\SDK\V1\DTO\Tenchat\AgeLimits\V1TenchatAgeLimitsListResponse;
use Eridify\SDK\V1\DTO\Tenchat\Campaigns\V1TenchatCampaignsCreateRequest;
use Eridify\SDK\V1\DTO\Tenchat\Campaigns\V1TenchatCampaignsCreateResponse;
use Eridify\SDK\V1\DTO\Tenchat\Campaigns\V1TenchatCampaignsGetResponse;
use Eridify\SDK\V1\DTO\Tenchat\Slots\V1TenchatSlotsListResponse;
use Eridify\SDK\V1\DTO\Tenchat\Spends\V1TenchatSpendsAllocateRequest;
use Eridify\SDK\V1\DTO\Tenchat\Spends\V1TenchatSpendsAllocateResponse;
use Eridify\SDK\V1\DTO\Tenchat\Spends\V1TenchatSpendsListUnallocatedRequest;
use Eridify\SDK\V1\DTO\Tenchat\Spends\V1TenchatSpendsListUnallocatedResponse;
use Eridify\SDK\V1\Enum\AdvertiseStatus;
use Eridify\SDK\V1\Enum\ContractType;
use Eridify\SDK\V1\Enum\ContragentRole;
use Eridify\SDK\V1\Enum\ContragentType;
use Eridify\SDK\V1\Enum\CustomerRole;
use Eridify\SDK\V1\Enum\ExecutorRole;
use Eridify\SDK\V1\Enum\SlotStatus;
use Eridify\SDK\V1\Enum\Subject;

/**
 * Сериализация DTO запросов в JSON-массив и разбор полезной нагрузки {@code response} в DTO.
 */
final class V1Codec
{

    /**
     * @return array<string, mixed>
     */
    public static function creativeListRequestToArray(CreativeListRequestDto $request): array
    {
        $data = ['organizationId' => $request->organizationId];

        if ($request->search !== null) {
            $data['search'] = $request->search;
        }

        if ($request->creativeType !== null) {
            $data['creativeType'] = $request->creativeType->value;
        }

        if ($request->brand !== null) {
            $data['brand'] = $request->brand;
        }

        if ($request->category !== null) {
            $data['category'] = $request->category;
        }

        if ($request->adTypes !== null) {
            $data['adTypes'] = $request->adTypes;
        }

        if ($request->customerCounterpartyId !== null) {
            $data['customerCounterpartyId'] = $request->customerCounterpartyId;
        }

        if ($request->kcptCode !== null) {
            $data['kcptCode'] = $request->kcptCode;
        }

        if ($request->audience !== null) {
            $data['audience'] = $request->audience;
        }

        if ($request->initialContractId !== null) {
            $data['initialContractId'] = $request->initialContractId;
        }

        if ($request->sort !== null) {
            $data['sort'] = self::sortDtoToArray($request->sort);
        }

        if ($request->paginate !== null) {
            $data['paginate'] = self::paginationDtoToArray($request->paginate);
        }

        return $data;
    }

    /**
     * @return array<string, mixed>
     */
    public static function creativeCreateRequestToArray(CreativeCreateRequestDto $request): array
    {
        $data = [
            'organizationId'           => $request->organizationId,
            'title'                    => $request->title,
            'creativeType'             => $request->creativeType->value,
            'kktuCodes'                => array_map(
                static fn(Kktu $code): string => $code->value,
                $request->kktuCodes,
            ),
            'isSelfPromotion'          => $request->isSelfPromotion,
            'isSocialQuotaAdvertising' => $request->isSocialQuotaAdvertising,
            'isSocialAdvertising'      => $request->isSocialAdvertising,
            'isCoBranding'             => $request->isCoBranding,
        ];

        if ($request->advertisedObjectBrand !== null) {
            $data['advertisedObjectBrand'] = $request->advertisedObjectBrand;
        }

        if ($request->advertisedObjectCategory !== null) {
            $data['advertisedObjectCategory'] = $request->advertisedObjectCategory;
        }

        if ($request->advertisedObjectDescription !== null) {
            $data['advertisedObjectDescription'] = $request->advertisedObjectDescription;
        }

        if ($request->audienceRegionIds !== []) {
            $data['audienceRegionIds'] = array_map(
                static fn(RfRegion $region): string => $region->value,
                $request->audienceRegionIds,
            );
        }

        if ($request->audienceIsAllRussia) {
            $data['audienceIsAllRussia'] = true;
        }

        if ($request->audienceGender !== null) {
            $data['audienceGender'] = $request->audienceGender->value;
        }

        if ($request->audienceAgeIntervals !== []) {
            $data['audienceAgeIntervals'] = array_map(
                static fn(CreativeAudienceAgeIntervalDto $interval
                ): array => self::audienceAgeIntervalDtoToArray($interval),
                $request->audienceAgeIntervals,
            );
        }

        if ($request->initialContractIds !== []) {
            $data['initialContractIds'] = $request->initialContractIds;
        }

        if ($request->customerCounterpartyId !== null) {
            $data['customerCounterpartyId'] = $request->customerCounterpartyId;
        }

        if ($request->links !== []) {
            $data['links'] = $request->links;
        }

        if ($request->textBlocks !== []) {
            $data['textBlocks'] = $request->textBlocks;
        }

        return $data;
    }

    /**
     * @return list<array{name: string, contents: mixed, filename?: string, headers?: array<string, string>}>
     */
    public static function creativeCreateRequestToMultipart(CreativeCreateRequestDto $request): array
    {
        $multipart = [];

        foreach (self::creativeCreateRequestToArray($request) as $key => $value) {
            self::appendMultipartField($multipart, $key, $value);
        }

        foreach (array_values($request->files) as $index => $file) {
            if (!is_resource($file) || get_resource_type($file) !== 'stream') {
                throw new BaseException('files должен содержать только stream resource');
            }

            $multipart[] = [
                'name'     => 'files[' . $index . ']',
                'contents' => $file,
            ];
        }

        return $multipart;
    }

    /**
     * @param array<string, mixed> $response
     */
    public static function creativeListResponseFromPayload(array $response): CreativeListResponseDto
    {
        return new CreativeListResponseDto(
            items: $response['items'],
            count: $response['count'],
        );
    }

    /**
     * @param array<string, mixed> $response
     */
    public static function creativeResourceFromPayload(array $response): CreativeResourceDto
    {
        return new CreativeResourceDto(data: $response);
    }

    /**
     * @return array<string, mixed>
     */
    public static function contragentsListRequestToArray(V1ContragentsListRequest $request): array
    {
        $data = ['type' => $request->type->value];

        self::setOptionalString($data, 'inn', $request->inn);
        self::setOptionalString($data, 'search', $request->search);
        self::setOptionalString($data, 'kpp', $request->kpp);
        self::setOptionalString($data, 'phone', $request->phone);
        self::setOptionalString($data, 'country', $request->country);

        return $data;
    }

    /**
     * @param list<array<string, mixed>> $response
     * @return list<V1ContragentsListResponse>
     */
    public static function contragentsListFromPayload(array $response): array
    {
        return array_map(
            static fn(array $item): V1ContragentsListResponse => self::contragentsListResponseFromPayload($item),
            $response,
        );
    }

    /**
     * @param array<string, mixed> $response
     */
    public static function contragentsGetFromPayload(array $response): V1ContragentsGetResponse
    {
        $item = self::contragentsListResponseFromPayload($response);

        return new V1ContragentsGetResponse(
            contragentId: $item->contragentId,
            type: $item->type,
            roles: $item->roles,
            name: $item->name,
            fullName: $item->fullName,
            inn: $item->inn,
            kpp: $item->kpp,
            phone: $item->phone,
            urlAdvertisingNetwork: $item->urlAdvertisingNetwork,
            country: $item->country,
            walletNumber: $item->walletNumber,
            foreignInn: $item->foreignInn,
            registrationNumber: $item->registrationNumber,
        );
    }

    /**
     * @return array<string, mixed>
     */
    public static function contragentsCreateRequestToArray(V1ContragentsCreateRequest $request): array
    {
        $data = [
            'type'  => $request->type->value,
            'roles' => self::contragentRolesToArray($request->roles),
        ];

        self::setOptionalString($data, 'phone', $request->phone);
        self::setOptionalString($data, 'urlAdvertisingNetwork', $request->urlAdvertisingNetwork);
        self::setOptionalString($data, 'name', $request->name);
        self::setOptionalString($data, 'fullName', $request->fullName);
        self::setOptionalString($data, 'inn', $request->inn);
        self::setOptionalString($data, 'kpp', $request->kpp);
        self::setOptionalString($data, 'country', $request->country);
        self::setOptionalString($data, 'walletNumber', $request->walletNumber);
        self::setOptionalString($data, 'foreignInn', $request->foreignInn);
        self::setOptionalString($data, 'registrationNumber', $request->registrationNumber);

        return $data;
    }

    /**
     * @param array<string, mixed> $response
     */
    public static function contragentsCreateFromPayload(array $response): V1ContragentsCreateResponse
    {
        return new V1ContragentsCreateResponse(
            contragentId: $response['contragentId'],
        );
    }

    /**
     * @return array<string, mixed>
     */
    public static function contractsListRequestToArray(V1ContractsListRequest $request): array
    {
        $data = [];

        if ($request->customerId !== null) {
            $data['customerId'] = $request->customerId;
        }

        if ($request->executorId !== null) {
            $data['executorId'] = $request->executorId;
        }

        self::setOptionalString($data, 'contractNumber', $request->contractNumber);

        return $data;
    }

    /**
     * @param list<array<string, mixed>> $response
     * @return list<V1ContractsListResponse>
     */
    public static function contractsListFromPayload(array $response): array
    {
        return array_map(
            static fn(array $item): V1ContractsListResponse => self::contractsListResponseFromPayload($item),
            $response,
        );
    }

    /**
     * @param array<string, mixed> $response
     */
    public static function contractsGetFromPayload(array $response): V1ContractsGetResponse
    {
        $item = self::contractsListResponseFromPayload($response);

        return new V1ContractsGetResponse(
            contractId: $item->contractId,
            customerId: $item->customerId,
            executorId: $item->executorId,
            contractType: $item->contractType,
            dateStart: $item->dateStart,
            subject: $item->subject,
            executorKeepsCreativeRecords: $item->executorKeepsCreativeRecords,
            contractNumber: $item->contractNumber,
            dateEnd: $item->dateEnd,
            amount: $item->amount,
        );
    }

    /**
     * @return array<string, mixed>
     */
    public static function contractsCreateRequestToArray(V1ContractsCreateRequest $request): array
    {
        $data = [
            'customerId'                   => $request->customerId,
            'executorId'                   => $request->executorId,
            'contractType'                 => $request->contractType->value,
            'dateStart'                    => self::dateToPayload($request->dateStart),
            'subject'                      => $request->subject->value,
            'executorKeepsCreativeRecords' => $request->executorKeepsCreativeRecords,
        ];

        self::setOptionalString($data, 'contractNumber', $request->contractNumber);

        if ($request->dateEnd !== null) {
            $data['dateEnd'] = self::dateToPayload($request->dateEnd);
        }

        if ($request->amount !== null) {
            $data['amount'] = $request->amount;
        }

        self::setOptionalString($data, 'comment', $request->comment);

        if ($request->parentContractId !== null) {
            $data['parentContractId'] = $request->parentContractId;
        }

        if ($request->actions !== null) {
            $data['actions'] = $request->actions->value;
        }

        if ($request->agentActs !== null) {
            $data['agentActs'] = $request->agentActs;
        }

        if ($request->feePaidByIntermediary !== null) {
            $data['feePaidByIntermediary'] = $request->feePaidByIntermediary;
        }

        return $data;
    }

    /**
     * @param array<string, mixed> $response
     */
    public static function contractsCreateFromPayload(array $response): V1ContractsCreateResponse
    {
        return new V1ContractsCreateResponse(
            contractId: $response['contractId'],
        );
    }

    /**
     * @return array<string, mixed>
     */
    public static function tenchatCampaignCreateRequestToArray(V1TenchatCampaignsCreateRequest $request): array
    {
        $data = [
            'ogrn'          => $request->ogrn,
            'name'          => $request->name,
            'startDate'     => self::dateToPayload($request->startDate),
            'endDate'       => self::dateToPayload($request->endDate),
            'budget'        => $request->budget,
            'cpm'           => $request->cpm,
            'displayNumber' => $request->displayNumber,
        ];

        if ($request->cities !== null) {
            $data['cities'] = $request->cities;
        }

        self::setOptionalString($data, 'comment', $request->comment);

        return $data;
    }

    /**
     * @param array<string, mixed> $response
     */
    public static function tenchatCampaignCreateFromPayload(array $response): V1TenchatCampaignsCreateResponse
    {
        return self::tenchatCampaignResponseFromPayload($response);
    }

    /**
     * @param array<string, mixed> $response
     */
    public static function tenchatCampaignGetFromPayload(array $response): V1TenchatCampaignsGetResponse
    {
        $item = self::tenchatCampaignResponseFromPayload($response);

        return new V1TenchatCampaignsGetResponse(
            campaignId: $item->campaignId,
            ogrn: $item->ogrn,
            name: $item->name,
            startDate: $item->startDate,
            endDate: $item->endDate,
            budget: $item->budget,
            cpm: $item->cpm,
            displayNumber: $item->displayNumber,
            cities: $item->cities,
            status: $item->status,
            comment: $item->comment,
        );
    }

    /**
     * @param list<array<string, mixed>> $response
     * @return list<V1TenchatSlotsListResponse>
     */
    public static function tenchatSlotsListFromPayload(array $response): array
    {
        return array_map(
            static fn(array $item): V1TenchatSlotsListResponse => self::tenchatSlotsListResponseFromPayload($item),
            $response,
        );
    }

    /**
     * @param list<array<string, mixed>> $response
     * @return list<V1TenchatAgeLimitsListResponse>
     */
    public static function tenchatAgeLimitsListFromPayload(array $response): array
    {
        return array_map(
            static fn(array $item
            ): V1TenchatAgeLimitsListResponse => self::tenchatAgeLimitsListResponseFromPayload($item),
            $response,
        );
    }

    /**
     * @param list<array<string, mixed>> $response
     * @return list<V1KktuCodesListResponse>
     */
    public static function kktuCodesListFromPayload(array $response): array
    {
        return array_map(
            static fn(array $item): V1KktuCodesListResponse => self::kktuCodesListResponseFromPayload($item),
            $response,
        );
    }

    /**
     * @param list<array<string, mixed>> $response
     * @return list<V1OksmListResponse>
     */
    public static function oksmListFromPayload(array $response): array
    {
        return array_map(
            static fn(array $item): V1OksmListResponse => self::oksmListResponseFromPayload($item),
            $response,
        );
    }

    /**
     * @return array<string, mixed>
     */
    public static function tenchatAdvertisementCreateRequestToArray(V1TenchatAdvertisementsCreateRequest $request
    ): array {
        $data = [
            'initialContractId'    => $request->initialContractId,
            'kktuCodes'            => $request->kktuCodes,
            'campaignId'           => $request->campaignId,
            'slotId'               => $request->slotId,
            'ageLimitKey'          => $request->ageLimitKey,
            'name'                 => $request->name,
            'erid'                 => $request->erid,
            'targetUrl'            => $request->targetUrl,
            'displayNumberPerUser' => $request->displayNumberPerUser,
        ];

        self::setOptionalString($data, 'comment', $request->comment);

        return $data;
    }

    /**
     * @return list<array{name: string, contents: mixed, filename?: string, headers?: array<string, string>}>
     */
    public static function tenchatAdvertisementCreateRequestToMultipart(
        V1TenchatAdvertisementsCreateRequest $request,
    ): array {
        $multipart = [];

        foreach (self::tenchatAdvertisementCreateRequestToArray($request) as $key => $value) {
            self::appendMultipartField($multipart, $key, $value);
        }

        if (!is_resource($request->banner) || get_resource_type($request->banner) !== 'stream') {
            throw new BaseException('banner должен содержать только stream resource');
        }

        $multipart[] = [
            'name'     => 'banner',
            'contents' => $request->banner,
        ];

        return $multipart;
    }

    /**
     * @param array<string, mixed> $response
     */
    public static function tenchatAdvertisementCreateFromPayload(array $response): V1TenchatAdvertisementsCreateResponse
    {
        return new V1TenchatAdvertisementsCreateResponse(
            advertisementId: $response['advertisementId'],
            name: $response['name'],
            erid: $response['erid'],
            targetUrl: $response['targetUrl'],
            displayNumberPerUser: $response['displayNumberPerUser'],
            slotId: $response['slotId'],
            ageLimitKey: $response['ageLimitKey'],
            status: AdvertiseStatus::from($response['status']),
            pictureUrl: $response['pictureUrl'] ?? null,
            comment: $response['comment'] ?? null,
        );
    }

    /**
     * @return array<string, mixed>
     */
    public static function tenchatAdvertisementStatisticsRequestToArray(
        V1TenchatAdvertisementsStatisticsRequest $request,
    ): array {
        return [
            'advertisementId' => $request->advertisementId,
            'dateFrom'        => self::dateToPayload($request->dateFrom),
            'dateTo'          => self::dateToPayload($request->dateTo),
        ];
    }

    /**
     * @param list<array<string, mixed>> $response
     * @return list<V1TenchatAdvertisementsStatisticsResponse>
     */
    public static function tenchatAdvertisementStatisticsFromPayload(array $response): array
    {
        return array_map(
            static fn(array $item
            ): V1TenchatAdvertisementsStatisticsResponse => self::tenchatAdvertisementStatisticsResponseFromPayload($item),
            $response,
        );
    }

    /**
     * @return array<string, mixed>
     */
    public static function tenchatSpendsListUnallocatedRequestToArray(
        V1TenchatSpendsListUnallocatedRequest $request,
    ): array {
        $data = [];

        if ($request->advertisementId !== null) {
            $data['advertisementId'] = $request->advertisementId;
        }

        if ($request->dateFrom !== null) {
            $data['dateFrom'] = self::dateToPayload($request->dateFrom);
        }

        if ($request->dateTo !== null) {
            $data['dateTo'] = self::dateToPayload($request->dateTo);
        }

        return $data;
    }

    /**
     * @param list<array<string, mixed>> $response
     * @return list<V1TenchatSpendsListUnallocatedResponse>
     */
    public static function tenchatSpendsListUnallocatedFromPayload(array $response): array
    {
        return array_map(
            static fn(array $item
            ): V1TenchatSpendsListUnallocatedResponse => self::tenchatSpendsListUnallocatedResponseFromPayload($item),
            $response,
        );
    }

    /**
     * @return array<string, mixed>
     */
    public static function tenchatSpendsAllocateRequestToArray(V1TenchatSpendsAllocateRequest $request): array
    {
        return [
            'spendId' => $request->spendId,
            'actId'   => $request->actId,
        ];
    }

    /**
     * @return list<V1TenchatSpendsAllocateResponse>
     */
    public static function tenchatSpendsAllocateFromPayload(array $response): array
    {
        return array_map(
            static fn(array $item): V1TenchatSpendsAllocateResponse => new V1TenchatSpendsAllocateResponse(
                spendId: $item['spendId'],
                allocated: $item['allocated'],
            ),
            $response,
        );
    }

    /**
     * @param array<string, mixed> $response
     */
    public static function actsGetFromPayload(array $response): V1ActsGetResponse
    {
        return new V1ActsGetResponse(
            actId: $response['actId'],
            contractId: $response['contractId'],
            periodStart: self::dateFromPayload($response['periodStart']),
            periodEnd: self::dateFromPayload($response['periodEnd']),
            issueDate: self::dateFromPayload($response['issueDate']),
            amountWithVat: $response['amountWithVat'],
            amountWithoutVat: $response['amountWithoutVat'],
            vatRate: $response['vatRate'],
            customerRole: CustomerRole::from($response['customerRole']),
            executorRole: ExecutorRole::from($response['executorRole']),
            actNumber: $response['actNumber'] ?? null,
            vatAmount: $response['vatAmount'] ?? null,
        );
    }

    /**
     * @return array<string, mixed>
     */
    public static function actsCreateRequestToArray(V1ActsCreateRequest $request): array
    {
        $data = [
            'contractId'       => $request->contractId,
            'customerRole'     => $request->customerRole->value,
            'executorRole'     => $request->executorRole->value,
            'amountWithVat'    => $request->amountWithVat,
            'amountWithoutVat' => $request->amountWithoutVat,
            'vatRate'          => $request->vatRate,
            'periodStart'      => self::dateToPayload($request->periodStart),
            'periodEnd'        => self::dateToPayload($request->periodEnd),
            'issueDate'        => self::dateToPayload($request->issueDate),
        ];

        self::setOptionalString($data, 'actNumber', $request->actNumber);

        if ($request->vatAmount !== null) {
            $data['vatAmount'] = $request->vatAmount;
        }

        return $data;
    }

    /**
     * @param array<string, mixed> $response
     */
    public static function actsCreateFromPayload(array $response): V1ActsCreateResponse
    {
        return new V1ActsCreateResponse(
            actId: $response['actId'],
            actNumber: $response['actNumber'] ?? null,
        );
    }

    /**
     * @param list<array<string, mixed>> $multipart
     */
    private static function appendMultipartField(array &$multipart, string $key, mixed $value): void
    {
        if (is_array($value)) {
            foreach ($value as $index => $item) {
                if (is_array($item)) {
                    foreach ($item as $subKey => $subValue) {
                        $multipart[] = [
                            'name'     => $key . '[' . $index . '][' . $subKey . ']',
                            'contents' => self::multipartScalar($subValue),
                        ];
                    }

                    continue;
                }

                $multipart[] = [
                    'name'     => $key . '[' . $index . ']',
                    'contents' => self::multipartScalar($item),
                ];
            }

            return;
        }

        $multipart[] = [
            'name'     => $key,
            'contents' => self::multipartScalar($value),
        ];
    }

    /**
     * @return array{field: string, direction: string}
     */
    private static function sortDtoToArray(SortDto $sort): array
    {
        return [
            'field'     => $sort->field,
            'direction' => strtolower($sort->direction),
        ];
    }

    /**
     * @return array{page: int, count: int}
     */
    private static function paginationDtoToArray(PaginationDto $paginate): array
    {
        return [
            'page'  => $paginate->page,
            'count' => $paginate->count,
        ];
    }

    /**
     * @return array{from?: int, to?: int}
     */
    private static function audienceAgeIntervalDtoToArray(CreativeAudienceAgeIntervalDto $interval): array
    {
        $data = [];

        if ($interval->from !== null) {
            $data['from'] = $interval->from;
        }

        if ($interval->to !== null) {
            $data['to'] = $interval->to;
        }

        return $data;
    }

    /**
     * @param array<string, mixed> $response
     */
    private static function contragentsListResponseFromPayload(array $response): V1ContragentsListResponse
    {
        return new V1ContragentsListResponse(
            contragentId: $response['contragentId'],
            type: ContragentType::from($response['type']),
            roles: self::contragentRolesFromPayload($response['roles']),
            name: $response['name'] ?? null,
            fullName: $response['fullName'] ?? null,
            inn: $response['inn'] ?? null,
            kpp: $response['kpp'] ?? null,
            phone: $response['phone'] ?? null,
            urlAdvertisingNetwork: $response['urlAdvertisingNetwork'] ?? null,
            country: $response['country'] ?? null,
            walletNumber: $response['walletNumber'] ?? null,
            foreignInn: $response['foreignInn'] ?? null,
            registrationNumber: $response['registrationNumber'] ?? null,
        );
    }

    /**
     * @param array<string, mixed> $response
     */
    private static function contractsListResponseFromPayload(array $response): V1ContractsListResponse
    {
        return new V1ContractsListResponse(
            contractId: $response['contractId'],
            customerId: $response['customerId'],
            executorId: $response['executorId'],
            contractType: ContractType::from($response['contractType']),
            dateStart: self::dateFromPayload($response['dateStart']),
            subject: Subject::from($response['subject']),
            executorKeepsCreativeRecords: $response['executorKeepsCreativeRecords'],
            contractNumber: $response['contractNumber'] ?? null,
            dateEnd: isset($response['dateEnd']) ? self::dateFromPayload($response['dateEnd']) : null,
            amount: $response['amount'] ?? null,
        );
    }

    /**
     * @param array<string, mixed> $response
     */
    private static function tenchatCampaignResponseFromPayload(array $response): V1TenchatCampaignsCreateResponse
    {
        return new V1TenchatCampaignsCreateResponse(
            campaignId: $response['campaignId'],
            ogrn: $response['ogrn'],
            name: $response['name'],
            startDate: self::dateFromPayload($response['startDate']),
            endDate: self::dateFromPayload($response['endDate']),
            budget: $response['budget'],
            cpm: $response['cpm'],
            displayNumber: $response['displayNumber'],
            cities: $response['cities'],
            status: AdvertiseStatus::from($response['status']),
            comment: $response['comment'] ?? null,
        );
    }

    /**
     * @param array<string, mixed> $response
     */
    private static function tenchatSlotsListResponseFromPayload(array $response): V1TenchatSlotsListResponse
    {
        return new V1TenchatSlotsListResponse(
            name: $response['name'],
            slotId: $response['slotId'] ?? null,
            width: $response['width'] ?? null,
            height: $response['height'] ?? null,
            status: isset($response['status']) ? SlotStatus::from($response['status']) : null,
            places: $response['places'] ?? null,
        );
    }

    /**
     * @param array<string, mixed> $response
     */
    private static function tenchatAgeLimitsListResponseFromPayload(array $response): V1TenchatAgeLimitsListResponse
    {
        return new V1TenchatAgeLimitsListResponse(
            dictionaryKey: $response['dictionaryKey'],
            value: $response['value'],
        );
    }

    /**
     * @param array<string, mixed> $response
     */
    private static function kktuCodesListResponseFromPayload(array $response): V1KktuCodesListResponse
    {
        return new V1KktuCodesListResponse(
            code: $response['code'],
            name: $response['name'],
        );
    }

    /**
     * @param array<string, mixed> $response
     */
    private static function oksmListResponseFromPayload(array $response): V1OksmListResponse
    {
        return new V1OksmListResponse(
            code: $response['code'],
            alpha3: $response['alpha3'],
            name: $response['name'],
        );
    }

    /**
     * @param array<string, mixed> $response
     */
    private static function tenchatAdvertisementStatisticsResponseFromPayload(
        array $response,
    ): V1TenchatAdvertisementsStatisticsResponse {
        return new V1TenchatAdvertisementsStatisticsResponse(
            date: self::dateFromPayload($response['date']),
            viewsCount: $response['viewsCount'],
            clicksCount: $response['clicksCount'],
            ctr: $response['ctr'],
            cpm: $response['cpm'],
            periodCost: $response['periodCost'],
        );
    }

    /**
     * @param array<string, mixed> $response
     */
    private static function tenchatSpendsListUnallocatedResponseFromPayload(
        array $response,
    ): V1TenchatSpendsListUnallocatedResponse {
        return new V1TenchatSpendsListUnallocatedResponse(
            spendId: $response['spendId'],
            advertisementId: $response['advertisementId'],
            dateFrom: self::dateFromPayload($response['dateFrom']),
            dateTo: self::dateFromPayload($response['dateTo']),
            viewsCount: $response['viewsCount'],
            ctr: $response['ctr'],
            cpm: $response['cpm'],
            periodCost: $response['periodCost'],
            isFinished: $response['isFinished'],
            clicksCount: $response['clicksCount'] ?? null,
        );
    }

    /**
     * @param list<ContragentRole> $roles
     * @return list<string>
     */
    private static function contragentRolesToArray(array $roles): array
    {
        return array_map(static fn(ContragentRole $role): string => $role->value, $roles);
    }

    /**
     * @param list<string> $roles
     * @return list<ContragentRole>
     */
    private static function contragentRolesFromPayload(array $roles): array
    {
        return array_map(static fn(mixed $role): ContragentRole => ContragentRole::from($role), $roles);
    }

    /**
     * @param array<string, mixed> $data
     */
    private static function setOptionalString(array &$data, string $key, ?string $value): void
    {
        if ($value !== null) {
            $data[$key] = $value;
        }
    }

    private static function dateFromPayload(string $value): DateTimeImmutable
    {
        return new DateTimeImmutable($value);
    }

    private static function dateToPayload(DateTimeImmutable $value): string
    {
        return $value->format('Y-m-d');
    }

    private static function multipartScalar(mixed $value): string
    {
        if (is_bool($value)) {
            return $value ? '1' : '0';
        }

        return (string) $value;
    }

}
