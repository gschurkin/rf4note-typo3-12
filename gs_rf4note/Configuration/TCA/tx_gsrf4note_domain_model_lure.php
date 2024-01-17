<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_lure',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'name,description',
        'iconfile' => 'EXT:gs_rf4note/Resources/Public/Icons/tx_gsrf4note_domain_model_lure.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'name, description, weight, image, types, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_gsrf4note_domain_model_lure',
                'foreign_table_where' => 'AND {#tx_gsrf4note_domain_model_lure}.{#pid}=###CURRENT_PID### AND {#tx_gsrf4note_domain_model_lure}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_lure.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_lure.description',
            'config' => [
                'type' => 'text',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'weight' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_lure.weight',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
                'default' => 0
            ]
        ],
        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_lure.image',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'sys_file_reference',
                'foreign_field' => 'uid_foreign',
                'foreign_sortby' => 'sorting_foreign',
                'foreign_table_field' => 'tablenames',
                'foreign_match_fields' => [
                    'fieldname' => 'image',
                ],
                'foreign_label' => 'uid_local',
                'foreign_selector' => 'uid_local',
                'overrideChildTca' => [
                    'columns' => [
                        'uid_local' => [
                            'config' => [
                                'appearance' => [
                                    'elementBrowserType' => 'file',
                                    'elementBrowserAllowed' => $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'types' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_lure.types',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_gsrf4note_domain_model_fishingtype',
                'MM' => 'tx_gsrf4note_lure_fishingtype_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
    
    ],
];
