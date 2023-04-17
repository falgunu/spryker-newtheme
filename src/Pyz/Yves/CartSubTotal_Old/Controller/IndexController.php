<?php

namespace Pyz\Yves\CartSubTotal\Controller;

use Generated\Shared\Transfer\CartPageViewArgumentsTransfer;
use SprykerShop\Yves\CartPage\Controller\CartController as SprykerCartController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\CartSubTotal\CartSubTotalFactory getFactory()
 *
 */
class IndexController extends SprykerCartController
{
   public function indexAction(request $request)
    {
        $viewData = $this->executeIndexAction($request->get('selectedAttributes', []));
        $cur = $viewData['cart']['currency']['symbol'];
        $subTotal = $viewData['cart']['totals']['subtotal']/100;
        return new JsonResponse(['CartSubTotal' =>sprintf('%0.2f',$subTotal),"currency"=>$cur],200,['json']);
    }
    protected function executeIndexAction(array $selectedAttributes = []): array
    {
        $cartPageViewArgumentsTransfer = new CartPageViewArgumentsTransfer();
        $cartPageViewArgumentsTransfer->setLocale($this->getLocale())
            ->setSelectedAttributes($selectedAttributes);

        $viewData = $this->getFactory()->createCartPageView()->getViewData($cartPageViewArgumentsTransfer);

        $this->getFactory()
            ->getZedRequestClient()
            ->addResponseMessagesToMessenger();

        return $viewData;
    }
}
