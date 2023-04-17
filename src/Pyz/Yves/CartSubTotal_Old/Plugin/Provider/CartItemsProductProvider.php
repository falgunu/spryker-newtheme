<?php

namespace Pyz\Yves\CartSubTotal\Plugin\Provider;

use Generated\Shared\Transfer\ItemTransfer;
use SprykerShop\Yves\CartPage\Dependency\Client\CartPageToProductStorageClientInterface;

class CartItemsProductProvider implements CartItemsProductProviderInterface
{
    /**
     * @var CartPageToProductStorageClientInterface
     */
    protected $productStorageClient;

    /**
     * @param CartPageToProductStorageClientInterface $productStorageClient
     */
    public function __construct(CartPageToProductStorageClientInterface $productStorageClient)
    {
        $this->productStorageClient = $productStorageClient;
    }

    /**
     * @param array<ItemTransfer> $cartItems
     * @param string $locale
     *
     * @return array<\Generated\Shared\Transfer\ProductViewTransfer>
     */
    public function getItemsProducts(array $cartItems, string $locale): array
    {
        $productBySku = [];

        foreach ($cartItems as $item) {
            $productBySku[$item->getSku()] = $this->productStorageClient->findProductAbstractViewTransfer(
                $item->getIdProductAbstract(),
                $locale,
            );
        }

        return $productBySku;
    }
}
