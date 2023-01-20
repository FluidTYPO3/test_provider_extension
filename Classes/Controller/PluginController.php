<?php
namespace FluidTYPO3\TestProviderExtension\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class PluginController
 */
class PluginController extends ActionController
{
    /**
     * @return void
     */
    public function testAction()
    {
    }

    /**
     * @return void
     */
    public function otherAction()
    {
        return 'other action';
    }
}
