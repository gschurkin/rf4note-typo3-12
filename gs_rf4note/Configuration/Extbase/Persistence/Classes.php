<?php
return [
    \In2code\Femanager\Domain\Model\User::class => [
        'subclasses' => [
            \GSchurkin\GsRf4note\Domain\Model\User::class
        ]
    ],
    \GSchurkin\GsRf4note\Domain\Model\User::class => [
        'tableName' => 'fe_users',
        'recordType' => 0,
    ]
];