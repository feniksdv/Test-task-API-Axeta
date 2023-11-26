<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      title="EnvironmentPreferredUser",
 *      description="EnvironmentPreferredUser model",
 *      @OA\Xml(
 *          name="EnvironmentPreferredUser"
 *      )
 *  )
 */
class EnvironmentPreferredUser extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'environment_preferred_users';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'environment_id',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'user_id' => 'integer',
        'environment_id' => 'integer',
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
     *     title="environment_id",
     *     description="ID связаной сущности",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private int $environment_id;

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
