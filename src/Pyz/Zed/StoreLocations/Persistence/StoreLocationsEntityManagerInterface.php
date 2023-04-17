<?php

namespace Pyz\Zed\StoreLocations\Persistence;

use Generated\Shared\Transfer\StoreLocationsTransfer;

interface StoreLocationsEntityManagerInterface
{
    /**
     * @param StoreLocationsTransfer $storeLocationsTransfer
     *
     * Returns true if the message was saved
     * @return bool
     */
    public function saveStoreLocationsEntity(StoreLocationsTransfer $storeLocationsTransfer): bool;
}
