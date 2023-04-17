<?php

namespace Pyz\Yves\CartSubTotal;

use Pyz\Yves\CartSubTotal\Plugin\Provider\CartItemsProductProvider;
use Pyz\Yves\CartSubTotal\Plugin\Provider\CartItemsProductProviderInterface;
use SprykerShop\Yves\CartPage\CartPageFactory as SprykerCartPageFactory;

class CartSubTotalFactory extends SprykerCartPageFactory
{
    /**
     * @return CartItemsProductProviderInterface
     */
    public function createPyzCartItemsProductsProvider(): CartItemsProductProviderInterface
    {
        return new CartItemsProductProvider(
            $this->getProductStorageClient()
        );
    }
    public function getCartSubtotal(){
        $cartClient=getFactory()->getCartClient();
    }
}
