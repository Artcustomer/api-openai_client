<?php

namespace Artcustomer\OpenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\OpenAIClient\Http\UserRequest;

/**
 * @author David
 */
class UserConnector extends AbstractConnector
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
     * Lists all of the users in the organization
     *
     * @return IApiResponse
     */
    public function list(): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET
        ];
        $request = $this->client->getRequestFactory()->instantiate(UserRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Retrieves a user by their identifier
     *
     * @param string $userId
     * @return IApiResponse
     */
    public function get(string $userId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => $userId
        ];
        $request = $this->client->getRequestFactory()->instantiate(UserRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Modifies a user's role in the organization
     *
     * @param string $userId
     * @param array $params
     * @return IApiResponse
     */
    public function update(string $userId, array $params): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => $userId,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(UserRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }

    /**
     * Deletes a user from the organization
     *
     * @param string $userId
     * @return IApiResponse
     */
    public function delete(string $userId): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::DELETE,
            'endpoint' => $userId
        ];
        $request = $this->client->getRequestFactory()->instantiate(UserRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
