<?php

namespace App\Enums;

abstract class ParametricEnum
{
    const MENU_CATEGORIES = [
        'AREA' => 1,
        'ISLAND' => 2,
        'GAME' => 3,
        'HOME' => 4,
        'MINIGAME' => 5,
    ];
    const SCENERY_TYPES = [
        'PRIVATE' => 127,
        'PUBLIC' => 128,
        'MGAME' => 129,
    ];
    const PRIVATE_SCENERY_MENU_CATEGORIES = [
        self::MENU_CATEGORIES['ISLAND'],
        self::MENU_CATEGORIES['HOME'],
        self::MENU_CATEGORIES['MINIGAME'],
    ];
    const PUBLIC_SCENERY_MENU_CATEGORIES = [
        self::MENU_CATEGORIES['AREA'],
        self::MENU_CATEGORIES['GAME'],
    ];
}
