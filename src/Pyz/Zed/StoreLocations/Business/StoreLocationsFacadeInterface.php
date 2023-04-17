<?php
namespace Pyz\Zed\StoreLocations\Business;

use Generated\Shared\Transfer\StoreLocationsTransfer;

interface StoreLocationsFacadeInterface
{
    /**
     * @param StoreLocationsTransfer $storeLocationsTransfer
     *
     * @return bool
     */
    public function saveStoreLocationsData(StoreLocationsTransfer $storeLocationsTransfer): bool;

    /**
     * @return array
     */
    public function getStoreLocationsData(): array;
}
