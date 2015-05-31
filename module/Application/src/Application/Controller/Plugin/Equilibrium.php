<?php
namespace Application\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

/**
 * Class Equilibrium
 * @package Application\Controller\Plugin
 */
class Equilibrium extends AbstractPlugin
{
    /**
     * @param array $array
     * @return array
     */
    public function __invoke(array $array)
    {
        $equilibriumArray = array();

        // Start from right and move left
        $right = array_sum($array);
        $left = 0;

        foreach ($array as $key => $value) {
            $right -= $value;

            if ($right === $left) {
                $equilibriumArray[] = $key;
            }

            $left += $value;
        }

        return $equilibriumArray;
    }
}
