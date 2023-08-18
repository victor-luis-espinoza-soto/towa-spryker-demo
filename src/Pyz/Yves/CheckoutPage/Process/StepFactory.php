<?php

namespace Pyz\Yves\CheckoutPage\Process;

use Pyz\Yves\CheckoutPage\Plugin\Router\CheckoutPageRouteProviderPlugin;
use Pyz\Yves\CheckoutPage\Process\Steps\OrderNameStep;
use Spryker\Yves\StepEngine\Process\StepCollection;
use Spryker\Yves\StepEngine\Process\StepCollectionInterface;
use SprykerShop\Yves\CheckoutPage\CheckoutPageConfig;
use SprykerShop\Yves\CheckoutPage\Process\StepFactory as SprykerShopStepFactory;

/**
 * @method CheckoutPageConfig getConfig()
 */
class StepFactory extends SprykerShopStepFactory
{
    protected const ROUTE_HOME = 'home';
    protected const CHECKOUT_ERROR = 'checkout-error';

    /**
     * @return StepCollectionInterface|StepCollection
     */
    public function createStepCollection(): StepCollectionInterface|StepCollection
    {
        $stepCollection = new StepCollection(
            $this->getUrlGenerator(),
            self::CHECKOUT_ERROR
        );

        $stepCollection
            ->addStep($this->createEntryStep())
            ->addStep($this->createCustomerStep())
            ->addStep($this->createOrderNameStep())
            ->addStep($this->createAddressStep())
            ->addStep($this->createShipmentStep())
            ->addStep($this->createPaymentStep())
            ->addStep($this->createSummaryStep())
            ->addStep($this->createPlaceOrderStep())
            ->addStep($this->createSuccessStep());

        return $stepCollection;
    }

    /**
     * @return OrderNameStep
     */
    public function createOrderNameStep(): OrderNameStep
    {
        return new OrderNameStep(
            CheckoutPageRouteProviderPlugin::CHECKOUT_ORDER_NAME,
            self::ROUTE_HOME
        );
    }
}
