<?php
namespace Application\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class Equilibrium
 * @package Application\Service
 */
class Equilibrium implements ServiceLocatorAwareInterface
{

    /* @var ServiceLocatorInterface */
    protected $serviceLocator;
    /* @var array */
    protected $input;

    /**
     * @return array
     */
    public function getEquilibrium()
    {
        $equilibriumArray = array();

        // Start from right and move left
        $right = array_sum($this->getInput());
        $left = 0;

        foreach ($this->getInput() as $key => $value) {
            $right -= $value;

            if ($right === $left) {
                $equilibriumArray[] = $key;
            }

            $left += $value;
        }

        return $equilibriumArray;
    }

    /**
     * @return array
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param string|array $input
     * @return $this
     */
    public function setInput($input)
    {
        if (is_string($input)) {
            $inputArray = explode(',', $input);
        } else {
            $inputArray = array_filter($input);
        }

        foreach ($inputArray as $key => $value) {
            if (is_numeric(trim($value))) {
                $inputArray[$key] = (int)trim($value);
            } else {
                unset($inputArray[$key]);
            }
        }

        $this->input = $inputArray;
        return $this;
    }

    /**
     * Set service locator
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return $this
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    /**
     * Get service locator
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
}
