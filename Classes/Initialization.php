<?php

namespace Mediatis\FormrelayOnetrustProvider;

use FormRelay\Core\Service\RegistryInterface;
use Mediatis\FormrelayOnetrustProvider\DataProvider\OneTrustDataProvider;

class Initialization
{
    public function initialize(RegistryInterface $registry)
    {
        $registry->registerDataProvider(OneTrustDataProvider::class);
    }
}
