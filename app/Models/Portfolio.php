<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      title="Portfolio",
 *      description="Portfolio model",
 *      @OA\Xml(
 *          name="Portfolio"
 *      )
 *  )
 */
class Portfolio extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'portfolios';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'value',
    ];
    
    /**
     * @var string[]
     */
    protected $casts = [
        'user_id' => 'integer',
        'value' => 'string',
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
     *     title="value",
     *     description="Значение параметра",
     *     example="Internship"
     * )
     *
     * @var string
     */
    private string $value;

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
