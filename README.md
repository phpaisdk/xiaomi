# Xiaomi provider for PHP AI SDK

```bash
composer require aisdk/xiaomi
```

```php
use AiSdk\Generate;
use AiSdk\Xiaomi;

Xiaomi::create(['apiKey' => $_ENV['XIAOMI_API_KEY']]);

$result = Generate::text('Explain this code briefly.')
    ->model(Xiaomi::model('mimo-v2.5'))
    ->run();
```

This package uses Xiaomi's official OpenAI-compatible API at `https://api.xiaomimimo.com/v1`. It supports text and streaming generation, tool calling, structured output, reasoning, and image input through the portable API. See [Xiaomi API documentation](https://mimo.mi.com/docs/en-US/quick-start/summary/first-api-call) and [PHP AI SDK documentation](https://phpaisdk.com/docs/xiaomi).
