<?php

/**
 * @apiGroup           Configuration
 * @apiName            defaultConfiguration
 *
 * @api                {GET} /v1/configurations Get Default Configurations
 * @apiDescription     Shoe the response configurations
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  "Configuration":{
 *     "Language":"Urdu",
 *     "Currency":"PKR",
 *       .
 *       .
 *       .
 * }
}
 */

use App\Containers\AppSection\Configurationer\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('configurations', [Controller::class, 'defaultConfiguration'])
    ->name('api_configuration_default_configuration')
    ->middleware(['auth:api']);

