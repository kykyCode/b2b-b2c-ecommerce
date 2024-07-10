<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case DONE = 'done';
}
