<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Objects\Point;

/**
 * @OA\Schema(
 *      title="Profile",
 *      description="Profile model",
 *      @OA\Xml(
 *          name="Profile"
 *      )
 *  )
 */
class Profile extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'profiles';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'address',
        'language',
        'sample_code',
        'amaizing',
        'clients_look',
        'location',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'user_id' => 'integer',
        'address' => 'string',
        'language' => 'string',
        'sample_code' => 'string',
        'amaizing' => 'string',
        'clients_look' => 'string',
        'location' => Point::class,
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
     *     title="address",
     *     description="Адрес место нахождения пользователя",
     *     example="Portland, Oregon, USA"
     * )
     *
     * @var string
     */
    private string $address;

    /**
     * @OA\Property(
     *     title="language",
     *     description="Язык пользователя",
     *     example="English"
     * )
     *
     * @var string
     */
    private string $language;

    /**
     * @OA\Property(
     *     title="sample_code",
     *     description="Пример кода",
     *     example="<div..."
     * )
     *
     * @var string
     */
    private string $sample_code;

    /**
     * @OA\Property(
     *     title="amaizing",
     *     description="The Most Amaizing...",
     *     example="The only true wisdom is in knowing you know nothing..."
     * )
     *
     * @var string
     */
    private string $amaizing;

    /**
     * @OA\Property(
     *     title="clients_look",
     *     description="In clients I look for...",
     *     example="There is only one good, knowledge, and one evil, ignorance."
     * )
     *
     * @var string
     */
    private string $clients_look;

    /**
     * @OA\Property(
     *     title="location",
     *     description="Координаты по адресу место нахождения пользователя",
     *     example="-122.587948 45.218387"
     * )
     *
     * @var Point
     */
    private Point $location;

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
