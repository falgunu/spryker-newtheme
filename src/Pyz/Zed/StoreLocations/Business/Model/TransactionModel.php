<?php

namespace Pyz\Zed\StoreLocations\Business\Model;

use Generated\Shared\Transfer\StorelocationsqueryTransfer;
use Orm\Zed\Country\Persistence\SpyCountryQuery;
use Orm\Zed\StoreLocations\Persistence\PyzStoreLocations;
use Orm\Zed\StoreLocations\Persistence\PyzStoreLocationsQuery;
use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;
//upselling,cross sell,related on pdp |volume prices
class TransactionModel implements TransactionModelInterface
{
    /**
     * @return PyzStoreLocationsQuery
     */
    public function createStoreLocationsQuery(): PyzStoreLocationsQuery
    {
        return PyzStoreLocationsQuery::create();
    }

    /**
     * @throws PropelException
     */
    public function saveformdata($data): bool
    {
        $tableobject = $this->createStoreLocationObj();
        foreach ($data as $fieldname => $value) {
            $method = 'set' . $fieldname;
            $tableobject->$method($value);
        }
        return $tableobject->save();
    }

    /**
     * @return array
     */
    public function getcountries(): array
    {
        $country = SpyCountryQuery::create()->find();
        $result = [];
        foreach ($country as $name) {
            $result[] = $name->getName();
        }
        return $result;

    }

    /**
     * @param int $id
     * @return object
     */
    public function getspecificstoreData(int $id): object
    {
        return $this->createStoreLocationsQuery()->findOneByIdstore($id);
    }

    /**
     * @param int $id
     * @return bool
     * @throws PropelException
     */
    public function deletestore(int $id): bool
    {
        $init = $this->createStoreLocationsQuery()->findOneByIdstore($id);
        $init->delete();
        return true;
    }


    /**
     * @return PyzStoreLocations
     */
    public function createStoreLocationObj(): PyzStoreLocations
    {
        return new PyzStoreLocations();
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     * @throws PropelException
     */
    public function updatestoredata(int $id, array $data): bool
    {
        $init = $this->createStoreLocationsQuery()->findOneByIdstore($id);
        foreach ($data as $fieldname => $value) {
            $method = 'set' . $fieldname;
            $init->$method($value);
        }
        return $init->save();
    }

    /**
     * @param StorelocationsqueryTransfer $storelocationsqueryTransfer
     * @return array
     * @throws AmbiguousComparisonException
     */
    public function getstoredetails(StorelocationsqueryTransfer $storelocationsqueryTransfer): array
    {
        $data = $storelocationsqueryTransfer->modifiedToArray();
        $querydata = $data['query']['query'];
        $result = [];
        $queryobj = $this->createStoreLocationsQuery();
        if (is_numeric($querydata)) {
            $resultdata = $queryobj->filterByZipcode($querydata)->find();
        } else {
            $resultdata = $queryobj->filterByCity($querydata)->find();
        }
        if (!empty($resultdata)) {
            foreach ($resultdata as $tablerows) {
                $result[] = $tablerows->toArray();
            }
            return $result;
        }

        return $result;
    }
}
