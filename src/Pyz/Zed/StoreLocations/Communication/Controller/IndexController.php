<?php

namespace Pyz\Zed\StoreLocations\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    /**
     * @param Request $request
     * 
     * @return Response $response
     */
    public function indexAction(Request $request): Response
    {
        return new RedirectResponse('/store-locations/store');
    }
}
