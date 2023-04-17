<?php

namespace Pyz\Client\StoreLocations;

use Pyz\Client\StoreLocations\Zed\StoreLocationsStub;
use Pyz\Client\StoreLocations\Zed\StoreLocationsStubInterface;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class StoreLocationsFactory extends AbstractFactory
{
    /**
     * @return StoreLocationsStubInterface
     * @throws ContainerKeyNotFoundException
     */
public function createZedStub(): StoreLocationsStub
{
    return new StoreLocationsStub($this->getZedRequestClient());
}

    /**
     * @return ZedRequestClientInterface
     * @throws ContainerKeyNotFoundException
     */
    private function getZedRequestClient(): ZedRequestClientInterface
    {
        return $this->getProvidedDependency(StoreLocationsDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
