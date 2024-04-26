<?php

/**
 * @license Apache 2.0
 */

namespace Docs\Default;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     description="Terajus API documentation",
 *     version="1.0.0",
 *     title="Terajus API Documentation",
 *     termsOfService="http://swagger.io/terms/",
 *
 *     @OA\Contact(
 *         email="contato@terafusion.com.br"
 *     ),
 *
 *     @OA\License(
 *         name="Terafusion Tecnologia",
 *         url="https://terafusion.com.br"
 *     )
 * )
 *
 * @OA\Server(
 *     description="Terajus API",
 *     url="https://baseurl/api"
 * )
 *
 * @OA\ExternalDocumentation(
 *     description="Find out more about Swagger",
 *     url="http://swagger.io"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     description="Bearer token authentication",
 *     name="Bearer",
 *     in="header",
 *     scheme="bearer"
 * )
 */
class Info
{
}
