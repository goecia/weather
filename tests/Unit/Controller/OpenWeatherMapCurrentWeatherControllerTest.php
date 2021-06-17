<?php

namespace App\Tests\Unit\Controller;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Service\Response\VanillaResponse;
use App\Service\OpenWeatherMapCurrentWeatherService;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use App\Controller\OpenWeatherMapCurrentWeatherController;
use Symfony\Component\HttpFoundation\Request;

final class OpenWeatherMapCurrentWeatherControllerTest extends KernelTestCase
{
    public ParameterBagInterface $config;

    public function setUp(): void
    {
        self::bootKernel();
        $this->config = self::$container->get(ParameterBagInterface::class);
    }

    public function testCity(): void
    {
        // Mock params and dependencies.
        $mockRequest = new Request([
            'country_code' => '032',
            'state_code' => 'AR-B',
            'units' => 'metric',
            'lang' => 'es'
        ]);
        $mockCity = 'buenos aires';
        $mockResponse = new VanillaResponse();
        $mockHttpClientResponse = new MockResponse(json_encode([
            'mock' => 'response'
        ]));
        $mockHttpClient = new MockHttpClient($mockHttpClientResponse);
        $mockOpenWeatherMapCurrentWeatherService = new OpenWeatherMapCurrentWeatherService($this->config, $mockHttpClient);

        // Instance and run.
        $mockOpenWeatherMapCurrentWeatherController = new OpenWeatherMapCurrentWeatherController($mockResponse, $mockOpenWeatherMapCurrentWeatherService);
        $response = $mockOpenWeatherMapCurrentWeatherController->city($mockRequest, $mockCity);

        // Run assertions.
        $this->assertInstanceOf(VanillaResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertArrayHasKey('success', json_decode($response->getContent(), true));
        $this->assertTrue(json_decode($response->getContent(), true)['success']);
    }

    public function testId(): void
    {
        // Mock params and dependencies.
        $mockRequest = new Request([
            'units' => 'metric',
            'lang' => 'es'
        ]);
        $mockId = '2172797';
        $mockResponse = new VanillaResponse();
        $mockHttpClientResponse = new MockResponse(json_encode([
            'mock' => 'response'
        ]));
        $mockHttpClient = new MockHttpClient($mockHttpClientResponse);
        $mockOpenWeatherMapCurrentWeatherService = new OpenWeatherMapCurrentWeatherService($this->config, $mockHttpClient);

        // Instance and run.
        $mockOpenWeatherMapCurrentWeatherController = new OpenWeatherMapCurrentWeatherController($mockResponse, $mockOpenWeatherMapCurrentWeatherService);
        $response = $mockOpenWeatherMapCurrentWeatherController->id($mockRequest, $mockId);

        // Run assertions.
        $this->assertInstanceOf(VanillaResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertArrayHasKey('success', json_decode($response->getContent(), true));
        $this->assertTrue(json_decode($response->getContent(), true)['success']);
    }

    public function testLatLong(): void
    {
        // Mock params and dependencies.
        $mockRequest = new Request([
            'units' => 'metric',
            'lang' => 'es'
        ]);
        $mockLat = '35';
        $mockLong = '139';
        $mockResponse = new VanillaResponse();
        $mockHttpClientResponse = new MockResponse(json_encode([
            'mock' => 'response'
        ]));
        $mockHttpClient = new MockHttpClient($mockHttpClientResponse);
        $mockOpenWeatherMapCurrentWeatherService = new OpenWeatherMapCurrentWeatherService($this->config, $mockHttpClient);

        // Instance and run.
        $mockOpenWeatherMapCurrentWeatherController = new OpenWeatherMapCurrentWeatherController($mockResponse, $mockOpenWeatherMapCurrentWeatherService);
        $response = $mockOpenWeatherMapCurrentWeatherController->latLong($mockRequest, $mockLat, $mockLong);

        // Run assertions.
        $this->assertInstanceOf(VanillaResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertArrayHasKey('success', json_decode($response->getContent(), true));
        $this->assertTrue(json_decode($response->getContent(), true)['success']);
    }

    public function testZip(): void
    {
        // Mock params and dependencies.
        $mockRequest = new Request([
            'units' => 'metric',
            'lang' => 'es'
        ]);
        $mockZip = '94040';
        $mockResponse = new VanillaResponse();
        $mockHttpClientResponse = new MockResponse(json_encode([
            'mock' => 'response'
        ]));
        $mockHttpClient = new MockHttpClient($mockHttpClientResponse);
        $mockOpenWeatherMapCurrentWeatherService = new OpenWeatherMapCurrentWeatherService($this->config, $mockHttpClient);

        // Instance and run.
        $mockOpenWeatherMapCurrentWeatherController = new OpenWeatherMapCurrentWeatherController($mockResponse, $mockOpenWeatherMapCurrentWeatherService);
        $response = $mockOpenWeatherMapCurrentWeatherController->zip($mockRequest, $mockZip);

        // Run assertions.
        $this->assertInstanceOf(VanillaResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertArrayHasKey('success', json_decode($response->getContent(), true));
        $this->assertTrue(json_decode($response->getContent(), true)['success']);
    }

    public function testBbox(): void
    {
        // Mock params and dependencies.
        $mockRequest = new Request([
            'units' => 'metric',
            'lang' => 'es'
        ]);
        $mockBbox = '12,32,15,37,10';
        $mockResponse = new VanillaResponse();
        $mockHttpClientResponse = new MockResponse(json_encode([
            'mock' => 'response'
        ]));
        $mockHttpClient = new MockHttpClient($mockHttpClientResponse);
        $mockOpenWeatherMapCurrentWeatherService = new OpenWeatherMapCurrentWeatherService($this->config, $mockHttpClient);

        // Instance and run.
        $mockOpenWeatherMapCurrentWeatherController = new OpenWeatherMapCurrentWeatherController($mockResponse, $mockOpenWeatherMapCurrentWeatherService);
        $response = $mockOpenWeatherMapCurrentWeatherController->bbox($mockRequest, $mockBbox);

        // Run assertions.
        $this->assertInstanceOf(VanillaResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertArrayHasKey('success', json_decode($response->getContent(), true));
        $this->assertTrue(json_decode($response->getContent(), true)['success']);
    }

    public function testFind(): void
    {
        // Mock params and dependencies.
        $mockRequest = new Request([
            'units' => 'metric',
            'lang' => 'es'
        ]);
        $mockLat = '55.5';
        $mockLong = '37.5';
        $mockCnt = 10;
        $mockResponse = new VanillaResponse();
        $mockHttpClientResponse = new MockResponse(json_encode([
            'mock' => 'response'
        ]));
        $mockHttpClient = new MockHttpClient($mockHttpClientResponse);
        $mockOpenWeatherMapCurrentWeatherService = new OpenWeatherMapCurrentWeatherService($this->config, $mockHttpClient);

        // Instance and run.
        $mockOpenWeatherMapCurrentWeatherController = new OpenWeatherMapCurrentWeatherController($mockResponse, $mockOpenWeatherMapCurrentWeatherService);
        $response = $mockOpenWeatherMapCurrentWeatherController->find($mockRequest, $mockLat, $mockLong, $mockCnt);

        // Run assertions.
        $this->assertInstanceOf(VanillaResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertArrayHasKey('success', json_decode($response->getContent(), true));
        $this->assertTrue(json_decode($response->getContent(), true)['success']);
    }
}
