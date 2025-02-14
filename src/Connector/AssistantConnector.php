<?php

namespace Artcustomer\OpenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\OpenAIClient\Http\AssistantRequest;

/**
 * @author David
 */
class AssistantConnector extends AbstractConnector
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
     * Returns a list of assistants
     *
     * @return IApiResponse
     */
    public function list(): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET
        ];
        $request = $this->client->getRequestFactory()->instantiate(AssistantRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Create an assistant with a model and instructions
     *
     * @param array $params
     * @return IApiResponse
     */
    public function create(array $params): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(AssistantRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Retrieves an assistant
     *
     * @param string $assistantId
     * @return IApiResponse
     */
    public function get(string $assistantId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => $assistantId
        ];
        $request = $this->client->getRequestFactory()->instantiate(AssistantRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Modifies an assistant
     *
     * @param string $assistantId
     * @param array $params
     * @return IApiResponse
     */
    public function update(string $assistantId, array $params): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => $assistantId,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(AssistantRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Delete an assistant
     *
     * @param string $assistantId
     * @return IApiResponse
     */
    public function delete(string $assistantId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::DELETE,
            'endpoint' => $assistantId
        ];
        $request = $this->client->getRequestFactory()->instantiate(AssistantRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
