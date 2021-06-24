<?php

namespace App\Service\Contract;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Doesn't make a lot of sense for this class to be abstract, does it?.
 * Well, I'll say that if you extend into other weather iterations you should be able to, eventually, find an abstract method to polymorph.
 */
class AbstractOpenWeatherMapExternal
{
    protected ParameterBagInterface $config;
    protected HttpClientInterface $httpClient;

    public function __construct(ParameterBagInterface $config, HttpClientInterface $httpClient)
    {
        $this->config = $config;
        $this->httpClient = $httpClient;
    }

    protected function currentWeather(array $query, string $url): array
    {
        $response = $this->httpClient->request('GET', $url, [
            'query' => $query
        ]);

        return $response->toArray();
    }

    /**
     * To avoid exposing the full exception message, and hence the api key, we should catch and wrap the error message.
     * But it's not relevant in this context.
     */
    // protected function currentWeather(array $query, string $url): array
    // {
    //     try {
    //         $response = $this->httpClient->request('GET', $url, [
    //             'query' => [
    //                 $query
    //             ]
    //         ]);
    //         $response = $response->getContent();
    //     } catch (\Throwable $e) {
    //         $response = $response->getContent(false);
    //     }

    //     return json_decode($response, true);
    // }
}
