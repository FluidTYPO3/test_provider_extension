<?php
defined('TYPO3_MODE') or die ('Access denied.');

\FluidTYPO3\Flux\Core::registerProviderExtensionKey('FluidTYPO3.TestProviderExtension', 'Page');
\FluidTYPO3\Flux\Core::registerProviderExtensionKey('FluidTYPO3.TestProviderExtension', 'Content');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('FluidTYPO3.TestProviderExtension', 'Test', ['Plugin' => 'test'], ['Plugin' => 'test']);
