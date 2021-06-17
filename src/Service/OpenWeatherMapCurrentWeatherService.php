<?php

namespace App\Service;

use App\Service\Contract\AbstractOpenWeatherMapExternal;

class OpenWeatherMapCurrentWeatherService extends AbstractOpenWeatherMapExternal
{
    public function getCurrentWeatherByCity(string $city, string $stateCode = null, string $countryCode = null, string $units = null, string $lang = null): array
    {
        // Compose city.
        if ($stateCode && $countryCode) {
            $city = $city . ',' . $stateCode . ',' . $countryCode;
        }

        // Compose query.
        $query = [
            'q' => $city,
            'appid' => $this->config->get('openweathermap')['api_key'],
            'units' => $units,
            'lang' => $lang
        ];
        $url = $this->config->get('openweathermap')['url_current'];

        return $this->currentWeather($query, $url);
    }

    public function getCurrentWeatherById(string $id, string $units = null, string $lang = null): array
    {
        // Compose query.
        $query = [
            'id' => $id,
            'appid' => $this->config->get('openweathermap')['api_key'],
            'units' => $units,
            'lang' => $lang
        ];
        $url = $this->config->get('openweathermap')['url_current'];

        return $this->currentWeather($query, $url);
    }

    public function getCurrentWeatherByLatLong(string $lat, string $long, string $units = null, string $lang = null): array
    {
        // Compose query.
        $query = [
            'lat' => $lat,
            'long' => $long,
            'appid' => $this->config->get('openweathermap')['api_key'],
            'units' => $units,
            'lang' => $lang
        ];
        $url = $this->config->get('openweathermap')['url_current'];

        return $this->currentWeather($query, $url);
    }

    public function getCurrentWeatherByZip(string $zip, string $units = null, string $lang = null): array
    {
        // Compose query.
        $query = [
            'zip' => $zip,
            'appid' => $this->config->get('openweathermap')['api_key'],
            'units' => $units,
            'lang' => $lang
        ];
        $url = $this->config->get('openweathermap')['url_current'];

        return $this->currentWeather($query, $url);
    }

    public function getCurrentWeatherByBbox(string $bbox, string $units = null, string $lang = null): array
    {
        // Compose query.
        $query = [
            'bbox' => $bbox,
            'appid' => $this->config->get('openweathermap')['api_key'],
            'units' => $units,
            'lang' => $lang
        ];
        $url = $this->config->get('openweathermap')['url_current_box'];

        return $this->currentWeather($query, $url);
    }

    public function getCurrentWeatherByFind(string $lat, string $long, int $cnt = null, string $units = null, string $lang = null): array
    {
        // Compose query.
        $query = [
            'lat' => $lat,
            'long' => $long,
            'cnt' => $cnt,
            'appid' => $this->config->get('openweathermap')['api_key'],
            'units' => $units,
            'lang' => $lang
        ];
        $url = $this->config->get('openweathermap')['url_current_find'];

        return $this->currentWeather($query, $url);
    }
}
