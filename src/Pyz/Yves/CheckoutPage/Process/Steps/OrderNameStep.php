<?php

namespace Pyz\Yves\CheckoutPage\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\StepEngine\Dependency\Step\StepWithBreadcrumbInterface;
use SprykerShop\Yves\CheckoutPage\Process\Steps\AbstractBaseStep;
use Symfony\Component\HttpFoundation\Request;

class OrderNameStep extends AbstractBaseStep implements StepWithBreadcrumbInterface
{
    /**
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(
        $stepRoute,
        $escapeRoute
    )
    {
        parent::__construct($stepRoute, $escapeRoute);
    }

    /**
     * @param AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function preCondition(AbstractTransfer $quoteTransfer): bool
    {
        return true;
    }

    /**
     * @param AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(AbstractTransfer $quoteTransfer): bool
    {
        return true;
    }

    /**
     * @param Request $request
     * @param AbstractTransfer $quoteTransfer
     *
     * @return QuoteTransfer|AbstractTransfer
     */
    public function execute(Request $request, AbstractTransfer $quoteTransfer): QuoteTransfer|AbstractTransfer
    {
        return $quoteTransfer;
    }

    /**
     * @param AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function getBreadcrumbItemTitle(): string
    {
        return 'Name';
    }

    /**
     * @param AbstractTransfer $dataTransfer
     *
     * @return bool
     */
    public function isBreadcrumbItemEnabled(AbstractTransfer $dataTransfer): bool
    {
        return $this->postCondition($dataTransfer);
    }

    /**
     * @param AbstractTransfer $dataTransfer
     *
     * @return bool
     */
    public function isBreadcrumbItemHidden(AbstractTransfer $dataTransfer): bool
    {
        return !$this->requireInput($dataTransfer);
    }
}
