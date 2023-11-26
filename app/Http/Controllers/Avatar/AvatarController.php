<?php

namespace App\Http\Controllers\Avatar;

use App\Http\Controllers\Controller;
use App\Http\Requests\Avatar\CreateAvatarRequest;
use App\Http\Requests\Avatar\getAvatarRequest;
use App\Http\Requests\Avatar\UpdateAvatarRequest;
use App\Services\Avatar\AvatarService;
use Illuminate\Http\JsonResponse;

class AvatarController extends Controller
{
    /** @var AvatarService */
    private AvatarService $avatarService;

    /**
     * @param AvatarService $avatarService
     */
    public function __construct(
        AvatarService $avatarService
    ) {
        $this->avatarService = $avatarService;
    }

    /**
     * @OA\Get(
     *       path="/api/v1/profile/avatar",
     *       tags={"Avatar"},
     *       summary="Получить URl на аватарку",
     *       description="Получить URl на аватарку по user_id",
     *       @OA\Parameter(
     *            name="user_id",
     *            description="наприер 1",
     *            required=true,
     *            in="query",
     *       ),
     *       @OA\Response(
     *           response=200,
     *           description="Successful operation",
     *       ),
     *   )
     *
     * @param getAvatarRequest $request
     *
     * @return JsonResponse
     */
    public function getAvatar(getAvatarRequest $request): JsonResponse
    {
        return $this->getAvatarService()->getAvatar($request);
    }

    /**
     * @OA\Post(
     *       path="/api/v1/profile/avatar/update",
     *       tags={"Avatar"},
     *       summary="Обновить аватарку",
     *       description="Метод обновляет аватарку пльзователя",
     *       @OA\Parameter(
     *            name="user_id",
     *            description="наприер 1",
     *            required=true,
     *            in="query",
     *       ),
     *      @OA\Parameter(
     *             name="avatar",
     *             description="Файл аватарки (jpeg, png, jpg, gif)",
     *             required=true,
     *             in="query",
     *             @OA\Schema(
     *                 type="file"
     *             )
     *       ),
     *       @OA\Response(
     *           response=200,
     *           description="Successful operation",
     *       ),
     *   )
     *
     * @param UpdateAvatarRequest $request
     *
     * @return JsonResponse
     */
    public function updateAvatar(UpdateAvatarRequest $request): JsonResponse
    {
        return $this->getAvatarService()->updateAvatar($request);
    }

    /**
     * @return AvatarService
     */
    private function getAvatarService(): AvatarService
    {
        return $this->avatarService;
    }
}
