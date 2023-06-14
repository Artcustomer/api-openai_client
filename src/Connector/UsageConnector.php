<?php

namespace Artcustomer\OpenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\OpenAIClient\Http\UsageRequest;

/**
 * @author David
 */
class UsageConnector extends AbstractConnector
{

    private const DATE_FORMAT = 'Y-m-d';

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
     * Get usage
     *
     * @param \DateTime $dateTime
     * @return IApiResponse
     */
    public function get(\DateTime $dateTime): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => '',
            'query' => [
                'date' => $dateTime->format(self::DATE_FORMAT)
            ]
        ];
        $request = $this->client->getRequestFactory()->instantiate(UsageRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
