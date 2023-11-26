<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Axeta OpenApi Documentation",
 *      description="Документация для API",
 *      @OA\Contact(
 *          email=L5_SWAGGER_CONST_EMAIL
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Основной API"
 * )
 *
 * @OA\Tag(
 *     name="Experience",
 *     description="Справочник"
 * )
 *
 * @OA\Tag(
 *      name="Location",
 *      description="Получение координат по адресу"
 *  )
 *
 * @OA\Tag(
 *      name="Profile",
 *      description="Профиль пользователя"
 *  )
 *
 * @OA\Tag(
 *      name="User",
 *      description="Пользователь"
 *  )
 *
 * @OA\Tag(
 *       name="Avatar",
 *       description="Получение изменение Avatar"
 *   )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
