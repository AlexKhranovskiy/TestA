<?php


namespace App\Services\GeoCodingRestApiEngine;


class GeoCodingRestApiEngine implements GeocodingRestApiEngineinterface
{
    protected $url;
    protected $api_key;

    public function __construct($url, $api_key)
    {
        $this->url = $url;
        $this->api_key = $api_key;
    }

    public function getLocationData($latitude, $longitude)
    {
        $params = [
            'latlng' => $latitude . ',' . $longitude,
            'key' => $this->api_key
        ];
        return json_decode(file_get_contents($this->url . '?' . http_build_query($params)), true);
    }
}
