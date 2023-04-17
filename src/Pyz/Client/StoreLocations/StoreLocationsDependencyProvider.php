<?php

namespace Pyz\Client\StoreLocations;

use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class StoreLocationsDependencyProvider extends AbstractDependencyProvider
{
    const CLIENT_ZED_REQUEST = 'CLIENT_ZED_REQUEST';

    /**
     * @param Container $container
     * @return Container|null
     */
    public function provideServiceLayerDependencies(Container $container): ?Container
    {
        return $this->addZedRequestClient($container);
    }

    /**
     * @param Container $container
     * @return Container
     */
    private function addZedRequestClient(Container $container): Container
    {
        $container[self::CLIENT_ZED_REQUEST] = function (Container $container) {
            return $container->getLocator()->zedRequest()->client();
        };

        return $container;
    }


}
