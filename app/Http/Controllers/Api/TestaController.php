<?php

namespace App\Http\Controllers\Api;

use App\Events\GetLocation;
use App\Http\Controllers\Controller;

use App\Http\Resources\AddressesCollection;
use App\Models\Address;
use App\Models\Region;
use App\Services\DBEngine\DBEngineinterface;
use App\Services\GeoCodingRestApiEngine\GeocodingRestApiEngineinterface;
use Illuminate\Http\Request;

class TestaController extends Controller
{
    public function getLocation(Request $request, GeocodingRestApiEngineinterface $geocodingRestApiEngine)
    {
        event(new GetLocation($request->latitude, $request->longitude));
        return response($geocodingRestApiEngine
            ->getLocationData($request->latitude, $request->longitude), 200);
    }

    public function getRecords()
    {
        return AddressesCollection::collection(Address::all());
    }

    public function getRecordsByRegionId($id)
    {
        $region = Region::find($id);
        return AddressesCollection::collection($region->addresses()->get());
    }
}
