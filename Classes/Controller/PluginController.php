<?php
namespace FluidTYPO3\TestProviderExtension\Controller;

use TYPO3\CMS\Extbase\Domain\Model\FrontendUser;
use TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class PluginController
 */
class PluginController extends ActionController
{
    /**
     * @var FrontendUserRepository
     */
    protected $userRepository;

    /**
     * @param FrontendUserRepository $repository
     * @return void
     */
    public function injectUserRepository(FrontendUserRepository $repository)
    {
        $this->userRepository = $repository;
    }

    /**
     * @return void
     */
    public function testAction()
    {
        /*
        for ($i = 0; $i < 100; $i++) {
            $user = new FrontendUser('user' . $i, 'password' . $i);
            $this->userRepository->add($user);
        }
        */
        $this->view->assign('users', $this->userRepository->findAll());
    }
}
