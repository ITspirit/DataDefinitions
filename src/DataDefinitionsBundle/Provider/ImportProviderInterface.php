<?php
/**
 * Data Definitions.
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2016-2019 w-vision AG (https://www.w-vision.ch)
 * @license    https://github.com/w-vision/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

declare(strict_types=1);

namespace Wvision\Bundle\DataDefinitionsBundle\Provider;

use Wvision\Bundle\DataDefinitionsBundle\Filter\FilterInterface;
use Wvision\Bundle\DataDefinitionsBundle\Model\ImportDefinitionInterface;

interface ImportProviderInterface
{
    public function testData(array $configuration): bool;

    public function getColumns(array $configuration): array;

    public function getData(
        array $configuration,
        ImportDefinitionInterface $definition,
        array $params,
        FilterInterface $filter = null
    ): ImportDataSetInterface;
}
