<?php

namespace Pyz\Client\StoreLocations\Zed;

use Generated\Shared\Transfer\StorelocationsqueryTransfer;
use Generated\Shared\Transfer\StoreLocationsTransfer;
use Spryker\Shared\Kernel\Transfer\TransferInterface;

interface StoreLocationsStubInterface
{
    /**
     * @param StorelocationsqueryTransfer $storelocationsqueryTransfer
     * @return TransferInterface
     */
public function searchstoredetails(StorelocationsqueryTransfer $storelocationsqueryTransfer):TransferInterface;
}
