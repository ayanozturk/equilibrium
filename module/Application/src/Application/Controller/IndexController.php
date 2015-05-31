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
        $view = new ViewModel();

        $inputArray = array(-7, 1, 5, 2, -4, 3, 0);
        $equilibrium = $this->Equilibrium($inputArray);

        $view->setVariable('input', $inputArray);
        $view->setVariable('equilibrium', $equilibrium);
        return $view;
    }
}
