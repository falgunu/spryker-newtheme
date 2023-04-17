<?php


namespace Pyz\Zed\StoreLocations\Business;

use Pyz\Zed\StoreLocations\Persistence\StoreLocationsEntityManagerInterface;
use Pyz\Zed\StoreLocations\Persistence\StoreLocationsRepositoryInterface;
use Spryker\Zed\Kernel\Business\AbstractFacade;
use Generated\Shared\Transfer\StoreLocationsTransfer;

/**
 * @method StoreLocationsEntityManagerInterface getEntityManager()
 * @method StoreLocationsRepositoryInterface getRepository()
 *
 */
class StoreLocationsFacade extends AbstractFacade implements StoreLocationsFacadeInterface
{
    /**
     * @param StoreLocationsTransfer $storeLocationsTransfer
     *
     * @return bool
     */
    public function saveStoreLocationsData(StoreLocationsTransfer $storeLocationsTransfer): bool
    {
        return $this->getEntityManager()->saveStoreLocationsEntity($storeLocationsTransfer);
    }

    /**
     * @return array
     */
    public function getStoreLocationsData(): array
    {
        return $this->getRepository()->findPyzStoreLocations();
    }
}
