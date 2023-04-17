<?php

namespace Pyz\Zed\StoreLocations;

use Pyz\Zed\StoreLocations\Form\StoreLocationsFormType;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\AbstractFactory;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Kernel\Dependency\Injector\DependencyInjector;
use Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException;
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
        return $this->getFormFactory()->create(StoreLocationsFormType::class);
    }

    /**
     * @return FormFactory
     * @throws ContainerKeyNotFoundException
     */
    public function getFormFactory(): FormFactory
    {
        return $this->getProvidedDependency(ApplicationConstants::FORM_FACTORY);
    }

    /**
     * @param AbstractBundleDependencyProvider $dependencyProvider
     * @param Container $container
     * @return Container
     */
    protected function provideExternalDependencies(AbstractBundleDependencyProvider $dependencyProvider, Container $container): Container
    {
        // TODO: Implement provideExternalDependencies() method.
    }

    /**
     * @param DependencyInjector $dependencyInjector
     * @param Container $container
     * @return Container
     */
    protected function injectExternalDependencies(DependencyInjector $dependencyInjector, Container $container): Container
    {
        // TODO: Implement injectExternalDependencies() method.
    }
}
