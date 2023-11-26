<?php

namespace App\Services\Experience;

use App\Helpers\Responses;
use App\Http\Requests\Experience\AddRequest;
use App\Http\Requests\Experience\DeleteRequest;
use App\Http\Requests\Experience\UpdateDurationRequest;
use App\Repositories\ExperienceRepository;
use App\Repositories\ExperienceUserRepository;
use App\Repositories\UserRepository;
use App\Services\AbstractService;
use Exception;
use Illuminate\Http\JsonResponse;

class ExperienceService extends AbstractService
{
    use Responses;

    /** @var UserRepository */
    private UserRepository $userRepository;

    /** @var ExperienceRepository */
    private ExperienceRepository $experienceRepository;

    /** @var ExperienceUserRepository */
    private ExperienceUserRepository $experienceUserRepository;

    /**
     * @param UserRepository $userRepository
     * @param ExperienceRepository $experienceRepository
     * @param ExperienceUserRepository $experienceUserRepository
     */
    public function __construct(
        UserRepository $userRepository,
        ExperienceRepository $experienceRepository,
        ExperienceUserRepository $experienceUserRepository
    ) {
        parent::__construct($userRepository);
        $this->experienceRepository = $experienceRepository;
        $this->experienceUserRepository = $experienceUserRepository;
    }

    /**
     * @param AddRequest $request
     *
     * @return JsonResponse
     */
    public function create(AddRequest $request): JsonResponse
    {
        try {
            $userId = $request->get('user_id');
            $experience = $request->get('value');

            $this->findUser($userId);

            $value = $this->getExperienceRepository()->getByValue($experience);
            if (null === $value) {
                $value = $this->getExperienceRepository()->create($experience);
            }
            $experienceId = $value->id;

            $findExperience = $this->getExperienceUserRepository()->getByUserIdAndExperienceId($userId, $experienceId);
            if (null !== $findExperience) {
                throw new Exception(__('errors.experience_already'), 400);
            }
            $result = $this->getExperienceUserRepository()->create($userId, $experienceId);
        } catch (Exception $exception) {
            $this->exceptionResponse($exception->getMessage(), $exception->getCode());
        }
        return $this->successResponseWithData($result);
    }

    /**
     * @param UpdateDurationRequest $request
     *
     * @return JsonResponse
     */
    public function updateDuration(UpdateDurationRequest $request): JsonResponse
    {
        try {
            $userId = $request->get('user_id');

            $this->findUser($userId);

            $result = $this->getExperienceUserRepository()->update(
                $userId,
                $request->get('experience_id'),
                $request->get('duration')
            );
            if (!$result) {
                throw new Exception(__('errors.experience_not_found'), 400);
            }
        } catch (Exception $exception) {
            $this->exceptionResponse($exception->getMessage(), $exception->getCode());
        }
        return $this->successResponseWithData(__('successes.experience_updated'));
    }

    /**
     * @param DeleteRequest $request
     *
     * @return JsonResponse
     */
    public function delete(DeleteRequest $request): JsonResponse
    {
        try {
            $userId = $request->get('user_id');

            $this->findUser($userId);

            $result = $this->getExperienceUserRepository()->delete(
                $userId,
                $request->get('experience_id')
            );
            if (!$result) {
                throw new Exception(__('errors.experience_not_found'), 400);
            }
        } catch (Exception $exception) {
            $this->exceptionResponse($exception->getMessage(), $exception->getCode());
        }
        return $this->successResponseWithData(__('successes.experience_deleted'));
    }

    /**
     * @return ExperienceUserRepository
     */
    private function getExperienceUserRepository(): ExperienceUserRepository
    {
        return $this->experienceUserRepository;
    }

    /**
     * @return ExperienceRepository
     */
    private function getExperienceRepository(): ExperienceRepository
    {
        return $this->experienceRepository;
    }
}
