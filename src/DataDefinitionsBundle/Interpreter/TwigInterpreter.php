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
 * @copyright  Copyright (c) 2017 Divante (http://www.divante.co)
 * @license    https://github.com/w-vision/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

declare(strict_types=1);

namespace Wvision\Bundle\DataDefinitionsBundle\Interpreter;

use Twig\Environment;
use Wvision\Bundle\DataDefinitionsBundle\Context\InterpreterContextInterface;

class TwigInterpreter implements InterpreterInterface
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function interpret(InterpreterContextInterface $context): mixed
    {
        return $this->twig->createTemplate($context->getConfiguration()['template'])->render([
            'value' => $context->getValue(),
            'object' => $context->getObject(),
            'map' => $context->getMapping(),
            'data' => $context->getDataRow(),
            'data_set' => $context->getDataSet(),
            'definition' => $context->getDefinition(),
            'params' => $context->getParams(),
            'configuration' => $context->getConfiguration(),
        ]);
    }
}
