<?php

namespace Artcustomer\OpenAIClient;

use Artcustomer\ApiUnit\Gateway\AbstractApiGateway;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\OpenAIClient\Client\ApiClient;
use Artcustomer\OpenAIClient\Connector\AudioConnector;
use Artcustomer\OpenAIClient\Connector\ChatConnector;
use Artcustomer\OpenAIClient\Connector\CompletionConnector;
use Artcustomer\OpenAIClient\Connector\EditConnector;
use Artcustomer\OpenAIClient\Connector\EmbeddingConnector;
use Artcustomer\OpenAIClient\Connector\EngineConnector;
use Artcustomer\OpenAIClient\Connector\FileConnector;
use Artcustomer\OpenAIClient\Connector\FineTuneConnector;
use Artcustomer\OpenAIClient\Connector\ImageConnector;
use Artcustomer\OpenAIClient\Connector\ModelConnector;
use Artcustomer\OpenAIClient\Connector\ModerationConnector;
use Artcustomer\OpenAIClient\Connector\UsageConnector;
use Artcustomer\OpenAIClient\Utils\ApiInfos;

/**
 * @author David
 */
class OpenAIApiGateway extends AbstractApiGateway
{

    private AudioConnector $audioConnector;
    private ChatConnector $chatConnector;
    private CompletionConnector $completionConnector;
    private EditConnector $editConnector;
    private EmbeddingConnector $embeddingConnector;
    private EngineConnector $engineConnector;
    private FileConnector $fileConnector;
    private FineTuneConnector $fineTuneConnector;
    private ImageConnector $imageConnector;
    private ModelConnector $modelConnector;
    private ModerationConnector $moderationConnector;
    private UsageConnector $usageConnector;

    private string $apiKey;
    private string $organisation;
    private bool $availability;

    /**
     * Constructor
     *
     * @param string $apiKey
     * @param string $organisation
     * @param bool $availability
     * @throws \ReflectionException
     */
    public function __construct(string $apiKey, string $organisation, bool $availability)
    {
        $this->apiKey = $apiKey;
        $this->organisation = $organisation;
        $this->availability = $availability;

        $this->defineParams();

        parent::__construct(ApiClient::class, [$this->params]);
    }

    /**
     * Initialize
     *
     * @return void
     */
    public function initialize(): void
    {
        $this->setupConnectors();

        $this->client->initialize();
    }

    /**
     * Test API
     *
     * @return IApiResponse
     */
    public function test(): IApiResponse
    {
        return $this->modelConnector->list();
    }

    /**
     * Get ModelConnector instance
     *
     * @return ModelConnector
     */
    public function getModelConnector(): ModelConnector
    {
        return $this->modelConnector;
    }

    /**
     * Get CompletionConnector instance
     *
     * @return CompletionConnector
     */
    public function getCompletionConnector(): CompletionConnector
    {
        return $this->completionConnector;
    }

    /**
     * Get ChatConnector instance
     *
     * @return ChatConnector
     */
    public function getChatConnector(): ChatConnector
    {
        return $this->chatConnector;
    }

    /**
     * Get EditConnector instance
     *
     * @return EditConnector
     */
    public function getEditConnector(): EditConnector
    {
        return $this->editConnector;
    }

    /**
     * Get ImageConnector instance
     *
     * @return ImageConnector
     */
    public function getImageConnector(): ImageConnector
    {
        return $this->imageConnector;
    }

    /**
     * Get EmbeddingConnector instance
     *
     * @return EmbeddingConnector
     */
    public function getEmbeddingConnector(): EmbeddingConnector
    {
        return $this->embeddingConnector;
    }

    /**
     * Get AudioConnector instance
     *
     * @return AudioConnector
     */
    public function getAudioConnector(): AudioConnector
    {
        return $this->audioConnector;
    }

    /**
     * Get FileConnector instance
     *
     * @return FileConnector
     */
    public function getFileConnector(): FileConnector
    {
        return $this->fileConnector;
    }

    /**
     * Get FineTuneConnector instance
     *
     * @return FineTuneConnector
     */
    public function getFineTuneConnector(): FineTuneConnector
    {
        return $this->fineTuneConnector;
    }

    /**
     * Get ModerationConnector instance
     *
     * @return ModerationConnector
     */
    public function getModerationConnector(): ModerationConnector
    {
        return $this->moderationConnector;
    }

    /**
     * Get EngineConnector instance
     *
     * @return EngineConnector
     */
    public function getEngineConnector(): EngineConnector
    {
        return $this->engineConnector;
    }

    /**
     * Get UsageConnector instance
     *
     * @return UsageConnector
     */
    public function getUsageConnector(): UsageConnector
    {
        return $this->usageConnector;
    }

    /**
     * Setup connectors
     *
     * @return void
     */
    private function setupConnectors(): void
    {
        $this->audioConnector = new AudioConnector($this->client);
        $this->chatConnector = new ChatConnector($this->client);
        $this->completionConnector = new CompletionConnector($this->client);
        $this->editConnector = new EditConnector($this->client);
        $this->embeddingConnector = new EmbeddingConnector($this->client);
        $this->engineConnector = new EngineConnector($this->client);
        $this->fileConnector = new FileConnector($this->client);
        $this->fineTuneConnector = new FineTuneConnector($this->client);
        $this->imageConnector = new ImageConnector($this->client);
        $this->modelConnector = new ModelConnector($this->client);
        $this->moderationConnector = new ModerationConnector($this->client);
        $this->usageConnector = new UsageConnector($this->client);
    }

    /**
     * Define parameters
     *
     * @return void
     */
    private function defineParams(): void
    {
        $this->params['api_name'] = ApiInfos::API_NAME;
        $this->params['api_version'] = ApiInfos::API_VERSION;
        $this->params['protocol'] = ApiInfos::PROTOCOL;
        $this->params['host'] = ApiInfos::HOST;
        $this->params['version'] = ApiInfos::VERSION;
        $this->params['api_key'] = $this->apiKey;
        $this->params['organisation'] = $this->organisation;
        $this->params['availability'] = $this->availability;
    }
}
