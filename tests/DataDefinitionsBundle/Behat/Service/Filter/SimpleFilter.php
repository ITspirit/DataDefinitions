<?php

namespace Wvision\Bundle\DataDefinitionsBundle\Behat\Service\Filter;

use Pimcore\Model\DataObject\Concrete;
use Wvision\Bundle\DataDefinitionsBundle\Context\FilterContextInterface;
use Wvision\Bundle\DataDefinitionsBundle\Filter\FilterInterface;
use Wvision\Bundle\DataDefinitionsBundle\Model\DataDefinitionInterface;

class SimpleFilter implements FilterInterface
{
    public function filter(FilterContextInterface $context): bool
    {
        return $context->getDataRow()['doFilter'] !== '1';
    }
}
