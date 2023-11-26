<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /** @var User */
    private User $user;

    /**
     * @param User $user
     */
    public function __construct(
        User $user
    ) {
        $this->user = $user;
    }

    /**
     * @param int $userId
     *
     * @return User|null
     */
    public function getById(int $userId): ?User
    {
        $user = $this->getUserModel()
            ->whereId($userId)
            ->whereIsActive(true)
            ->with([
                'profile',
                'portfolios',
                'experienceUsers',
                'availabilityUsers',
                'environmentPreferreds',
            ])
            ->first();

        if ($user) {
            $user->makeHidden('created_at');
            $user->makeHidden('updated_at');
            $user->profile->makeHidden('created_at');
            $user->profile->makeHidden('updated_at');
            $user->portfolios->makeHidden('created_at');
            $user->portfolios->makeHidden('updated_at');
            $user->experienceUsers->makeHidden('created_at');
            $user->experienceUsers->makeHidden('updated_at');
            $user->availabilityUsers->makeHidden('created_at');
            $user->availabilityUsers->makeHidden('updated_at');
            $user->availabilityUsers->makeHidden('pivot');
            $user->environmentPreferreds->makeHidden('created_at');
            $user->environmentPreferreds->makeHidden('updated_at');
            $user->environmentPreferreds->makeHidden('pivot');
        }

        return $user;
    }

    /**
     * @param array $data
     *
     * @return User|null
     */
    public function update(array $data): ?User
    {
        $user = $this->getUserModel()
            ->whereId($data['user_id'])
            ->first();

        if ($user) {
            $user->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
            ]);
            $user->makeHidden('created_at');
            $user->makeHidden('updated_at');
        }

        return $user;
    }

    /**
     * @return User
     */
    private function getUserModel(): User
    {
        return $this->user;
    }
}
