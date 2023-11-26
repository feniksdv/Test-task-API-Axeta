<?php

namespace App\Services\Profile;

use App\Helpers\Responses;
use App\Http\Requests\Profile\UpdateLocationRequest;
use App\Repositories\ProfileRepository;
use App\Services\Geocoding\YaGeocodingService;
use Exception;
use Illuminate\Http\JsonResponse;
use MatanYadaev\EloquentSpatial\Objects\Point;

class ProfileService
{
    use Responses;

    /** @var ProfileRepository */
    private ProfileRepository $profileRepository;

    /** @var YaGeocodingService */
    private YaGeocodingService $yaGeocodingService;

    /**
     * @param ProfileRepository $profileRepository
     */
    public function __construct(
        ProfileRepository $profileRepository,
    ) {
        $this->profileRepository = $profileRepository;
    }

    /**
     * @param UpdateLocationRequest $request
     *
     * @return JsonResponse
     */
    public function updateGeo(UpdateLocationRequest $request): JsonResponse
    {
        try {
            $userId = $request->get('user_id');
            $profile = $this->findProfile($userId);
            $addressRequest = $request->get('address');

            $address = $this->updateAddress($profile, $addressRequest);
            $location = $this->updateLocation($profile, $addressRequest);

            $result = array_merge($address, $location);
        } catch (Exception $exception) {
            $this->exceptionResponse($exception->getMessage(), $exception->getCode());
        }
        return $this->successResponseWithData($result);
    }

    /**
     * @param object $profile
     * @param string $address
     *
     * @return array
     */
    public function updateAddress(object $profile, string $address): array
    {
        $profile->address = $address;
        $profile->save();
        return ['address' => $profile->address];
    }

    /**
     * @param object $profile
     * @param string $addressRequest
     *
     * @return array
     * @throws Exception
     */
    public function updateLocation(object $profile, string $addressRequest): array
    {
        $location = $this->getYaGeocodingService($addressRequest);
        $point = $location->getPoint();

        if (!empty($point)) {
            $point = explode(' ', $point);
        } else {
            $point = [0.0, 0.0];
        }

        $profile->location = new Point($point[0], $point[1]);
        $profile->save();
        return ['location' => $profile->location];
    }

    /**
     * @param int $userId
     *
     * @return object
     * @throws Exception
     */
    private function findProfile(int $userId): object
    {
        $profile = $this->getProfileRepository()->getById($userId);
        if (null === $profile) {
            throw new Exception(__('errors.profile_not_found'), 400);
        }
        return $profile;
    }

    /**
     * @return ProfileRepository
     */
    private function getProfileRepository(): ProfileRepository
    {
        return $this->profileRepository;
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
