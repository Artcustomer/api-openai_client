<?php

namespace Artcustomer\OpenAIClient;

use Artcustomer\ApiUnit\Gateway\AbstractApiGateway;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\OpenAIClient\Client\ApiClient;
use Artcustomer\OpenAIClient\Connector\AssistantConnector;
use Artcustomer\OpenAIClient\Connector\AudioConnector;
use Artcustomer\OpenAIClient\Connector\BatchConnector;
use Artcustomer\OpenAIClient\Connector\ChatConnector;
use Artcustomer\OpenAIClient\Connector\EmbeddingConnector;
use Artcustomer\OpenAIClient\Connector\EngineConnector;
use Artcustomer\OpenAIClient\Connector\FileConnector;
use Artcustomer\OpenAIClient\Connector\FineTuningConnector;
use Artcustomer\OpenAIClient\Connector\ImageConnector;
use Artcustomer\OpenAIClient\Connector\ModelConnector;
use Artcustomer\OpenAIClient\Connector\ModerationConnector;
use Artcustomer\OpenAIClient\Connector\RealtimeConnector;
use Artcustomer\OpenAIClient\Connector\ThreadConnector;
use Artcustomer\OpenAIClient\Connector\UsageConnector;
use Artcustomer\OpenAIClient\Utils\ApiInfos;

/**
 * @author David
 */
class OpenAIApiGateway extends AbstractApiGateway
{

    private AudioConnector $audioConnector;
    private AssistantConnector $assistantConnector;
    private BatchConnector $batchConnector;
    private ChatConnector $chatConnector;
    private EmbeddingConnector $embeddingConnector;
    private EngineConnector $engineConnector;
    private FileConnector $fileConnector;
    private FineTuningConnector $fineTuningConnector;
    private ImageConnector $imageConnector;
    private ModelConnector $modelConnector;
    private ModerationConnector $moderationConnector;
    private RealtimeConnector $realtimeConnector;
    private ThreadConnector $threadConnector;
    private UsageConnector $usageConnector;

    private string $apiKey;
    private string $adminApiKey;
    private string $organisation;
    private bool $availability;

    /**
     * Constructor
     *
     * @param string $apiKey
     * @param string $adminApiKey
     * @param string $organisation
     * @param bool $availability
     * @throws \ReflectionException
     */
    public function __construct(string $apiKey, string $adminApiKey = '', string $organisation = '', bool $availability = true)
    {
        $this->apiKey = $apiKey;
        $this->adminApiKey = $adminApiKey;
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
     * Get ChatConnector instance
     *
     * @return ChatConnector
     */
    public function getChatConnector(): ChatConnector
    {
        return $this->chatConnector;
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
     * Get FineTuningConnector instance
     *
     * @return FineTuningConnector
     */
    public function getFineTuningConnector(): FineTuningConnector
    {
        return $this->fineTuningConnector;
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
     * Get AssistantConnector instance
     *
     * @return AssistantConnector
     */
    public function getAssistantConnector(): AssistantConnector
    {
        return $this->assistantConnector;
    }

    /**
     * Get BatchConnector instance
     *
     * @return BatchConnector
     */
    public function getBatchConnector(): BatchConnector
    {
        return $this->batchConnector;
    }

    /**
     * Get RealtimeConnector instance
     *
     * @return RealtimeConnector
     */
    public function getRealtimeConnector(): RealtimeConnector
    {
        return $this->realtimeConnector;
    }

    /**
     * Get ThreadConnector instance
     *
     * @return ThreadConnector
     */
    public function getThreadConnector(): ThreadConnector
    {
        return $this->threadConnector;
    }

    /**
     * Setup connectors
     *
     * @return void
     */
    private function setupConnectors(): void
    {
        $this->audioConnector = new AudioConnector($this->client);
        $this->assistantConnector = new AssistantConnector($this->client);
        $this->batchConnector = new BatchConnector($this->client);
        $this->chatConnector = new ChatConnector($this->client);
        $this->embeddingConnector = new EmbeddingConnector($this->client);
        $this->engineConnector = new EngineConnector($this->client);
        $this->fileConnector = new FileConnector($this->client);
        $this->fineTuningConnector = new FineTuningConnector($this->client);
        $this->imageConnector = new ImageConnector($this->client);
        $this->modelConnector = new ModelConnector($this->client);
        $this->moderationConnector = new ModerationConnector($this->client);
        $this->realtimeConnector = new RealtimeConnector($this->client);
        $this->threadConnector = new ThreadConnector($this->client);
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
        $this->params['admin_api_key'] = $this->adminApiKey;
        $this->params['organisation'] = $this->organisation;
        $this->params['availability'] = $this->availability;
    }
}
