<?php

declare(strict_types=1);
use AiSdk\Generate;
use AiSdk\Support\Sdk;
use AiSdk\Xiaomi;
use AiSdk\Xiaomi\Tests\Fakes\FakeHttpClient;
use Nyholm\Psr7\Factory\Psr17Factory;

afterEach(function (): void {
    Generate::reset();
    Xiaomi::reset();
});
it('uses Xiaomi general OpenAI-compatible chat completions', function (): void {
    $client = new FakeHttpClient(200, json_encode(['id' => 'xiaomi-chat', 'model' => 'mimo-v2.5', 'choices' => [['message' => ['content' => 'Hello from Xiaomi'], 'finish_reason' => 'stop']], 'usage' => ['prompt_tokens' => 3, 'completion_tokens' => 4]]));
    $factory = new Psr17Factory();
    Generate::configure(new Sdk($client, $factory, $factory));
    Xiaomi::create(['apiKey' => 'xiaomi-test']);
    $result = Generate::text('Hi')->model(Xiaomi::model('mimo-v2.5'))->run();
    expect($result->text)->toBe('Hello from Xiaomi')->and((string) $client->lastRequest?->getUri())->toBe('https://api.xiaomimimo.com/v1/chat/completions')->and($client->lastRequest?->getHeaderLine('Authorization'))->toBe('Bearer xiaomi-test')->and($client->sentBody()['model'])->toBe('mimo-v2.5');
});
it('accepts opaque Xiaomi model identifiers', function (): void {
    Xiaomi::create(['apiKey' => 'xiaomi-test']);
    expect(Xiaomi::model('private-mimo')->modelId())->toBe('private-mimo');
});
