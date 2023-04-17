<?php

namespace Pyz\Yves\StoreLocations;

use Pyz\Yves\StoreLocations\Form\StoreLocationsForm;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormInterface;

class StoreLocationsFactory extends AbstractFactory
{
    /**
     * @return FormInterface
     * @throws ContainerKeyNotFoundException
     */
    public function createStoreLocationsForm(): FormInterface
    {
        return $this->getFormFactory()->create(StoreLocationsForm::class);
    }

    /**
     * @return FormFactory
     * @throws ContainerKeyNotFoundException
     */

    public function getFormFactory(): FormFactory
    {
        return $this->getProvidedDependency(ApplicationConstants::FORM_FACTORY);
    }

}
