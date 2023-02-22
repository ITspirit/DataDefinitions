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
use Wvision\Bundle\DataDefinitionsBundle\Model\ImportMapping\FromColumn;
use function count;

class RawProvider implements ImportProviderInterface
{
    public function testData(array $configuration): bool
    {
        return true;
    }

    public function getColumns(array $configuration): array
    {
        $headers = explode(',', $configuration['headers']);
        $returnHeaders = [];

        if (count($headers) > 0) {
            //First line are the headers
            foreach ($headers as $header) {
                if (!$header) {
                    continue;
                }

                $headerObj = new FromColumn();
                $headerObj->setIdentifier($header);
                $headerObj->setLabel($header);

                $returnHeaders[] = $headerObj;
            }
        }

        return $returnHeaders;
    }

    public function getData(
        array $configuration,
        ImportDefinitionInterface $definition,
        array $params,
        FilterInterface $filter = null
    ): ImportDataSetInterface {
        return new ArrayImportDataSet($params['data']);
    }
}
