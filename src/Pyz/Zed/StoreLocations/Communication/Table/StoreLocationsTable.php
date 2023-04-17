<?php

namespace Pyz\Zed\StoreLocations\Communication\Table;

use Orm\Zed\StoreLocations\Persistence\Base\PyzStoreLocationsQuery;
use Orm\Zed\StoreLocations\Persistence\Map\PyzStoreLocationsTableMap;
use phpseclib3\Crypt\EC\BaseCurves\Binary;
use Spryker\Service\UtilText\Model\Url\Url;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class StoreLocationsTable extends AbstractTable

{

    /**
     * @var string
     */
    public const TABLE_COL_ACTIONS = 'Actions';

    const URL_PARAM_ID_STORE = 'id-store';
    const TABLE_COL_IMAGES = 'Store Image';
    /**
     * @var PyzStoreLocationsQuery
     */
    protected PyzStoreLocationsQuery $pyzStoreLocationsQuery;

    /**
     * @param PyzStoreLocationsQuery $pyzStoreLocationsQuery
     */
    public function __construct(PyzStoreLocationsQuery $pyzStoreLocationsQuery)
    {
        $this->pyzStoreLocationsQuery = $pyzStoreLocationsQuery;
    }

    /**
     * @param TableConfiguration $config
     *
     * @return TableConfiguration
     */
    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            PyzStoreLocationsTableMap::COL_STORENAME => 'Store Name',
            static::TABLE_COL_IMAGES=> static::TABLE_COL_IMAGES,
            PyzStoreLocationsTableMap::COL_STREET => 'Street',
            PyzStoreLocationsTableMap::COL_CITY => 'City',
            PyzStoreLocationsTableMap::COL_REGION => 'Region/State',
            PyzStoreLocationsTableMap::COL_COUNTRY => 'Country',
            PyzStoreLocationsTableMap::COL_ZIPCODE => 'Zip Code',
            PyzStoreLocationsTableMap::COL_LATITUDE => 'Latitude',
            PyzStoreLocationsTableMap::COL_LONGITUDE => 'Longitude',
            static::TABLE_COL_ACTIONS => static::TABLE_COL_ACTIONS

        ]);
        $config->setSearchable([
            PyzStoreLocationsTableMap::COL_STORENAME,
            PyzStoreLocationsTableMap::COL_CITY,
            PyzStoreLocationsTableMap::COL_ZIPCODE
        ]);
        $config->addRawColumn(static::TABLE_COL_ACTIONS);
        $config->addRawColumn(static::TABLE_COL_IMAGES);
        return $config;
    }

    /**
     * @param TableConfiguration $config
     * @return array
     */
    protected function preparedata(TableConfiguration $config): array
    {
        $queryResult = $this->runQuery($this->pyzStoreLocationsQuery, $config);
        $results = [];
        foreach ($queryResult as $resultItem) {
            $results[] = [
                static::TABLE_COL_IMAGES=> $this->getstoreimage($resultItem[PyzStoreLocationsTableMap::COL_STOREIMAGE]),
                PyzStoreLocationsTableMap::COL_STORENAME => $resultItem[PyzStoreLocationsTableMap::COL_STORENAME],
                PyzStoreLocationsTableMap::COL_STREET => $resultItem[PyzStoreLocationsTableMap::COL_STREET],
                PyzStoreLocationsTableMap::COL_CITY => $resultItem[PyzStoreLocationsTableMap::COL_CITY],
                PyzStoreLocationsTableMap::COL_REGION => $resultItem[PyzStoreLocationsTableMap::COL_REGION],
                PyzStoreLocationsTableMap::COL_COUNTRY => $resultItem[PyzStoreLocationsTableMap::COL_COUNTRY],
                PyzStoreLocationsTableMap::COL_ZIPCODE => $resultItem[PyzStoreLocationsTableMap::COL_ZIPCODE],
                PyzStoreLocationsTableMap::COL_LATITUDE => $resultItem[PyzStoreLocationsTableMap::COL_LATITUDE],
                PyzStoreLocationsTableMap::COL_LONGITUDE => $resultItem[PyzStoreLocationsTableMap::COL_LONGITUDE],
                static::TABLE_COL_ACTIONS => $this->getActionButtons(base64_encode($resultItem[PyzStoreLocationsTableMap::COL_IDSTORE]))
            ];
        }
        return $results;
    }

    /**
     * @param string $resultItem
     * @return string
     */
    private function getActionButtons(string $resultItem): string
    {
        $buttons = [];
        $buttons[] = $this->createEditButton($resultItem);
        $buttons[] = $this->createDeleteButton($resultItem);


        return implode(' ', $buttons);
    }

    /**
     * @param string $resultItem
     * @return string
     */
    private function createEditButton(string $resultItem): string
    {
        $editUrl = Url::generate(
            '/store-locations/store/editstore',
            [
                static::URL_PARAM_ID_STORE => $resultItem,
            ],
        );

        return $this->generateEditButton($editUrl, 'Edit Store');
    }

    /**
     * @param string $resultItem
     * @return string
     */
    private function createDeleteButton(string $resultItem): string
    {
        $deleteUrl = Url::generate(
            '/store-locations/store/deletestore',
            [
                static::URL_PARAM_ID_STORE => $resultItem,
            ],
        );
        return $this->generateRemoveButton($deleteUrl, 'Delete Store');

    }

    /**
     * @param  $image
     * @return string
     */
    private function getstoreimage($image):string
    {
        return '<img src="data:image/*;base64,'.$image.'" class="img-responsive" alt="store-image"></img>';
    }
}
