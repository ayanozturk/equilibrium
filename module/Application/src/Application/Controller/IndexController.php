<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * @package Application\Controller
 */
class IndexController extends AbstractActionController
{
    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }

    /**
     * @return ViewModel
     * @throws \Exception
     */
    public function equilibriumAction()
    {
        $view = new ViewModel();
        $inputString = $this->params()->fromRoute('input', null);

        if (!$inputString) {
            throw new \Exception('No Input');
        }

        /* @var $equilibriumService \Application\Service\Equilibrium */
        $equilibriumService = $this->getServiceLocator()->get('Application\Service\Equilibrium');
        $equilibriumService->setInput($inputString);

        $equilibrium = $equilibriumService->getEquilibrium();

        $view->setVariable('input', $equilibriumService->getInput());
        $view->setVariable('equilibrium', $equilibrium);
        return $view;
    }
}
