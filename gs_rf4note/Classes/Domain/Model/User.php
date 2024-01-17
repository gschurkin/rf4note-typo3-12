<?php

declare(strict_types=1);

namespace GSchurkin\GsRf4note\Domain\Model;

class User extends \In2code\Femanager\Domain\Model\User
{
    /**
     * points
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Point>
     */
    protected $points = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->points = $this->points ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Point
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\Point $point
     * @return void
     */
    public function addPoint(\GSchurkin\GsRf4note\Domain\Model\Point $point)
    {
        $this->points->attach($point);
    }

    /**
     * Removes a Point
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\Point $pointToRemove The Point to be removed
     * @return void
     */
    public function removePoint(\GSchurkin\GsRf4note\Domain\Model\Point $pointToRemove)
    {
        $this->points->detach($pointToRemove);
    }

    /**
     * Sets the types
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Point> $points
     * @return void
     */
    public function setPoints(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $points)
    {
        $this->points = $points;
    }

    /**
     * Returns the points
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Point>
     */
    public function getPoints()
    {
        return $this->points;
    }
}