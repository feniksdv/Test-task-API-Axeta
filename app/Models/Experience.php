<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      title="Experience",
 *      description="Experience model",
 *      @OA\Xml(
 *          name="Experience"
 *      )
 *  )
 */
class Experience extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'experiences';

    /**
     * @var string[]
     */
    protected $fillable = [
        'value',
        'is_active',
    ];
    
    /**
     * @var string[]
     */
    protected $casts = [
        'value' => 'string',
        'is_active' => 'boolean',
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
     *     title="Is Active",
     *     description="Включен ли пользователь",
     *     example="true/false"
     * )
     *
     * @var boolean
     */
    private bool $is_active;

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
