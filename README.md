# PHP AI SDK — Xiaomi MiMo

Text generation, streaming, reasoning, and tool calling with Xiaomi MiMo. Part of the framework-agnostic [PHP AI SDK](https://phpaisdk.com).

## Installation

```bash
composer require aisdk/xiaomi
```

Set `XIAOMI_API_KEY` in your environment.

## Usage

```php
use AiSdk\Generate;
use AiSdk\Xiaomi;

$result = Generate::text('Explain closures in PHP in one sentence.')
    ->model(Xiaomi::model('mimo-v2.6-pro'))
    ->run();

echo $result->text;
```

## Documentation

[Read the documentation](https://phpaisdk.com/docs/0.x/providers/xiaomi) for configuration, supported features, and more examples.

[Contributing](https://github.com/phpaisdk/.github/blob/main/CONTRIBUTING.md) · [Support](https://github.com/phpaisdk/.github/blob/main/SUPPORT.md)

## License

The MIT License (MIT). See [LICENSE](LICENSE) for details.
