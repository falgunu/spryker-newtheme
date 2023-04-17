<?php

namespace Pyz\Zed\StoreLocations\Communication;

use Orm\Zed\StoreLocations\Persistence\PyzStoreLocationsQuery;
use Pyz\Zed\StoreLocations\Business\Model\TransactionModel;
use Pyz\Zed\StoreLocations\Communication\Table\StoreLocationsTable;
use Pyz\Zed\StoreLocations\Form\StoreLocationsFormType;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Symfony\Component\Form\FormInterface;

class StoreLocationsCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return StoreLocationsTable
     */
    public function createStoreLocationsTable(): StoreLocationsTable
    {
        return new StoreLocationsTable($this->createStoreLocationsQuery());
    }

    /**
     * @return PyzStoreLocationsQuery
     */
    public function createStoreLocationsQuery(): PyzStoreLocationsQuery
    {
        return PyzStoreLocationsQuery::create();
    }

    /**
     * @return FormInterface
     */
    public function createStoreLocationsForm(): FormInterface
    {
        return $this->getFormFactory()->create(StoreLocationsFormType::class);
    }

    /**
     * @return TransactionModel
     **/
    public function transactionModel(): TransactionModel
    {
        return new TransactionModel();
    }

    // /**
    //  * @return \Symfony\Component\Form\FormFactory
    //  */
    // public function getFormFactory()
    // {
    //     return $this->getProvidedDependency(ApplicationConstants::FORM_FACTORY);
    // }
}
