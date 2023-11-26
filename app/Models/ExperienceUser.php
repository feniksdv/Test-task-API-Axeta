<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      title="ExperienceUser",
 *      description="ExperienceUser model",
 *      @OA\Xml(
 *          name="ExperienceUser"
 *      )
 *  )
 */
class ExperienceUser extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'experience_users';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'experience_id',
        'duration',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'user_id' => 'integer',
        'experience_id' => 'integer',
        'duration' => 'float',
    ];

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private int $id;

    /**
     * @OA\Property(
     *     title="user_id",
     *     description="ID пользователя",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private int $user_id;

    /**
     * @OA\Property(
     *     title="experience_id",
     *     description="ID связаной сущности",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private int $experience_id;

    /**
     * @OA\Property(
     *     title="duration",
     *     description="Ко-во лет опыта",
     *     format="double(3,1)",
     *     example=1
     * )
     *
     * @var float
     */
    private float $duration;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     format="datetime",
     *     example="2021-11-18 08:48:59",
     *     type="string"
     * )
     *
     * @var Carbon
     */
    private carbon $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     format="datetime",
     *     example="2021-11-18 08:48:59",
     *     type="string"
     * )
     *
     * @var Carbon
     */
    private carbon $updated_at;
}
