<?php
namespace FluidTYPO3\TestProviderExtension\Controller;

/**
 * Class PageController
 */
class PageController extends \FluidTYPO3\Flux\Controller\PageController
{
    /**
     * @param string $value
     * @return void
     */
    public function standardAction(?string $value = null)
    {
        $this->view->assign('value', $value);
    }
}
