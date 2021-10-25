<?php
declare(strict_types=1);
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Nemuru\Shared\Infrastructure\Services\RestClient;

final class GuzzleClientArea implements RestClient
{
    const DEFAULT_ACCEPT_HEADER = 'application/json';
    const DEFAULT_CACHE_HEADER = 'max-age=259200';

    public Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openweathermap.org/data/2.5',
            'timeout' => 2.0,
        ]);
    }

    public function getWeather(): array
    {
        $city = 'Barcelona';
        $cnt = 1;
        $appId = $_ENV['APP_API_KEY_OPENWEATHERMAP'];

        $response = $this->client->get('/weather', [
            RequestOptions::HEADERS => [
                'Accept' => self::DEFAULT_ACCEPT_HEADER,
                'Cache-Control' => self::DEFAULT_CACHE_HEADER,
            ],
            RequestOptions::QUERY => [
                'q' => $city,
                'cnt' => $cnt,
                'appid' => $appId
            ]
        ]);

        $result = json_decode($response->getBody(), JSON_OBJECT_AS_ARRAY);

        return [
            'wind' => $result['wind']['speed'],
            'humidity' => $result['weather'] / 10 . "%"
        ];

    }
}