<?php
namespace Pyz\Zed\StoreLocations\Persistence;

use Generated\Shared\Transfer\StoreLocationsTransfer;
use Orm\Zed\StoreLocations\Persistence\PyzStoreLocations;

use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;


class StoreLocationsEntityManager extends AbstractEntityManager implements StoreLocationsEntityManagerInterface
{
    /**
     * @param StoreLocationsTransfer $storeLocationsTransfer
     * @return bool
     * @throws PropelException
     */
    public function saveStoreLocationsEntity(StoreLocationsTransfer $storeLocationsTransfer): bool
    {
        $storeLocationsEntity = new PyzStoreLocations();
        $storeLocationsEntity->fromArray($storeLocationsTransfer->modifiedToArray());

        return (bool) $storeLocationsEntity->save();
    }
}
