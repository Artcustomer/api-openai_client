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
    public const CHATGPT_4O_LATEST = 'chatgpt-4o-latest';
    public const CURIE = 'curie';
    public const DALL_E_2 = 'dall-e-2';
    public const DALL_E_3 = 'dall-e-3';
    public const DAVINCI = 'davinci';
    public const DAVINCI_002 = 'davinci-002';
    public const GPT_3_5_TURBO = 'gpt-3.5-turbo';
    public const GPT_3_5_TURBO_INSCTRUCT = 'gpt-3.5-turbo-instruct';
    public const GPT_3_5_TURBO_INSCTRUCT_0914 = 'gpt-3.5-turbo-instruct-0914';
    public const GPT_3_5_TURBO_0125 = 'gpt-3.5-turbo-0125';
    public const GPT_3_5_TURBO_0613 = 'gpt-3.5-turbo-0613';
    public const GPT_3_5_TURBO_1106 = 'gpt-3.5-turbo-1106';
    public const GPT_3_5_TURBO_16K = 'gpt-3.5-turbo-16k';
    public const GPT_3_5_TURBO_16K_0613 = 'gpt-3.5-turbo-16k-0613';
    public const GPT_4 = 'gpt-4';
    public const GPT_4_0125_PREVIEW = 'gpt-4-0125-preview';
    public const GPT_4_1106_PREVIEW = 'gpt-4-1106-preview';
    public const GPT_4_0613 = 'gpt-4-0613';
    public const GPT_4_32K = 'gpt-4-32k';
    public const GPT_4_32K_0613 = 'gpt-4-32k-0613';
    public const GPT_4_TURBO = 'gpt-4-turbo';
    public const GPT_4_TURBO_PREVIEW = 'gpt-4-turbo-preview';
    public const GPT_4_TURBO_2024_04_09 = 'gpt-4-turbo-2024-04-09';
    public const GPT_4O = 'gpt-4o';
    public const GPT_4O_2024_05_13 = 'gpt-4o-2024-05-13';
    public const GPT_4O_2024_08_06 = 'gpt-4o-2024-08-06';
    public const GPT_4_O_AUDIO_PREVIEW = 'gpt-4o-audio-preview';
    public const GPT_4_O_AUDIO_PREVIEW_2024_12_17 = 'gpt-4o-audio-preview-2024-12-17';
    public const GPT_4O_MINI = 'gpt-4o-mini';
    public const GPT_4O_MINI_2024_07_18 = 'gpt-4o-mini-2024-07-18';
    public const GPT_4O_MINI_AUDIO_PREVIEW = 'gpt-4o-mini-audio-preview';
    public const GPT_4O_MINI_AUDIO_PREVIEW_2024_12_17 = 'gpt-4o-mini-audio-preview-2024-12-17';
    public const GPT_4O_MINI_REALTIME_PREVIEW_2024_12_17 = 'gpt-4o-mini-realtime-preview-2024-12-17';
    public const GPT_4O_REALTIME_PREVIEW = 'gpt-4o-realtime-preview';
    public const GPT_4O_REALTIME_PREVIEW_2024_10_01 = 'gpt-4o-realtime-preview-2024-10-01';
    public const GPT_4O_REALTIME_PREVIEW_2024_12_17 = 'gpt-4o-realtime-preview-2024-12-17';
    public const GPT_4O_SEARCH_PREVIEW = 'gpt-4o-search-preview';
    public const GPT_4O_SEARCH_PREVIEW_2025_03_11 = 'gpt-4o-search-preview-2025-03-11';
    public const GPT_IMAGE_1 = 'gpt-image-1';
    public const O1 = 'o1';
    public const O1_2024_12_17 = 'o1-2024-12-17';
    public const O1_MINI = 'o1-mini';
    public const O1_MINI_2024_09_12 = 'o1-mini-2024-09-12';
    public const O1_PRO = 'o1-pro';
    public const O1_PRO_2025_03_19 = 'o1-pro-2025-03-19';
    public const O3_MINI = 'o3-mini';
    public const O3_MINI_2025_01_31 = 'o3-mini-2025-01-31';
    public const ONMI_MODERATION_2024_09_26 = 'omni-moderation-2024-09-26';
    public const ONMI_MODERATION_LASTEST = 'omni-moderation-latest';
    public const TEXT_EMBEDDING_3_LARGE = 'text-embedding-3-large';
    public const TEXT_EMBEDDING_3_SMALL = 'text-embedding-3-small';
    public const TEXT_EMBEDDING_ADA_002 = 'text-embedding-ada-002';
    public const TEXT_MODERATION_LATEST = 'text-moderation-latest';
    public const TEXT_MODERATION_STABLE = 'text-moderation-stable';
    public const TTS_1 = 'tts-1';
    public const TTS_1_1106 = 'tts-1-1106';
    public const TTS_1_HD = 'tts-1-hd';
    public const TTS_1_HD_1106 = 'tts-1-hd-1106';
    public const WHISPER_1 = 'whisper-1';

    /**
     * Get models for chat completions
     */
    public static function chatCompletions(): array
    {
        return [
            self::CHATGPT_4O_LATEST,
            self::GPT_4O,
            self::GPT_4O_2024_05_13,
            self::GPT_4O_2024_08_06,
            self::GPT_4O_MINI,
            self::GPT_4O_MINI_2024_07_18,
            self::GPT_3_5_TURBO,
            self::GPT_3_5_TURBO_INSCTRUCT,
            self::GPT_3_5_TURBO_INSCTRUCT_0914,
            self::GPT_3_5_TURBO_0125,
            self::GPT_3_5_TURBO_0613,
            self::GPT_3_5_TURBO_1106,
            self::GPT_3_5_TURBO_16K,
            self::GPT_3_5_TURBO_16K_0613,
            self::GPT_4,
            self::GPT_4_0125_PREVIEW,
            self::GPT_4_1106_PREVIEW,
            self::GPT_4_0613,
            self::GPT_4_32K,
            self::GPT_4_32K_0613,
            self::GPT_4_TURBO,
            self::GPT_4_TURBO_PREVIEW,
            self::GPT_4_TURBO_2024_04_09
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
            self::GPT_4O,
            self::GPT_4O_MINI,
            self::GPT_3_5_TURBO,
            self::GPT_4
        ];
    }

    /**
     * Get models for embeddings
     */
    public static function embeddings(): array
    {
        return [
            self::TEXT_EMBEDDING_3_LARGE,
            self::TEXT_EMBEDDING_3_SMALL,
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

    /**
     * Get models for images generations
     */
    public static function imagesGenerations(): array
    {
        return [
            self::DALL_E_2,
            self::DALL_E_3,
            self::GPT_IMAGE_1
        ];
    }

    /**
     * Get models for images generations
     */
    public static function assistants(): array
    {
        return [
            self::GPT_4O,
            self::GPT_4O_2024_05_13,
            self::GPT_4O_2024_08_06,
            self::GPT_4O_MINI,
            self::GPT_4O_MINI_2024_07_18,
            self::GPT_3_5_TURBO,
            self::GPT_3_5_TURBO_INSCTRUCT,
            self::GPT_3_5_TURBO_INSCTRUCT_0914,
            self::GPT_3_5_TURBO_0125,
            self::GPT_3_5_TURBO_0613,
            self::GPT_3_5_TURBO_1106,
            self::GPT_3_5_TURBO_16K,
            self::GPT_3_5_TURBO_16K_0613,
            self::GPT_4,
            self::GPT_4_0125_PREVIEW,
            self::GPT_4_1106_PREVIEW,
            self::GPT_4_0613,
            self::GPT_4_32K,
            self::GPT_4_32K_0613,
            self::GPT_4_TURBO,
            self::GPT_4_TURBO_PREVIEW,
            self::GPT_4_TURBO_2024_04_09
        ];
    }

    /**
     * Get models for realtime
     *
     * @return string[]
     */
    public static function realtime(): array
    {
        return [
            self::GPT_4O_REALTIME_PREVIEW,
            self::GPT_4O_REALTIME_PREVIEW_2024_10_01
        ];
    }
}
