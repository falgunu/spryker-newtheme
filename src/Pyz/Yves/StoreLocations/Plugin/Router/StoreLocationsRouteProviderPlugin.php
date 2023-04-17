<?php

namespace Pyz\Yves\StoreLocations\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;

class StoreLocationsRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    protected const ROUTE_CONTACT_US_INDEX = 'store-locations-index';

    /**
     *
     * @param RouteCollection $routeCollection
     *
     * @return RouteCollection
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        return $this->addStoreLocationsIndexRoute($routeCollection);
    }

    /**
     * @param RouteCollection $routeCollection
     *
     * @return RouteCollection
     */
    protected function addStoreLocationsIndexRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/store-locations', 'StoreLocations', 'Index', 'indexAction');
        $route = $route->setMethods(['GET', 'POST']);
        $routeCollection->add(static::ROUTE_CONTACT_US_INDEX, $route);

        return $routeCollection;
    }

}
