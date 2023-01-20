<?php
namespace FluidTYPO3\TestProviderExtension\Controller;

use Psr\Http\Message\ResponseInterface;

/**
 * Class PageController
 */
class PageController extends \FluidTYPO3\Flux\Controller\PageController
{
    public function standardAction(?string $value = null)
    {
        $this->view->assign('value', $value);
        return $this->createHtmlResponse($this->view->render());
    }
}
