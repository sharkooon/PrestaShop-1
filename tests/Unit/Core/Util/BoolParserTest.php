<?php
/**
 * 2007-2020 PrestaShop SA and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace Tests\Unit\PrestaShopBundle\Utils;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\TestCase;
use PrestaShop\PrestaShop\Core\Util\BoolParser;

class BoolParserTest extends TestCase
{
    /**
     * @throws AssertionFailedError
     */
    public function testCastToBool()
    {
        $this->assertFalse(BoolParser::castToBool('false'));
        $this->assertFalse(BoolParser::castToBool('0'));
        $this->assertFalse(BoolParser::castToBool(0));
        $this->assertFalse(BoolParser::castToBool(false));
        $this->assertFalse(BoolParser::castToBool(-0));

        $this->assertTrue(BoolParser::castToBool('1'));
        $this->assertTrue(BoolParser::castToBool('-1'));
        $this->assertTrue(BoolParser::castToBool(1));
        $this->assertTrue(BoolParser::castToBool(-1));
        $this->assertTrue(BoolParser::castToBool('true'));
        $this->assertTrue(BoolParser::castToBool(true));
        $this->assertTrue(BoolParser::castToBool('anything else'));
        $this->assertTrue(BoolParser::castToBool('on'));
        // this case is open for discussion - not sure if it matters at all
        $this->assertTrue(BoolParser::castToBool('-0'));
    }
}
