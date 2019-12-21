<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'GroupProject.NutritionWeb',
            'Nutritionweb',
            'NutritionWeb'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'GroupProject.NutritionWeb',
            'ClientList',
            'ClientList'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'GroupProject.NutritionWeb',
            'Homepage',
            'Homepage'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('nutrition_web', 'Configuration/TypoScript', 'Nutrition Web Extension');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nutritionweb_domain_model_nutritionist', 'EXT:nutrition_web/Resources/Private/Language/locallang_csh_tx_nutritionweb_domain_model_nutritionist.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nutritionweb_domain_model_nutritionist');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nutritionweb_domain_model_clients', 'EXT:nutrition_web/Resources/Private/Language/locallang_csh_tx_nutritionweb_domain_model_clients.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nutritionweb_domain_model_clients');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nutritionweb_domain_model_blog', 'EXT:nutrition_web/Resources/Private/Language/locallang_csh_tx_nutritionweb_domain_model_blog.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nutritionweb_domain_model_blog');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nutritionweb_domain_model_specialization', 'EXT:nutrition_web/Resources/Private/Language/locallang_csh_tx_nutritionweb_domain_model_specialization.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nutritionweb_domain_model_specialization');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nutritionweb_domain_model_clientreport', 'EXT:nutrition_web/Resources/Private/Language/locallang_csh_tx_nutritionweb_domain_model_clientreport.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nutritionweb_domain_model_clientreport');

    }
);
