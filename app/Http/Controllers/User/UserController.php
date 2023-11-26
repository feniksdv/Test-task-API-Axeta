<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\OnlyUserIdRequest;
use App\Http\Requests\User\UpdateUserNameRequest;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /** @var UserService */
    private UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/profile",
     *     tags={"User"},
     *     summary="Получение профиля пользователя",
     *     description="Метод возвращает данные пользователя и всех связанх сущностей",
     *     @OA\Parameter(
     *          name="user_id",
     *          description="наприер 1",
     *          required=true,
     *          in="query",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     * )
     *
     * @param OnlyUserIdRequest $request
     *
     * @return JsonResponse
     */
    public function getUser(OnlyUserIdRequest $request): JsonResponse
    {
        return $this->getUserService()->getUser($request);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/profile/updateUserName",
     *     tags={"User"},
     *     summary="Обновление Имени и Фамилии ток так  пользователя",
     *     description="Метод возвращает данные пользователя и всех связанных сущностей",
     *     @OA\Parameter(
     *          name="user_id",
     *          description="наприер 1",
     *          required=true,
     *          in="query",
     *     ),
     *    @OA\Parameter(
     *          name="user_name",
     *          description="Uma Thurman",
     *          required=true,
     *          in="query",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *  )
     *
     * @param UpdateUserNameRequest $request
     *
     * @return JsonResponse
     */
    public function updateUserName(UpdateUserNameRequest $request): JsonResponse
    {
        return $this->getUserService()->updateUserName($request);
    }

    /**
     * @return UserService
     */
    private function getUserService(): UserService
    {
        return $this->userService;
    }
}
