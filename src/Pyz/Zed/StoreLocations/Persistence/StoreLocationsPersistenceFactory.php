<?php

namespace Pyz\Zed\StoreLocations\Persistence;

use Orm\Zed\StoreLocations\Persistence\PyzStoreLocationsQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class StoreLocationsPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return PyzStoreLocationsQuery
     */
    public function createStoreLocationsQuery(): PyzStoreLocationsQuery
    {
        return PyzStoreLocationsQuery::create();
    }
}
