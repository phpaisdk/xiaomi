<?php

declare(strict_types=1);

namespace AiSdk\Xiaomi;

use AiSdk\Contracts\BaseProvider;
use AiSdk\Contracts\TextModelInterface;
use AiSdk\Contracts\TextProviderInterface;
use AiSdk\Xiaomi\Models\XiaomiTextModel;

final class XiaomiProvider extends BaseProvider implements TextProviderInterface
{
    public function __construct(public readonly XiaomiOptions $options) {}
    public function name(): string
    {
        return XiaomiOptions::PROVIDER_NAME;
    }
    protected function textModel(string $modelId): TextModelInterface
    {
        return new XiaomiTextModel($modelId, $this->options);
    }
}
