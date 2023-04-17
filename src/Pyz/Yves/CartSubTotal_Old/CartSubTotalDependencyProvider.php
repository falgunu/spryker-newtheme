<?php

namespace Pyz\Yves\CartSubTotal;

use SprykerShop\Yves\CartPage\CartPageDependencyProvider as SprykerCartPageDependencyProvider;
use SprykerShop\Yves\CartPage\Dependency\Plugin\CartItemTransformerPluginInterface;
use SprykerShop\Yves\CartPageExtension\Dependency\Plugin\AddToCartFormWidgetParameterExpanderPluginInterface;
use SprykerShop\Yves\DiscountPromotionWidget\Plugin\CartPage\DiscountPromotionAddToCartFormWidgetParameterExpanderPlugin;
use SprykerShop\Yves\ProductBundleWidget\Plugin\CartPage\ProductBundleCartItemTransformerPlugin;

class CartSubTotalDependencyProvider extends SprykerCartPageDependencyProvider
{
    /**
     * @return array<CartItemTransformerPluginInterface>
     */
    protected function getCartItemTransformerPlugins(): array
    {
        return [
            new ProductBundleCartItemTransformerPlugin(),
        ];
    }

    /**
     * @return array<AddToCartFormWidgetParameterExpanderPluginInterface>
     */
    protected function getAddToCartFormWidgetParameterExpanderPlugins(): array
    {
        return [
            new DiscountPromotionAddToCartFormWidgetParameterExpanderPlugin(),
        ];
    }
}
