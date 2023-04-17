<?php

namespace Pyz\Zed\StoreLocations\Communication\Controller;

use Propel\Runtime\Exception\PropelException;
use Pyz\Zed\StoreLocations\Business\StoreLocationsFacadeInterface;
use Pyz\Zed\StoreLocations\Communication\StoreLocationsCommunicationFactory;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method StoreLocationsCommunicationFactory getFactory()
 */
class StoreController extends AbstractController
{
    /**
     * @return array
     */
    public function indexAction(): array
    {

        $table = $this->getFactory()->createStoreLocationsTable();
        return [
            'StoreLocations' => $table->render()
        ];
    }

    /**
     * @return JsonResponse
     */
    public function tableAction(): JsonResponse
    {
        $table = $this->getFactory()->createStoreLocationsTable();
        return $this->jsonResponse(
            $table->fetchData()
        );
    }

    /**
     * @param Request $request
     * @method StoreLocationsFacadeInterface getFacade()
     * method to add new store
     * @return array|RedirectResponse
     * @throws PropelException
     */
    public function addnewstoreAction(Request $request)
    {
        $countryname = $this->getCountrylist();
        // //Redirect Url to Store Add Form
        $actionurl = '/store-locations/store/addnewstore?type=Add';
        $redirecturl = '/store-locations/store/addnewstore';
        //Checking type to process form data and initiate database transaction
        if ($request->query->get('type') !== null && $request->query->get('type') == 'Add') {
            //Form data
            $storeformdata = $this->formdata($request);
            $transactionobj = $this->getFactory()->transactionModel();
            // Initiate DB Transaction
            $initdb = $transactionobj->saveformdata($storeformdata);
            //checking return response of $initdb 0:1 bool
            if ($initdb) {
                $message = $storeformdata['storename'] . " Store added successfully!";
                $this->addSuccessMessage($message);
            } else {
                $message = "Some Error Occurred!";
                $this->addErrorMessage($message);
            }
            return new RedirectResponse($redirecturl);
        }
        //view response for add store form -> store/addnewstore.twig
        return $this->viewResponse(['addnewstore' => 'Add New Store', 'actionurl' => $actionurl, 'country' => $countryname]);
    }

    /**
     * @param Request $request
     * method to edit store
     * @return array|RedirectResponse
     * @throws PropelException
     */
    public function editstoreAction(Request $request)
    {
        $storeid = base64_decode($request->query->get('id-store'));
        $countryname = $this->getCountrylist();
        //Redirect Url to Store Add Form
        $actionurl = '/store-locations/store/editstore?type=edit&id=' . $storeid;
        $redirecturl = '/store-locations/store/';
        if ($request->query->get('type') !== null && $request->query->get('type') == 'edit') {
            // Formdata
            $storeformdata = $this->formdata($request);
            $id = $request->query->get('id');
            $initupdate = $this->getFactory()->transactionModel()->updatestoredata($id, $storeformdata);
            //checking return response of $initupdate 0:1 bool
            if ($initupdate) {
                $message = "Store updated successfully!";
                $this->addSuccessMessage($message);
            } else {
                $message = "Some Error Occurred!";
                $this->addErrorMessage($message);
            }
            return new RedirectResponse($redirecturl);
        }
        $storedata = $this->getFactory()->transactionModel()->getspecificstoreData($storeid);

        return $this->viewResponse(['editstore' => 'Edit Store', 'actionurl' => $actionurl, 'country' => $countryname, 'storedata' => $storedata]);
    }

    /**
     * @param Request $request
     * method to delete store
     * @return RedirectResponse
     * @throws PropelException
     */
    public function deletestoreAction(Request $request): RedirectResponse
    {
        $redirecturl = '/store-locations/store/';
        if ($request->query->get('id-store') !== null) {
            $storeid = base64_decode($request->query->get('id-store'));
        } else {
            return new RedirectResponse($redirecturl);
        }
        $deleterow = $this->getFactory()->transactionModel()->deletestore($storeid);
        if ($deleterow) {
            $message = "Store removed successfully!";
            $this->addSuccessMessage($message);
        } else {
            $message = "Some Error Occurred!";
            $this->addErrorMessage($message);
        }
        return new RedirectResponse($redirecturl);
    }

    /**
     * @return array<mixed>
     */
    public function getCountrylist(): array
    {
        return $this->getFactory()->transactionModel()->getcountries();
    }

    /**
     * @param array $filedata
     * @return string
     */
    public function fileuploader(array $filedata): string
    {
        $file = $filedata['file'];
        return base64_encode(file_get_contents($file));

    }

    /**
     * @param $request
     * @return array
     */
    public function formdata($request): array
    {
        $filedata = [
            'file' => $request->files->get('storeimage')
        ];

        $storeformdata = [
            'storename' => $request->request->get('storename'),
            'city' => $request->request->get('city'),
            'street' => $request->request->get('street'),
            'region' => $request->request->get('region'),
            'zipcode' => $request->request->get('zipcode'),
            'country' => $request->request->get('country'),
            'latitude' => $request->request->get('latitude'),
            'longitude' => $request->request->get('longitude'),
        ];

        if ($request->files->get('storeimage') !== null) {
            $storeformdata['storeimage'] = $this->fileuploader($filedata);
        }
        return $storeformdata;
    }
}
