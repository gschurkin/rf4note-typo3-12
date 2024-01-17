<?php

declare(strict_types=1);

namespace GSchurkin\GsRf4note\Domain\Model;


/**
 * This file is part of the "Rf4note" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Georg Schurkin <gschurkin@gmail.com>
 */

/**
 * Fish
 */
class Fish extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    protected $name = null;

    /**
     * description
     *
     * @var string
     */
    protected $description = null;

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * maxWeight
     *
     * @var int
     */
    protected $maxWeight = null;

    /**
     * reservoires
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Reservoir>
     */
    protected $reservoires = null;

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
        $this->reservoires = $this->reservoires ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the maxWeight
     *
     * @return int
     */
    public function getMaxWeight()
    {
        return $this->maxWeight;
    }

    /**
     * Sets the maxWeight
     *
     * @param int $maxWeight
     * @return void
     */
    public function setMaxWeight(int $maxWeight)
    {
        $this->maxWeight = $maxWeight;
    }

    /**
     * Adds a Reservoir
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\Reservoir $reservoire
     * @return void
     */
    public function addReservoire(\GSchurkin\GsRf4note\Domain\Model\Reservoir $reservoire)
    {
        $this->reservoires->attach($reservoire);
    }

    /**
     * Removes a Reservoir
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\Reservoir $reservoireToRemove The Reservoir to be removed
     * @return void
     */
    public function removeReservoire(\GSchurkin\GsRf4note\Domain\Model\Reservoir $reservoireToRemove)
    {
        $this->reservoires->detach($reservoireToRemove);
    }

    /**
     * Returns the reservoires
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Reservoir>
     */
    public function getReservoires()
    {
        return $this->reservoires;
    }

    /**
     * Sets the reservoires
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Reservoir> $reservoires
     * @return void
     */
    public function setReservoires(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $reservoires)
    {
        $this->reservoires = $reservoires;
    }
}
