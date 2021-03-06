<?php

/**
 * Class Frenet_Shipping_Model_Packages_Package_Limit
 */
class Frenet_Shipping_Model_Packages_Package_Limit
{
    /**
     * @var float
     */
    const PACKAGE_MAX_WEIGHT = 30.0000;

    /**
     * @var float
     */
    const PACKAGE_NO_LIMIT = 999999999;

    /**
     * @var float|null
     */
    private $maxWeight = null;

    /**
     * @return float
     */
    public function getMaxWeight()
    {
        if (null === $this->maxWeight) {
            return self::PACKAGE_MAX_WEIGHT;
        }

        return (float) $this->maxWeight;
    }

    /**
     * @param float $weight
     *
     * @return $this
     */
    public function setMaxWeight($weight)
    {
        $this->maxWeight = (float) $weight;
        return $this;
    }

    /**
     * @return $this
     */
    public function removeLimit()
    {
        return $this->setMaxWeight(self::PACKAGE_NO_LIMIT);
    }

    /**
     * @return bool
     */
    public function isUnlimited()
    {
        return $this->maxWeight == self::PACKAGE_NO_LIMIT;
    }

    /**
     * @return $this
     */
    public function resetMaxWeight()
    {
        $this->maxWeight = null;
        return $this;
    }

    /**
     * @param float $weight
     *
     * @return bool
     */
    public function isOverWeight($weight)
    {
        return $weight > $this->getMaxWeight();
    }
}
