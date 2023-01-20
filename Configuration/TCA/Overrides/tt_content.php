<?php

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content', 'general', 'pi_flexform.options.test');
#\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', ',pi_flexform.options.test,');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('TestProviderExtension', 'Test', 'Test plugin');