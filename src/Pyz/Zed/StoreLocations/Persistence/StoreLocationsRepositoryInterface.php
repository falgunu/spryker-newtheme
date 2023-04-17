<?php

namespace Pyz\Zed\StoreLocations\Persistence;

use Orm\Zed\StoreLocations\Persistence\PyzStoreLocations;

interface StoreLocationsRepositoryInterface
{
    /**
     * @return array|PyzStoreLocations[]
     */
    public function findPyzStoreLocations(): array;

}
