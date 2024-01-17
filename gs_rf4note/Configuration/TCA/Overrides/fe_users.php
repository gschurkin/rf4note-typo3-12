<?php
defined('TYPO3') or die();

// Add some fields to fe_users table to show TCA fields definitions
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users',
   [
      'points' => [
         'exclude' => true,
         'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_point.points',
         'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_gsrf4note_domain_model_point',
            'MM' => 'fe_users_mm',
            'MM_opposite_field' => 'points',
            'minitems' => 0,
        ]
      ]
   ]
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'fe_users',
    'points',
    '',
    'after:usergroup'
);
