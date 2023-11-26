<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @OA\Schema(
 *      title="User",
 *      description="User model",
 *      @OA\Xml(
 *          name="User"
 *      )
 *  )
 */
class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /** @var string */
    protected $table = 'users';

    /**
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'is_active',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
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
     *     title="first_name",
     *     description="Имя пользователя",
     *     example="Uma"
     * )
     *
     * @var string
     */
    private string $first_name;

    /**
     * @OA\Property(
     *     title="last_name",
     *     description="Фамилия пользователя",
     *     example="Thurman"
     * )
     *
     * @var string
     */
    private string $last_name;

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

    /**
     * @param Media|null $media
     *
     * @return void
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('avatar')
            ->fit(Manipulations::FIT_CROP, 50, 50)
            ->nonQueued();
    }

    /**
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * @return HasMany
     */
    public function portfolios(): HasMany
    {
        return $this->hasMany(Portfolio::class);
    }

    /**
     * @return BelongsToMany
     */
    public function experienceUsers(): BelongsToMany
    {
        return $this->belongsToMany(
            Experience::class,
            'experience_users',
            'user_id',
            'experience_id',
        )
            ->withPivot('duration')
            ->where('is_active', true)
            ->orderBy('duration', 'desc');
    }

    /**
     * @return BelongsToMany
     */
    public function availabilityUsers(): BelongsToMany
    {
        return $this->belongsToMany(
            Availability::class,
            'availability_users',
            'user_id',
            'availability_id',
        )
            ->where('is_active', true)
            ->orderBy('value');
    }

    /**
     * @return BelongsToMany
     */
    public function environmentPreferreds(): BelongsToMany
    {
        return $this->belongsToMany(
            EnvironmentPreferred::class,
            'environment_preferred_users',
            'user_id',
            'environment_id',
        )
            ->where('is_active', true)
            ->orderBy('value');
    }
}
