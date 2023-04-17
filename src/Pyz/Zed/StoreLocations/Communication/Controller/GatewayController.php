<?php

namespace Pyz\Zed\StoreLocations\Communication\Controller;

use Generated\Shared\Transfer\StoreLocationsdataTransfer;
use Generated\Shared\Transfer\StorelocationsqueryTransfer;
use Pyz\Zed\StoreLocations\Communication\StoreLocationsCommunicationFactory;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;


/**
 * @method StoreLocationsCommunicationFactory getFactory()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     * @param StorelocationsqueryTransfer $storelocationsqueryTransfer
     * @return StoreLocationsdataTransfer
     * @throws AmbiguousComparisonException
     */
    public function searchstoredetailsAction(StorelocationsqueryTransfer $storelocationsqueryTransfer): StoreLocationsdataTransfer
    {
        $data = $storelocationsqueryTransfer->modifiedToArray();
        $responsedata = $this->getFactory()->transactionModel()->getstoredetails($storelocationsqueryTransfer);
//        return new StoreLocationsTransfer(t)
        $response = new StoreLocationsdataTransfer();
        $response->setData($responsedata);
        return $response;
    }
}
