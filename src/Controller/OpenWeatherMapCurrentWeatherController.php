<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\Contract\CustomResponseInterface;
use App\Service\OpenWeatherMapCurrentWeatherService;

class OpenWeatherMapCurrentWeatherController
{
    private CustomResponseInterface $response;
    private OpenWeatherMapCurrentWeatherService $openWeatherMapCurrentWeatherService;

    public function __construct(CustomResponseInterface $response, OpenWeatherMapCurrentWeatherService $openWeatherMapCurrentWeatherService)
    {
        $this->response = $response;
        $this->openWeatherMapCurrentWeatherService = $openWeatherMapCurrentWeatherService;
    }

    public function city(Request $request, string $city): Response
    {
        // Optional params.
        $countryCode = $request->query->get('country_code');
        $stateCode = $request->query->get('state_code');
        $units = $request->query->get('units');
        $lang = $request->query->get('lang');

        $response = $this->openWeatherMapCurrentWeatherService->getCurrentWeatherByCity($city, $stateCode, $countryCode, $units, $lang);
        return $this->response->formatResponse($response);
    }

    public function id(Request $request, string $id): Response
    {
        // Optional params.
        $units = $request->query->get('units');
        $lang = $request->query->get('lang');

        $response = $this->openWeatherMapCurrentWeatherService->getCurrentWeatherById($id, $units, $lang);
        return $this->response->formatResponse($response);
    }

    public function latLong(Request $request, string $lat, string $long): Response
    {
        // Optional params.
        $units = $request->query->get('units');
        $lang = $request->query->get('lang');

        $response = $this->openWeatherMapCurrentWeatherService->getCurrentWeatherByLatLong($lat, $long, $units, $lang);
        return $this->response->formatResponse($response);
    }

    public function zip(Request $request, string $zip): Response
    {
        // Optional params.
        $units = $request->query->get('units');
        $lang = $request->query->get('lang');

        $response = $this->openWeatherMapCurrentWeatherService->getCurrentWeatherByZip($zip, $units, $lang);
        return $this->response->formatResponse($response);
    }

    public function bbox(Request $request, string $bbox): Response
    {
        // Optional params.
        $units = $request->query->get('units');
        $lang = $request->query->get('lang');

        $response = $this->openWeatherMapCurrentWeatherService->getCurrentWeatherByBbox($bbox, $units, $lang);
        return $this->response->formatResponse($response);
    }

    public function find(Request $request, string $lat, string $long): Response
    {
        // Optional params.
        $units = $request->query->get('units');
        $lang = $request->query->get('lang');
        $cnt = $request->query->get('cnt');

        $response = $this->openWeatherMapCurrentWeatherService->getCurrentWeatherByFind($lat, $long, $cnt, $units, $lang);
        return $this->response->formatResponse($response);
    }
}
