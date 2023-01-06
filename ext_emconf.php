<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Form Relay Plugin - OneTrust',
    'description' => 'Form Relay plugin for providing GDPR consent given via OneTrust',
    'category' => 'plugin',
    'author' => '',
    'author_email' => 'info@mediatis.de',
    'author_company' => 'Mediatis AG',
    'state' => 'stable',
    'version' => '1.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-11.5.99',
            'formrelay' => '>=5.0.0',
            'one_trust_utility' => '>=2.0.0',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
