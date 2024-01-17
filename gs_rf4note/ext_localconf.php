<?php
defined('TYPO3') or die();

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

ExtensionUtility::configurePlugin(
   'gs_rf4note',
   'Point',
   [GSchurkin\GsRf4note\Controller\PointController::class => 'list, new, show, check']
);

$versionInformation = GeneralUtility::makeInstance(Typo3Version::class);
// Only include page.tsconfig if TYPO3 version is below 12 so that it is not imported twice.
if ($versionInformation->getMajorVersion() < 12) {
   ExtensionManagementUtility::addPageTSConfig('
      @import "EXT:gs_rf4note/Configuration/page.tsconfig"
   ');
}