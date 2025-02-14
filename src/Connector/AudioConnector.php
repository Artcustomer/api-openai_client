<?php

namespace Artcustomer\OpenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\OpenAIClient\Http\AudioRequest;
use Artcustomer\OpenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class AudioConnector extends AbstractConnector
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
     * Transcribes audio into the input language
     *
     * @param array $params
     * @return IApiResponse
     */
    public function createTranscription(array $params): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => ApiEndpoints::TRANSCRIPTIONS,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(AudioRequest::class, [$data, true]);

        return $this->client->executeRequest($request);
    }

    /**
     * Translates audio into English
     *
     * @param array $params
     * @return IApiResponse
     */
    public function createTranslation(array $params): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => ApiEndpoints::TRANSLATIONS,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(AudioRequest::class, [$data, true]);

        return $this->client->executeRequest($request);
    }

    /**
     * Generates audio from the input text.
     *
     * @param array $params
     * @return IApiResponse
     */
    public function createSpeech(array $params): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => ApiEndpoints::SPEECH,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(AudioRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
