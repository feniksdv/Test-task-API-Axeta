<?php

namespace App\Http\Controllers\location;

use App\Helpers\Responses;
use App\Http\Controllers\Controller;
use App\Http\Requests\Location\GetLocationRequest;
use App\Services\Geocoding\YaGeocodingService;
use Exception;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    use Responses;

    /** @var YaGeocodingService */
    private YaGeocodingService $yaGeocodingService;

    /**
     * @OA\Get(
     *     path="/api/v1/location/getLocation",
     *     tags={"Location"},
     *     summary="Получения координат по адресу",
     *     description="Метод возвращает координаты по адресу",
     *     @OA\Parameter(
     *          name="address",
     *          description="Portland, Oregon, USA",
     *          required=true,
     *          in="query",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *  )
     *
     * @param GetLocationRequest $request
     *
     * @return JsonResponse
     */
    public function getLocation(GetLocationRequest $request): JsonResponse
    {
        try {
            $location = $this->getYaGeocodingService($request->get('address'));
            $location = $location->getPoint();
        } catch (Exception $exception) {
            $this->exceptionResponse($exception->getMessage(), $exception->getCode());
        }

        return $this->successResponseWithData(['location' => $location]);
    }

    /**
     * @param string $address
     *
     * @return YaGeocodingService
     * @throws Exception
     */
    private function getYaGeocodingService(string $address): YaGeocodingService
    {
        return new YaGeocodingService($address);
    }
}
