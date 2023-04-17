<?php

namespace Pyz\Client\StoreLocations\Zed;

use Generated\Shared\Transfer\StorelocationsqueryTransfer;
use Generated\Shared\Transfer\StoreLocationsTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;
use Spryker\Shared\Kernel\Transfer\TransferInterface;

class StoreLocationsStub implements StoreLocationsStubInterface
{
    /**
     * @var ZedRequestClientInterface
     */
    protected ZedRequestClientInterface $zedRequestClient;

    /**
     * @param ZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param StorelocationsqueryTransfer $storelocationsqueryTransfer
     * @return TransferInterface
     */
    public function searchstoredetails(StorelocationsqueryTransfer $storelocationsqueryTransfer): TransferInterface
    {
        return $this->zedRequestClient->call(
            '/store-locations/gateway/searchstoredetails',
            $storelocationsqueryTransfer
        );
    }
}
