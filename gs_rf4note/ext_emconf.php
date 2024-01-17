<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Rf4note',
    'description' => 'Notepad for Russian Fishing 4',
    'category' => 'plugin',
    'author' => 'Georg Schurkin',
    'author_email' => 'gschurkin@gmail.com',
    'state' => 'alpha',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.99.99',
            'femanager' => '8.0.1-8.99.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
