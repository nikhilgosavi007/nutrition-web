<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'GroupProject.NutritionWeb',
            'ClientReport',
            [
                'ClientReport' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'ClientReport' => 'list, show, new, create, edit, update, delete'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'GroupProject.NutritionWeb',
            'Homepage',
            [
                'HomePage' => 'viewhome',
            ],
            // non-cacheable actions
            [
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'GroupProject.NutritionWeb',
            'Clientlist',
            [
                'Clients' => 'list, show, new, create, edit, update, delete',
                'ClientReport' => 'list, show, new, create, edit, update, delete',
                'Nutritionist' => 'list, show, new, create, edit, update, delete, associateclient, dissociateclient',
            ],
            // non-cacheable actions
            [
                'Clients' => 'list, show, new, create, edit, update, delete',
                'ClientReport' => 'list, show, new, create, edit, update, delete',
                'Nutritionist' => 'list, show, new, create, edit, update, delete, associateclient, dissociateclient',
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'GroupProject.NutritionWeb',
            'Nutritionweb',
            [
                'Nutritionist' => 'list, show, new, create, edit, update, delete, associateclient, dissociateclient',
                'Clients' => 'list, show, new, create, edit, update, delete',
                'Blog' => 'list, show, new, create, edit, update, delete',
                'Specialization' => 'list, show, new, create, edit, update, delete',
                'ClientReport' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Nutritionist' => 'list, show, new, create, edit, update, delete, associateclient, dissociateclient',
                'Clients' => 'list, show, new, create, edit, update, delete',
                'Blog' => 'list, show, new, create, edit, update, delete',
                'Specialization' => 'list, show, new, create, edit, update, delete',
                'ClientReport' => 'list, show, new, create, edit, update, delete'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        nutritionweb {
                            iconIdentifier = nutrition_web-plugin-nutritionweb
                            title = LLL:EXT:nutrition_web/Resources/Private/Language/locallang_db.xlf:tx_nutrition_web_nutritionweb.name
                            description = LLL:EXT:nutrition_web/Resources/Private/Language/locallang_db.xlf:tx_nutrition_web_nutritionweb.description
                            tt_content_defValues {
                                CType = list
                                list_type = nutritionweb_nutritionweb
                            }
                        }

                        clientlist {
                            iconIdentifier = nutrition_web-plugin-nutritionweb
                            title = Client List
                            description = Contains a list of Clients
                            tt_content_defValues {
                                CType = list
                                list_type = nutritionweb_clientlist
                            }
                        }

                        homepage {
                            iconIdentifier = nutrition_web-plugin-nutritionweb
                            title = Home Page
                            description = Home Page
                            tt_content_defValues {
                                CType = list
                                list_type = nutritionweb_homepage
                            }
                        }

                        clientreport {
                            iconIdentifier = nutrition_web-plugin-nutritionweb
                            title = Client Report Page
                            description =  Client Report Page
                            tt_content_defValues {
                                CType = list
                                list_type = nutritionweb_clientreport
                            }
                        }
                    }
                    show = *
                }
           }'
        );
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

        $iconRegistry->registerIcon(
            'nutrition_web-plugin-nutritionweb',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:nutrition_web/Resources/Public/Icons/user_plugin_nutritionweb.svg']
        );

    }
);
