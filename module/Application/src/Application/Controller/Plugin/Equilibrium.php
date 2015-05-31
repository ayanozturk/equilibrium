<?php
namespace Application\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Application\Service\Equilibrium as EquilibriumService;

/**
 * Class Equilibrium
 * @package Application\Controller\Plugin
 */
class Equilibrium extends AbstractPlugin
{

    /* @var EquilibriumService */
    protected $equilibriumService;

    /**
     * @param string|array $input
     * @return array
     */
    public function __invoke($input)
    {
        $this->getEquilibriumService()->setInput($input);

        return $this->getEquilibriumService()->getEquilibrium();
    }

    /**
     * @return EquilibriumService
     */
    public function getEquilibriumService()
    {
        if (!$this->equilibriumService) {
            $this->setEquilibriumService($this->getController()->getServiceLocator()->get('Application\Service\Equilibrium'));
        }

        return $this->equilibriumService;
    }

    /**
     * @param EquilibriumService $equilibriumService
     * @return $this
     */
    public function setEquilibriumService(EquilibriumService $equilibriumService)
    {
        $this->equilibriumService = $equilibriumService;
        return $this;
    }
}
