<?php

declare(strict_types=1);

namespace AiSdk;

use AiSdk\Contracts\Model;
use AiSdk\Xiaomi\XiaomiOptions;
use AiSdk\Xiaomi\XiaomiProvider;

final class Xiaomi
{
    private static ?XiaomiProvider $default = null;
    /** @param array<string, mixed> $config */
    public static function create(array $config = []): XiaomiProvider
    {
        return self::$default = new XiaomiProvider(XiaomiOptions::fromArray($config));
    }
    public static function default(): XiaomiProvider
    {
        return self::$default ??= self::create();
    }
    public static function reset(): void
    {
        self::$default = null;
    }
    public static function model(string $modelId): Model
    {
        return self::default()->model($modelId);
    }
}
