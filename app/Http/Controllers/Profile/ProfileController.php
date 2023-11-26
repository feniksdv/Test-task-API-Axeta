<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateLocationRequest;
use App\Services\Profile\ProfileService;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /** @var ProfileService */
    private ProfileService $profileService;

    /**
     * @param ProfileService $profileService
     */
    public function __construct(
        ProfileService $profileService
    ) {
        $this->profileService = $profileService;
    }

    /**
     * @OA\Patch(
     *     path="/api/v1/profile/updateGeo",
     *     tags={"Profile"},
     *     summary="Обновление Местоположения пользователя",
     *     description="Метод обновляет, местоположение так и location, возвращает оба параметра",
     *     @OA\Parameter(
     *          name="user_id",
     *          description="наприер 1",
     *          required=true,
     *          in="query",
     *     ),
     *    @OA\Parameter(
     *          name="address",
     *          description="Portland, Oregon, USA",
     *          required=true,
     *          in="query",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Profile")
     *     ),
     *  )
     *
     * @param UpdateLocationRequest $request
     *
     * @return JsonResponse
     */
    public function updateGeo(UpdateLocationRequest $request): JsonResponse
    {
        return $this->getProfileService()->updateGeo($request);
    }

    /**
     * @return ProfileService
     */
    private function getProfileService(): ProfileService
    {
        return $this->profileService;
    }
}
