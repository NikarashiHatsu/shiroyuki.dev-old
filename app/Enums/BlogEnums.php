<?php

namespace App\Enums;

enum BlogEnums
{
    case DRAFT;
    case PUBLISHED;
    case ARCHIVED;
    case PRIVATE;
}