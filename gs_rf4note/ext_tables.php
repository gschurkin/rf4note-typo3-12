<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_gsrf4note_domain_model_reservoir', 'EXT:gs_rf4note/Resources/Private/Language/locallang_csh_tx_gsrf4note_domain_model_reservoir.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_gsrf4note_domain_model_reservoir');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_gsrf4note_domain_model_fish', 'EXT:gs_rf4note/Resources/Private/Language/locallang_csh_tx_gsrf4note_domain_model_fish.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_gsrf4note_domain_model_fish');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_gsrf4note_domain_model_fishingtype', 'EXT:gs_rf4note/Resources/Private/Language/locallang_csh_tx_gsrf4note_domain_model_fishingtype.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_gsrf4note_domain_model_fishingtype');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_gsrf4note_domain_model_lure', 'EXT:gs_rf4note/Resources/Private/Language/locallang_csh_tx_gsrf4note_domain_model_lure.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_gsrf4note_domain_model_lure');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_gsrf4note_domain_model_point', 'EXT:gs_rf4note/Resources/Private/Language/locallang_csh_tx_gsrf4note_domain_model_point.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_gsrf4note_domain_model_point');
})();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:gs_rf4note/Configuration/PageTSconfig/NewContentElementWizard.ts">');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('gsrf4note_point', 'FILE:EXT:gs_rf4note/Configuration/FlexForm/flexform_point.xml');