<?php

if (!defined('TYPO3')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('formrelay_onetrust_provider', 'Configuration/TypoScript', 'FormRelay OneTrust Provider');
