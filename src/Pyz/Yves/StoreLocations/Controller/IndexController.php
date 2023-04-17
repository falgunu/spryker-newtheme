<?php

namespace Pyz\Yves\StoreLocations\Controller;

use Generated\Shared\Transfer\StorelocationsqueryTransfer;
use Pyz\Client\StoreLocations\StoreLocationsClientInterface;
use Pyz\Yves\StoreLocations\StoreLocationsFactory;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Spryker\Yves\Kernel\View\View;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method StoreLocationsClientInterface getClient();
 * @method StoreLocationsFactory getFactory();
 */
class IndexController extends AbstractController
{
    /**
     * @param Request $request
     * @return View
     * @throws ContainerKeyNotFoundException
     */
    public function indexAction(Request $request): View
    {
        $storeLocationsForm = $this->getFactory()->createStoreLocationsForm()->handleRequest($request);
        $templatedata = [];
        $templatedata['storeLocationsForm'] = $storeLocationsForm->createView();
        if ($storeLocationsForm->isSubmitted() && $storeLocationsForm->isValid()) {
            $formData = $storeLocationsForm->getData();
            $storelocationsdata = $this->getStoreDataonQuery($formData);
            if(empty($storelocationsdata)){
                $this->addErrorMessage('No Store Found at this zip/location');
            }
            $templatedata['storedata'] = $storelocationsdata;
        }
        return $this->view(
            $templatedata,
            [],
            '@StoreLocations/views/store/index.twig'
        );
    }

    /**
     * @param array $data
     * @return mixed
     */

    public function getStoreDataonQuery(array $data): array
    {
        $storelocationsquerytransfer = new StorelocationsqueryTransfer();
        $storelocationsquerytransfer->setQuery($data);
        return ($this->getClient())->searchstoredetails($storelocationsquerytransfer)->getData();
    }
}
