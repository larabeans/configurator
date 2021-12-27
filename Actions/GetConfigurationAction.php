<?php

namespace App\Containers\Vendor\Configurationer\Actions;

use Illuminate\Support\Facades\Auth;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use App\Containers\Vendor\Configurationer\Tasks\GetConfigurationTask;
use App\Ship\Exceptions\AuthenticationException;

class GetConfigurationAction extends Action
{
    public function run(Request $request, $key)
    {
        // Auth::check() will not work here, because this route is excluded from auth:api middleware
        // We are are called api guard here implicitly, to verify authenticated user
        if(configurationer()::authenticate($key) && !Auth::guard('api')->check()) {
            throw new AuthenticationException();
        }

        if(configurationer()::exists($key)) {
            if($task = configurationer()::getTask($key, 'get')){
                return app($task)->run($request, $key);
            }
        }

        // run default task, expect id
        return $this->runDefault($request, $key);

    }


    private function runDefault(Request $request, $key)
    {
        // run default task, expect id
        return app(GetConfigurationTask::class)->run($request, $key);
    }


}
