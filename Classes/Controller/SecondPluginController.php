<?php
namespace FluidTYPO3\TestProviderExtension\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class SecondPluginController
 */
class SecondPluginController extends ActionController
{
    public function testAction()
    {
        $output = $this->view->render();
        if (method_exists($this, 'htmlResponse')) {
            return $this->htmlResponse($output);
        }
        $response = clone $this->response;
        $response->setContent($output);
        return $response;
    }
}
