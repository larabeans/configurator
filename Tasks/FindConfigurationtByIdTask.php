<?php

namespace App\Containers\Vendor\Configurationer\Tasks;

use Exception;
use App\Ship\Parents\Tasks\Task;
use App\Containers\Vendor\Configurationer\Data\Repositories\ConfigurationRepository;



class FindConfigurationtByIdTask extends Task
{
    protected ConfigurationRepository $repository;

    public function __construct(ConfigurationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->findWhere(['id' => $id])->first();
        } catch (Exception $exception) {
            throw new NotFoundException($exception);
        }
    }
}
