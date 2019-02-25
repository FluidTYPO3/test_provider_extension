<?php
defined('TYPO3_MODE') or die ('Access denied.');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'My provider extension');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('Test.Testing', 'Test', 'Test plugin');
