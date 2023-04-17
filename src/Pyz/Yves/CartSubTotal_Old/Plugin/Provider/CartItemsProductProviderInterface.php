<?php

namespace Pyz\Yves\CartSubTotal\Plugin\Provider;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\ProductViewTransfer;

interface CartItemsProductProviderInterface
{
    /**
     * @param array<ItemTransfer> $cartItems
     * @param string $locale
     *
     * @return array<ProductViewTransfer>
     */
    public function getItemsProducts(array $cartItems, string $locale): array;
}
