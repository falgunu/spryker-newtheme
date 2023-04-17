<?php

namespace Pyz\Yves\CartSubTotal\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;

class CartSubTotalRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    protected const ROUTE_CART_SUB_TOTAL_INDEX = 'sub-total';

    /**
     * Specification:
     * - Adds Routes to the RouteCollection.
     *
     * @param RouteCollection $routeCollection
     *
     * @return RouteCollection
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        return $this->addCartSubTotalIndexRoute($routeCollection);
    }

    protected function addCartSubTotalIndexRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/subtotal', 'CartSubTotal', 'Index', 'indexAction');
        $route = $route->setMethods(['GET', 'POST']);
        $routeCollection->add(static::ROUTE_CART_SUB_TOTAL_INDEX, $route);

        return $routeCollection;
    }
}
