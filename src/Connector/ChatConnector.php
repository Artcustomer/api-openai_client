<?php

namespace Artcustomer\OpenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\OpenAIClient\Http\ChatRequest;
use Artcustomer\OpenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class ChatConnector extends AbstractConnector
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
     * Creates a completion for the chat message
     *
     * @param array $params
     * @return IApiResponse
     */
    public function createCompletion(array $params): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => ApiEndpoints::COMPLETIONS,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(ChatRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
