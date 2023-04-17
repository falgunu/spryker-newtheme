<?php

namespace Pyz\Yves\CartSubTotal;

use SprykerShop\Yves\CartPage\CartPageConfig as SprykerCartPageConfig;

class CartSubTotalConfig extends SprykerCartPageConfig
{
    /**
     * @var bool
     */
    protected const IS_CART_CART_ITEMS_VIA_AJAX_LOAD_ENABLED = true;

    /**
     * @var bool
     */
    protected const IS_LOADING_UPSELLING_PRODUCTS_VIA_AJAX_ENABLED = true;
}
