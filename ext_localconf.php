<?php
defined('TYPO3_MODE') or die ('Access denied.');

\FluidTYPO3\Flux\Core::registerProviderExtensionKey('FluidTYPO3.TestProviderExtension', 'Page');
\FluidTYPO3\Flux\Core::registerProviderExtensionKey('FluidTYPO3.TestProviderExtension', 'Content');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('FluidTYPO3.TestProviderExtension', 'Test', ['Plugin' => 'test'], ['Plugin' => 'test']);

$GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['paths']['test_provider_extension'] = [
    'templateRootPaths' => ['EXT:test_provider_extension/Resources/Private/OverrideTemplates'],
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['atoms']['test'][] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('test_provider_extension', 'Resources/Private/Partials');
