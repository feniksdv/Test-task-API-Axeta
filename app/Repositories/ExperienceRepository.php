<?php

namespace App\Repositories;

use App\Models\Experience;

class ExperienceRepository
{
    /** @var Experience */
    private Experience $experience;

    /**
     * @param Experience $experience
     */
    public function __construct(
        Experience $experience
    ) {
        $this->experience = $experience;
    }

    /**
     * @param string $experience
     *
     * @return Experience|null
     */
    public function getByValue(string $experience): ?Experience
    {
        return $this->getExperienceModel()
            ->whereValue($experience)
            ->first();
    }

    /**
     * @param string $experience
     *
     * @return Experience|null
     */
    public function create(string $experience): ?Experience
    {
        return $this->getExperienceModel()
            ->create([
                'value' => $experience
            ]);
    }

    /**
     * @return Experience
     */
    private function getExperienceModel(): Experience
    {
        return $this->experience;
    }
}
