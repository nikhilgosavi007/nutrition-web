<?php

/**
 * Extension Manager/Repository config file for ext "nutrition_web_package".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Nutrition Web Package',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
            'rte_ckeditor' => '8.7.0-9.5.99',
            'bootstrap_package' => '10.0.0-10.0.99'
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Nikhil\\NutritionWebPackage\\' => 'Classes'
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Nikhil Gosavi',
    'author_email' => 'nikhilgosavi007@gmail.com',
    'author_company' => 'Nikhil',
    'version' => '1.0.0',
];
