<?php

namespace Pyz\Client\StoreLocations;

use Generated\Shared\Transfer\StorelocationsqueryTransfer;

interface StoreLocationsClientInterface
{
    /**
     * @param StorelocationsqueryTransfer $storelocationsqueryTransfer
     * @return mixed
     */
public function searchstoredetails(StorelocationsqueryTransfer $storelocationsqueryTransfer);
}
