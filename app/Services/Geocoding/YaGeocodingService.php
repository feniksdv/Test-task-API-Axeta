<?php

namespace App\Services\Geocoding;

use Exception;
use Illuminate\Support\Facades\Http;

class YaGeocodingService
{
    /** @var string */
    const URL = 'https://geocode-maps.yandex.ru/1.x/?';

    /** @var string */
    const FORMAT = 'json';

    /** @var array */
    private array $body;

    /**
     * @param string $address
     *
     * @throws Exception
     */
    public function __construct(
        string $address
    ) {
        $this->body = $this->getGeocode($address);
    }

    /**
     * @return string
     */
    public function getPoint(): string
    {
        $point = '';
        foreach ($this->body['response']['GeoObjectCollection']['featureMember'] as $item) {
            $point = $item['GeoObject']['Point']['pos'];
        }
        return $point;
    }

    /**
     * @param string $address
     *
     * @return array
     * @throws Exception
     */
    private function getGeocode(string $address): array
    {
        $url = self::URL .
            'apikey=' . getenv('YA_GEOCODING_API_KEY') .
            '&geocode=' . $address .
            '&format=' . self::FORMAT;

        $response = Http::get($url);
        $body = $response->json();

        if ($response->successful()) {
            $body['statusCode'] = $response->status();
        } else {
            throw new Exception($body['message'], $body['statusCode']);
        }

        return $body;
    }
}
