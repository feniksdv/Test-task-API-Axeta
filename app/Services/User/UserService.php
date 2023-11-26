<?php

namespace App\Services\User;

use App\Http\Requests\User\OnlyUserIdRequest;
use App\Http\Requests\User\UpdateUserNameRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\AbstractService;
use Exception;
use Illuminate\Http\JsonResponse;

class UserService extends AbstractService
{
    /** @var UserRepository */
    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(
        UserRepository $userRepository,
    ) {
        parent::__construct($userRepository);
    }

    /**
     * @param OnlyUserIdRequest $request
     *
     * @return JsonResponse
     */
    public function getUser(OnlyUserIdRequest $request): JsonResponse
    {
        try {
            $user = $this->findUser($request->get('user_id'));
            $this->prepareName($user);
        } catch (Exception $exception) {
            $this->exceptionResponse($exception->getMessage(), $exception->getCode());
        }
        return $this->successResponseWithData($user);
    }

    /**
     * @param UpdateUserNameRequest $request
     *
     * @return JsonResponse
     */
    public function updateUserName(UpdateUserNameRequest $request): JsonResponse
    {
        try {
            $userId = $request->get('user_id');
            $this->findUser($userId);

            $user = $this->updateName($userId, $request->get('user_name'));
            if (null === $user) {
                $userName = $user->full_name;
            }

            $userName = $this->prepareName($user);
        } catch (Exception $exception) {
            $this->exceptionResponse($exception->getMessage(), $exception->getCode());
        }
        return $this->successResponseWithData($userName);
    }

    /**
     * @param int $userId
     * @param string $userName
     *
     * @return User|null
     */
    private function updateName(int $userId, string $userName): ?User
    {
        $userName = explode(' ', $userName);
        $firstName = ucfirst($userName[0] ?? null);
        $lastName = ucfirst($userName[1] ?? null);

        $data = [
            'user_id' => $userId,
            'first_name' => $firstName,
            'last_name' => $lastName,
        ];

        return $this->getUserRepository()->update($data);
    }

    /**
     * @param object $user
     *
     * @return array
     */
    private function prepareName(object $user): array
    {
        $user->full_name = $user->first_name . ' ' . $user->last_name;
        unset($user->first_name, $user->last_name);
        return ['full_name' => $user->full_name];
    }
}
