<?php

namespace App\Enums;

enum MessageTypeEnum: string
{
    case USER = 'user';
    case BOT = 'bot';
    case TOOL = 'tool';
}
