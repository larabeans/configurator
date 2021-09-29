<?php

namespace App\Containers\AppSection\Configurationer\Actions;

use App\Containers\AppSection\Configurationer\Models\Configuration;
use App\Containers\AppSection\Configurationer\Tasks\UpdateConfigurationerTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdateConfigurationerAction extends Action
{
    public function run(Request $request): Configuration
    {
        $data =[
           'configuration'=> json_encode($request->configuration)
        ];
        //dd($data);

        return app(UpdateConfigurationerTask::class)->run($request->id, $data);
    }
}
