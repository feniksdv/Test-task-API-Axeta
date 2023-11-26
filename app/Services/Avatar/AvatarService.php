<?php

namespace App\Services\Avatar;

use App\Helpers\Responses;
use App\Http\Requests\Avatar\CreateAvatarRequest;
use App\Http\Requests\Avatar\getAvatarRequest;
use App\Http\Requests\Avatar\UpdateAvatarRequest;
use App\Repositories\UserRepository;
use App\Services\AbstractService;
use Exception;
use Illuminate\Http\JsonResponse;

class AvatarService extends AbstractService
{
    use Responses;

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
     * @param getAvatarRequest $request
     *
     * @return JsonResponse
     */
    public function getAvatar(getAvatarRequest $request): JsonResponse
    {
        try {
            $userId = $request->get('user_id');
            $user = $this->findUser($userId);

            $result = $user->getMedia('avatars')->first()->getUrl('avatar');
        } catch (Exception $exception) {
            $this->exceptionResponse($exception->getMessage(), $exception->getCode());
        }
        return $this->successResponseWithData(['avatar' => $result]);
    }

    /**
     * @param UpdateAvatarRequest $request
     *
     * @return JsonResponse
     */
    public function updateAvatar(UpdateAvatarRequest $request): JsonResponse
    {
        try {
            $userId = $request->get('user_id');
            $user = $this->findUser($userId);
            $findAvatar = $user->getMedia('avatars')->first();
            if (null !== $findAvatar) {
                $findAvatar->delete();
            }
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
            $user = $this->findUser($userId);
            $avatar = $user->getMedia('avatars')->first()->getUrl('avatar');
        } catch (Exception $exception) {
            $this->exceptionResponse($exception->getMessage(), $exception->getCode());
        }
        return $this->successResponseWithData(['avatar' => $avatar]);
    }
}
