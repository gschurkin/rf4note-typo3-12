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
 * Reservoir
 */
class Reservoir extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * maxPointX
     *
     * @var int
     */
    protected $maxPointX = null;

    /**
     * maxPointY
     *
     * @var int
     */
    protected $maxPointY = null;

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * fishes
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Fish>
     */
    protected $fishes = null;

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
        $this->fishes = $this->fishes ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the maxPointX
     *
     * @return int
     */
    public function getMaxPointX()
    {
        return $this->maxPointX;
    }

    /**
     * Sets the maxPointX
     *
     * @param string $maxPointX
     * @return void
     */
    public function setMaxPointX(int $maxPointX)
    {
        $this->maxPointX = $maxPointX;
    }

    /**
     * Returns the maxPointY
     *
     * @return int
     */
    public function getMaxPointY()
    {
        return $this->maxPointY;
    }

    /**
     * Sets the maxPointY
     *
     * @param string $maxPointY
     * @return void
     */
    public function setMaxPointY(int $maxPointY)
    {
        $this->maxPointY = $maxPointY;
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
     * Adds a Fish
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\Fish $fish
     * @return void
     */
    public function addFish(\GSchurkin\GsRf4note\Domain\Model\Fish $fish)
    {
        $this->fishes->attach($fish);
    }

    /**
     * Removes a Fish
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\Fish $fishToRemove The Fish to be removed
     * @return void
     */
    public function removeFish(\GSchurkin\GsRf4note\Domain\Model\Fish $fishToRemove)
    {
        $this->fishes->detach($fishToRemove);
    }

    /**
     * Returns the fishes
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Fish>
     */
    public function getFishes()
    {
        return $this->fishes;
    }

    /**
     * Sets the fishes
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Fish> $fishes
     * @return void
     */
    public function setFishes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $fishes)
    {
        $this->fishes = $fishes;
    }
}
