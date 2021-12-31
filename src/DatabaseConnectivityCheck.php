<?php

namespace Alahaxe\HealthCheckBundle\Checks\Doctrine;

use Alahaxe\HealthCheck\Contracts\CheckInterface;
use Alahaxe\HealthCheck\Contracts\CheckStatusInterface;
use Alahaxe\HealthCheckBundle\CheckStatus;
use Doctrine\ORM\EntityManagerInterface;

class DatabaseConnectivityCheck implements CheckInterface
{
    public function __construct(
        protected EntityManagerInterface $entityManager
    ) {
    }

    public function check(): CheckStatusInterface
    {
        $status = CheckStatus::STATUS_OK;
        try {
            $this->entityManager->getConnection()->connect();
        } catch (\Exception $e) {
            $status = CheckStatus::STATUS_INCIDENT;
        }

        return new CheckStatus(
            'databaseConnectivity',
            __CLASS__,
            $status
        );
    }
}
