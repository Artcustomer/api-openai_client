<?php

namespace Artcustomer\OpenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\OpenAIClient\Http\EngineRequest;

/**
 * @author David
 */
class EngineConnector extends AbstractConnector
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
     * Lists the currently available (non-finetuned) engines
     *
     * @return IApiResponse
     */
    public function list(): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET
        ];
        $request = $this->client->getRequestFactory()->instantiate(EngineRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Retrieves an engine instance
     */
    public function get(string $engineId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => $engineId
        ];
        $request = $this->client->getRequestFactory()->instantiate(EngineRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
