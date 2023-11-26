<?php

namespace App\Repositories;

use App\Models\ExperienceUser;

class ExperienceUserRepository
{
    /** @var ExperienceUser */
    private ExperienceUser $experienceUser;

    /**
     * @param ExperienceUser $experienceUser
     */
    public function __construct(
        ExperienceUser $experienceUser
    ) {
        $this->experienceUser = $experienceUser;
    }

    /**
     * @param int $userId
     * @param int $experienceId
     *
     * @return ExperienceUser|null
     */
    public function getByUserIdAndExperienceId(int $userId, int $experienceId): ?ExperienceUser
    {
        return $this->getExperienceUserModel()
            ->whereUserId($userId)
            ->whereExperienceId($experienceId)
            ->first();
    }

    /**
     * @param int $userId
     * @param int $experienceId
     *
     * @return ExperienceUser
     */
    public function create(int $userId, int $experienceId): ExperienceUser
    {
        return $this->getExperienceUserModel()
            ->create([
                'user_id' => $userId,
                'experience_id' => $experienceId
            ]);
    }

    /**
     * @param int $userId
     * @param int $experienceId
     * @param float $duration
     *
     * @return bool
     */
    public function update(int $userId, int $experienceId, float $duration): bool
    {
        return $this->getExperienceUserModel()
            ->whereUserId($userId)
            ->whereExperienceId($experienceId)
            ->update(['duration' => $duration]);
    }

    /**
     * @param int $userId
     * @param int $experienceId
     *
     * @return bool
     */
    public function delete(int $userId, int $experienceId): bool
    {
        return $this->getExperienceUserModel()
            ->whereUserId($userId)
            ->whereExperienceId($experienceId)
            ->delete();
    }

    /**
     * @return ExperienceUser
     */
    private function getExperienceUserModel(): ExperienceUser
    {
        return $this->experienceUser;
    }
}
