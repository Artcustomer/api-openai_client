<?php

namespace Artcustomer\OpenAIClient\Enum;

/**
 * @author David
 */
class Model
{

    public const ADA = 'ada';
    public const BABBAGE = 'babbage';
    public const BABBAGE_002 = 'babbage-002';
    public const CURIE = 'curie';
    public const DAVINCI = 'davinci';
    public const DAVINCI_002 = 'davinci-002';
    public const GPT_3_5_TURBO = 'gpt-3.5-turbo';
    public const GPT_3_5_TURBO_0613 = 'gpt-3.5-turbo-0613';
    public const GPT_3_5_TURBO_1106 = 'gpt-3.5-turbo-1106';
    public const GPT_3_5_TURBO_16K = 'gpt-3.5-turbo-16k';
    public const GPT_3_5_TURBO_16K_0613 = 'gpt-3.5-turbo-16k-0613';
    public const GPT_4 = 'gpt-4';
    public const GPT_4_0613 = 'gpt-4-0613';
    public const GPT_4_32K = 'gpt-4-32k';
    public const GPT_4_32K_0613 = 'gpt-4-32k-0613';
    public const WHISPER_1 = 'whisper-1';
    public const TEXT_EMBEDDING_ADA_002 = 'text-embedding-ada-002';
    public const TEXT_MODERATION_LATEST = 'text-moderation-latest';
    public const TEXT_MODERATION_STABLE = 'text-moderation-stable';
    public const TTS_1 = 'tts-1';
    public const TTS_1_HD = 'tts-1-hd';

    /**
     * Get models for chat completions
     */
    public static function chatCompletions(): array
    {
        return [
            self::GPT_4,
            self::GPT_4_0613,
            self::GPT_4_32K,
            self::GPT_4_32K_0613,
            self::GPT_3_5_TURBO,
            self::GPT_3_5_TURBO_0613,
            self::GPT_3_5_TURBO_16K,
            self::GPT_3_5_TURBO_16K_0613
        ];
    }

    /**
     * Get models for audio transcriptions
     */
    public static function audioTranscriptions(): array
    {
        return [
            self::WHISPER_1
        ];
    }

    /**
     * Get models for audio translations
     */
    public static function audioTranslations(): array
    {
        return [
            self::WHISPER_1
        ];
    }

    /**
     * Get models for text to speech
     */
    public static function textToSpeech(): array
    {
        return [
            self::TTS_1,
            self::TTS_1_HD
        ];
    }

    /**
     * Get models for fine-tuning
     */
    public static function fineTuning(): array
    {
        return [
            self::GPT_3_5_TURBO,
            self::GPT_3_5_TURBO_0613,
            self::GPT_3_5_TURBO_1106,
            self::GPT_4_0613,
            self::BABBAGE_002,
            self::DAVINCI_002
        ];
    }

    /**
     * Get models for embeddings
     */
    public static function embeddings(): array
    {
        return [
            self::TEXT_EMBEDDING_ADA_002
        ];
    }

    /**
     * Get models for moderations
     */
    public static function moderations(): array
    {
        return [
            self::TEXT_MODERATION_STABLE,
            self::TEXT_MODERATION_LATEST
        ];
    }
}
