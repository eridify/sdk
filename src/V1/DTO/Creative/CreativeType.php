<?php

declare(strict_types = 1);

namespace Eridify\SDK\V1\DTO\Creative;

/**
 * Тип креатива.
 */
enum CreativeType: string
{

    case AUDIO_RECORDING = 'audio_recording';
    case BANNER = 'banner';
    case HTML5_BANNER = 'html5_banner';
    case AUDIO_LIVE_STREAM = 'audio_live_stream';
    case VIDEO_LIVE_STREAM = 'video_live_stream';
    case TEXT_BLOCK_WITH_AUDIO = 'text_block_with_audio';
    case TEXT_GRAPHIC_BLOCK_WITH_AUDIO_VIDEO = 'text_graphic_block_with_audio_video';
    case TEXT_BLOCK = 'text_block';
    case TEXT_GRAPHIC_BLOCK_WITH_AUDIO = 'text_graphic_block_with_audio';
    case TEXT_BLOCK_WITH_AUDIO_VIDEO = 'text_block_with_audio_video';
    case TEXT_GRAPHIC_BLOCK = 'text_graphic_block';
    case TEXT_GRAPHIC_BLOCK_WITH_VIDEO = 'text_graphic_block_with_video';
    case TEXT_BLOCK_WITH_VIDEO = 'text_block_with_video';
    case VIDEO_RECORDING = 'video_recording';

    public function title(): string
    {
        return match ($this) {
            self::AUDIO_RECORDING => 'аудиозапись',
            self::BANNER => 'баннер',
            self::HTML5_BANNER => 'HTML5-баннер',
            self::AUDIO_LIVE_STREAM => 'аудиотрансляция в прямом эфире',
            self::VIDEO_LIVE_STREAM => 'видеотрансляция в прямом эфире',
            self::TEXT_BLOCK_WITH_AUDIO => 'текстовый блок с аудио',
            self::TEXT_GRAPHIC_BLOCK_WITH_AUDIO_VIDEO => 'текстово-графический блок с аудио и видео',
            self::TEXT_BLOCK => 'текстовый блок',
            self::TEXT_GRAPHIC_BLOCK_WITH_AUDIO => 'текстово-графический блок с аудио',
            self::TEXT_BLOCK_WITH_AUDIO_VIDEO => 'текстовый блок с аудио и видео',
            self::TEXT_GRAPHIC_BLOCK => 'текстово-графический блок',
            self::TEXT_GRAPHIC_BLOCK_WITH_VIDEO => 'текстово-графический блок с видео',
            self::TEXT_BLOCK_WITH_VIDEO => 'текстовый блок с видео',
            self::VIDEO_RECORDING => 'видеоролик',
        };
    }

}
