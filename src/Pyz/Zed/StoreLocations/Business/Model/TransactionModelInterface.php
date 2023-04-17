<?php

namespace Pyz\Zed\StoreLocations\Business\Model;

use Generated\Shared\Transfer\StoreLocationsdataTransfer;
use Generated\Shared\Transfer\StorelocationsqueryTransfer;
use Generated\Shared\Transfer\StoreLocationsTransfer;
use Orm\Zed\StoreLocations\Persistence\PyzStoreLocations;
use Orm\Zed\StoreLocations\Persistence\PyzStoreLocationsQuery;

interface TransactionModelInterface
{
    /**
     * @return PyzStoreLocations
     */
    public function createStoreLocationObj(): PyzStoreLocations;

    /**
     * @return PyzStoreLocationsQuery
     */
    public function createStoreLocationsQuery(): PyzStoreLocationsQuery;

    /**
     * @param $data
     * @return bool
     */
    public function saveformdata($data): bool;

    /**
     * @return array
     */
    public function getcountries(): array;

    /**
     * @param int $id
     * @return object
     */
    public function getspecificstoreData(int $id): object;

    /**
     * @param int $id
     * @return bool
     */
    public function deletestore(int $id): bool;

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updatestoredata(int $id, array $data): bool;

    /**
     * @param StorelocationsqueryTransfer $storelocationsqueryTransfer
     * @return array
     */
    public function getstoredetails(StorelocationsqueryTransfer $storelocationsqueryTransfer):array;
}
