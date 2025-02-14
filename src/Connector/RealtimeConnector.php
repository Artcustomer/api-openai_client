<?php

namespace Artcustomer\OpenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\OpenAIClient\Http\RealtimeRequest;
use Artcustomer\OpenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class RealtimeConnector extends AbstractConnector
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
     * Create session
     *
     * @param array $params
     * @return IApiResponse
     */
    public function createSession(array $params): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => ApiEndpoints::SESSIONS,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(RealtimeRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
