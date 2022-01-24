<?php
defined('TYPO3_MODE') or die ('Access denied.');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('test_provider_extension', 'Configuration/TypoScript', 'My provider extension');
