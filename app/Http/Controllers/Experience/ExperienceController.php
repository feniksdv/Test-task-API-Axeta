<?php

namespace App\Http\Controllers\Experience;

use App\Http\Controllers\Controller;
use App\Http\Requests\Experience\AddRequest;
use App\Http\Requests\Experience\DeleteRequest;
use App\Http\Requests\Experience\UpdateDurationRequest;
use App\Services\Experience\ExperienceService;
use Illuminate\Http\JsonResponse;

class ExperienceController extends Controller
{
    /** @var ExperienceService */
    private ExperienceService $experienceService;

    /**
     * @param ExperienceService $experienceService
     */
    public function __construct(
        ExperienceService $experienceService
    ) {
        $this->experienceService = $experienceService;
    }

    /**
     * @OA\Post(
     *      path="/api/v1/profile/experience/create",
     *      tags={"Experience"},
     *      summary="Добавить новый experience",
     *      description="Метод создает новый experience",
     *      @OA\Parameter(
     *           name="user_id",
     *           description="наприер 1",
     *           required=true,
     *           in="query",
     *      ),
     *     @OA\Parameter(
     *           name="value",
     *           description="C++",
     *           required=true,
     *           in="query",
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Experience")
     *      ),
     *  )
     *
     * @param AddRequest $request
     *
     * @return JsonResponse
     */
    public function create(AddRequest $request): JsonResponse
    {
        return $this->getExperienceService()->create($request);
    }

    /**
     * @OA\Patch(
     *     path="/api/v1/profile/experience/updateDuration",
     *     tags={"Experience"},
     *     summary="Обновление ко-во лет",
     *     description="Метод обновляет ко-во лет",
     *     @OA\Parameter(
     *          name="user_id",
     *          description="наприер 1",
     *          required=true,
     *          in="query",
     *     ),
     *     @OA\Parameter(
     *          name="experience_id",
     *          description="наприер 1",
     *          required=true,
     *          in="query",
     *     ),
     *     @OA\Parameter(
     *          name="duration",
     *          description="наприер 10,5",
     *          required=true,
     *          in="query",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Experience")
     *     ),
     *  )
     *
     * @param UpdateDurationRequest $request
     *
     * @return JsonResponse
     */
    public function updateDuration(UpdateDurationRequest $request): JsonResponse
    {
        return $this->getExperienceService()->updateDuration($request);
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/profile/experience/delete",
     *      tags={"Experience"},
     *      summary="Удалить experience",
     *      description="Метод удаляет experience у пользователя",
     *      @OA\Parameter(
     *           name="user_id",
     *           description="наприер 1",
     *           required=true,
     *           in="query",
     *      ),
     *     @OA\Parameter(
     *           name="experience_id",
     *           description="наприер 1",
     *           required=true,
     *           in="query",
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Experience")
     *      ),
     *  )
     *
     * @param DeleteRequest $request
     *
     * @return JsonResponse
     */
    public function delete(DeleteRequest $request): JsonResponse
    {
        return $this->getExperienceService()->delete($request);
    }

    /**
     * @return ExperienceService
     */
    private function getExperienceService(): ExperienceService
    {
        return $this->experienceService;
    }
}
