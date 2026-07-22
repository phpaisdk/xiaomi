# aisdk/xiaomi

<a href="https://github.com/phpaisdk/xiaomi/actions"><img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/phpaisdk/xiaomi/tests.yml?branch=main&label=Tests"></a>
<a href="https://packagist.org/packages/aisdk/xiaomi"><img alt="Latest Version" src="https://img.shields.io/packagist/v/aisdk/xiaomi"></a>
<a href="https://packagist.org/packages/aisdk/xiaomi"><img alt="License" src="https://img.shields.io/packagist/l/aisdk/xiaomi"></a>

------

Official Xiaomi provider for the PHP AI SDK. Uses Xiaomi MiMo's OpenAI-compatible API.

## Installation

```bash
composer require aisdk/xiaomi
```

## Basic Usage

```php
use AiSdk\Generate;
use AiSdk\Xiaomi;

Xiaomi::create(['apiKey' => $_ENV['XIAOMI_API_KEY']]);

$result = Generate::text('Explain this code briefly.')
    ->model(Xiaomi::model('mimo-v2.5'))
    ->run();
```

## Configuration

### Environment Variables

| Variable | Description | Default |
| --- | --- | --- |
| `XIAOMI_API_KEY` | API key for authentication | Required |
| `XIAOMI_BASE_URL` | Base URL for API requests | `https://api.xiaomimimo.com/v1` |

### Programmatic Configuration

```php
Xiaomi::create([
    'apiKey' => $_ENV['XIAOMI_API_KEY'],
    'baseUrl' => 'https://api.xiaomimimo.com/v1',
]);
```

## Supported Capabilities

| Capability | Support |
| --- | --- |
| Text generation and streaming | Native OpenAI-compatible chat |
| Tool calling, structured output, reasoning | Passed through for supported models |
| Image input | Passed through for compatible vision models |

## Provider Options

Use `providerOptions('xiaomi', ['raw' => [...]])` for documented MiMo chat-completions fields outside the portable SDK surface. Model IDs are opaque strings and are validated by Xiaomi.

## Documentation

- [Xiaomi MiMo API documentation](https://mimo.mi.com/docs/en-US/quick-start/summary/first-api-call)
- [PHP AI SDK documentation](https://phpaisdk.com/docs/xiaomi)
