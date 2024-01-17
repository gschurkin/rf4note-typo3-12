<?php
declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

$pluginCode = 'gsrf4note';
 
ExtensionUtility::registerPlugin(
   'gs_rf4note',
   'Point',
   'Fishspots'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginCode.'_point'] = 'select_key,pages,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginCode.'_point'] = 'pi_flexform';