<?php

namespace Artcustomer\OpenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\OpenAIClient\Http\AdministrationRequest;
use Artcustomer\OpenAIClient\Http\UsageRequest;
use Artcustomer\OpenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class UsageConnector extends AbstractConnector
{

    /**
     * Constructor
     *
     * @param AbstractApiClient $client
     */
    public function __construct(AbstractApiClient $client)
    {
        parent::__construct($client, false);
    }

    /**
     * Get completions usage
     *
     * @param \DateTime $dateTime
     * @param int $limit
     * @return IApiResponse
     */
    public function getCompletions(\DateTime $dateTime, int $limit = 1): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => ApiEndpoints::COMPLETIONS,
            'query' => [
                'start_time' => $dateTime->getTimestamp(),
                'limit' => $limit
            ]
        ];
        $request = $this->client->getRequestFactory()->instantiate(UsageRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Get embeddings usage
     *
     * @param \DateTime $dateTime
     * @param int $limit
     * @return IApiResponse
     */
    public function getEmbeddings(\DateTime $dateTime, int $limit = 1): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => ApiEndpoints::EMBEDDINGS,
            'query' => [
                'start_time' => $dateTime->getTimestamp(),
                'limit' => $limit
            ]
        ];
        $request = $this->client->getRequestFactory()->instantiate(UsageRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Get moderations usage
     *
     * @param \DateTime $dateTime
     * @param int $limit
     * @return IApiResponse
     */
    public function getModerations(\DateTime $dateTime, int $limit = 1): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => ApiEndpoints::MODERATIONS,
            'query' => [
                'start_time' => $dateTime->getTimestamp(),
                'limit' => $limit
            ]
        ];
        $request = $this->client->getRequestFactory()->instantiate(UsageRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Get images usage
     *
     * @param \DateTime $dateTime
     * @param int $limit
     * @return IApiResponse
     */
    public function getImages(\DateTime $dateTime, int $limit = 1): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => ApiEndpoints::IMAGES,
            'query' => [
                'start_time' => $dateTime->getTimestamp(),
                'limit' => $limit
            ]
        ];
        $request = $this->client->getRequestFactory()->instantiate(UsageRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Get costs
     *
     * @param \DateTime $dateTime
     * @param int $limit
     * @return IApiResponse
     */
    public function getCosts(\DateTime $dateTime, int $limit = 7): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => ApiEndpoints::COSTS,
            'query' => [
                'start_time' => $dateTime->getTimestamp(),
                'limit' => $limit
            ]
        ];
        $request = $this->client->getRequestFactory()->instantiate(AdministrationRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
