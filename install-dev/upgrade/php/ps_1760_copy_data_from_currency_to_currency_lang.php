<?php
/**
 * 2007-2019 PrestaShop and Contributors
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
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

function ps_1760_copy_data_from_currency_to_currency_lang()
{
    $languages = Language::getLanguages();
    foreach ($languages as $language) {
        Db::getInstance()->execute(
            "INSERT INTO `" . _DB_PREFIX_ . "currency_lang` (`id_currency`, `id_lang`, `name`)
            SELECT `id_currency`, " . (int) $language['id_lang'] . " as id_lang , `name`
            FROM `" . _DB_PREFIX_ . "currency`
            ON DUPLICATE KEY UPDATE
            `name` = `" . _DB_PREFIX_ . "currency`.`name`,
            "
        );
    }
}