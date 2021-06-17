<?php

namespace App\Tests\Unit\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Service\OpenWeatherMapCurrentWeatherService;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

final class OpenWeatherMapCurrentWeatherServiceTest extends KernelTestCase
{
    public ParameterBagInterface $config;

    public function setUp(): void
    {
        self::bootKernel();
        $this->config = self::$container->get(ParameterBagInterface::class);
    }

    public function testCurrentWeatherException(): void
    {
        // Mock params and dependencies.
        $mockCity = 'fake city';
        $mockHttpClientResponse = new MockResponse(new \Exception(
            json_encode([
                'cod' => 404,
                'error' => 'Invalid city.'
            ])
        ));
        $mockHttpClient = new MockHttpClient($mockHttpClientResponse);

        // Run assertions.
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(4);

        // Instance and run.
        $mockOpenWeatherMapCurrentWeatherService = new OpenWeatherMapCurrentWeatherService($this->config, $mockHttpClient);
        $mockOpenWeatherMapCurrentWeatherService->getCurrentWeatherByCity($mockCity);
    }
}
