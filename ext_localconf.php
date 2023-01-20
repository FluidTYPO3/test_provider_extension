<?php
(function() {
    /*
    \FluidTYPO3\Flux\Core::registerManuallyManagedContentType('testproviderextension_columns');
    \FluidTYPO3\Flux\Core::registerManuallyManagedContentType('testproviderextension_container');
    \FluidTYPO3\Flux\Core::registerManuallyManagedContentType('testproviderextension_overlays');
    \FluidTYPO3\Flux\Core::registerManuallyManagedContentType('testproviderextension_relationfields');
    \FluidTYPO3\Flux\Core::registerManuallyManagedContentType('testproviderextension_sectionobjectasgrid');
    \FluidTYPO3\Flux\Core::registerManuallyManagedContentType('testproviderextension_sectionobjectasmanualgrid');
    \FluidTYPO3\Flux\Core::registerManuallyManagedContentType('testproviderextension_subtest');
    \FluidTYPO3\Flux\Core::registerManuallyManagedContentType('testproviderextension_typesandtransform');
    */

    \FluidTYPO3\Flux\Core::registerProviderExtensionKey('FluidTYPO3.TestProviderExtension', 'Page');
    \FluidTYPO3\Flux\Core::registerProviderExtensionKey('FluidTYPO3.TestProviderExtension', 'Content');

    $controllerName = \FluidTYPO3\TestProviderExtension\Controller\PluginController::class;
    $secondControllerName = \FluidTYPO3\TestProviderExtension\Controller\SecondPluginController::class;
    $extensionName = 'TestProviderExtension';

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        $extensionName,
        'Test',
        [
            $controllerName => 'test,other',
            $secondControllerName => 'test',
        ],
        []
    );
})();
