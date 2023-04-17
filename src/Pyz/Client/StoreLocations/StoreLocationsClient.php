<?php

namespace Pyz\Client\StoreLocations;

use Generated\Shared\Transfer\StorelocationsqueryTransfer;
use Generated\Shared\Transfer\StoreLocationsTransfer;
use Spryker\Client\Kernel\AbstractClient;
use Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Spryker\Shared\Kernel\Transfer\TransferInterface;

/**
* @method StoreLocationsFactory getFactory()
*/
class StoreLocationsClient extends AbstractClient implements StoreLocationsClientInterface
{

    /**
     * @param StorelocationsqueryTransfer $storelocationsqueryTransfer
     * @return TransferInterface
     * @throws ContainerKeyNotFoundException
     */
    public function searchstoredetails(StorelocationsqueryTransfer $storelocationsqueryTransfer): TransferInterface
    {
        return $this->getFactory()->createZedStub()->searchstoredetails($storelocationsqueryTransfer);
    }
}
