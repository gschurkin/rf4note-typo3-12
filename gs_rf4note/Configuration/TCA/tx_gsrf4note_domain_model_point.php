<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_point',
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
        'iconfile' => 'EXT:gs_rf4note/Resources/Public/Icons/tx_gsrf4note_domain_model_point.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'name, slug, description, point_x, point_y, image, author, users, reservoir, fishes, type, lures, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
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
                'foreign_table' => 'tx_gsrf4note_domain_model_point',
                'foreign_table_where' => 'AND {#tx_gsrf4note_domain_model_point}.{#pid}=###CURRENT_PID### AND {#tx_gsrf4note_domain_model_point}.{#sys_language_uid} IN (-1,0)',
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
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_point.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_point.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
        'point_x' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_point.point_x',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
                'default' => 0
            ]
        ],
        'point_y' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_point.poin_y',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
                'default' => 0
            ]
        ],
        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_point.image',
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
        'author' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_point.author',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'fe_users',
                'size' => 4,
                'eval' => 'int',
                'default' => 0,
                'readOnly' => 1
            ]
        ],
        'users' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_point.user',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'fe_users',
                'MM' => 'fe_users_mm',
                //'MM_opposite_field' => 'users',
                'minitems' => 0,
            ]
        ],
        'reservoir' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_point.reservoir',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_gsrf4note_domain_model_reservoir',
                'default' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'fishes' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_point.fishes',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_gsrf4note_domain_model_fish',
                'MM' => 'tx_gsrf4note_fish_reservoir_mm',
                'MM_opposite_field' => 'fishes',
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
        'type' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_point.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_gsrf4note_domain_model_fishingtype',
                'default' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ],
            
        ],
        'lures' => [
            'exclude' => true,
            'label' => 'LLL:EXT:gs_rf4note/Resources/Private/Language/locallang_db.xlf:tx_gsrf4note_domain_model_point.lures',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_gsrf4note_domain_model_lure',
                'MM' => 'tx_gsrf4note_lure_fishingtype_mm',
                'MM_opposite_field' => 'lures',
                'minitems' => 0,
                'maxitems' => 99,
            ],

        ],
        'slug'       => [
            'exclude'     => true,
            'label'       => 'Slug',
            'config'      => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['name'],
                    'fieldSeparator' => '/',
                    'replacements' => [
                        '/' => '',
                    ],
                ],
                'fallbackCharacter' => '-',
                'eval' => 'uniqueInSite',
                'default' => '',
            ],
        ],
    ],
];
