<?php

namespace Pyz\Zed\StoreLocations\Persistence;

use Orm\Zed\StoreLocations\Persistence\PyzStoreLocations;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;
use Generated\Shared\Transfer\StoreLocationsTransfer;


/**
 * @method StoreLocationsPersistenceFactory getFactory()
 */
class StoreLocationsRepository extends AbstractRepository implements StoreLocationsRepositoryInterface
{
    /**
     * @return array<mixed>|PyzStoreLocations[]
     */
    public function findPyzStoreLocations(): array
    {
        $StoreLocationsCollection = $this->getFactory()
            ->createStoreLocationsQuery()
            ->find();

        if (!empty($StoreLocationsCollection)) {
            $collection = [];
            foreach ($StoreLocationsCollection as $StoreLocationsEntity) {
                $collection[] = (new StoreLocationsTransfer())
                    ->fromArray($StoreLocationsEntity->toArray(), true);
            }

            return $collection;
        }

        return $StoreLocationsCollection;
    }


}
