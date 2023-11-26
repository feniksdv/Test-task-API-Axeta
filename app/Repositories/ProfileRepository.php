<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Models\User;

class ProfileRepository
{
    /** @var Profile */
    private Profile $profile;

    /**
     * @param Profile $profile
     */
    public function __construct(
        Profile $profile
    ) {
        $this->profile = $profile;
    }

    /**
     * @param array $data
     *
     * @return User|null
     */
    public function update(array $data): ?User
    {
        $user = $this->getProfileModel()
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
     * @param int $userId
     *
     * @return null|Profile
     */
    public function getById(int $userId): ?Profile
    {
        return $this->getProfileModel()
            ->whereUserId($userId)
            ->first();
    }

    /**
     * @return Profile
     */
    private function getProfileModel(): Profile
    {
        return $this->profile;
    }
}
