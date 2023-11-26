<?php

namespace App\Services;

use App\Helpers\Responses;
use App\Repositories\UserRepository;
use Exception;

class AbstractService
{
    use Responses;

    /** @var UserRepository */
    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    protected function __construct(
        UserRepository $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * @param int $userId
     *
     * @return object
     * @throws Exception
     */
    protected function findUser(int $userId): object
    {
        $user = $this->getUserRepository()->getById($userId);
        if (null === $user) {
            throw new Exception(__('errors.user_not_found'), 400);
        }
        return $user;
    }

    /**
     * @return UserRepository
     */
    protected function getUserRepository(): UserRepository
    {
        return $this->userRepository;
    }
}
