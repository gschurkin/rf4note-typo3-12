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
 * Point
 */
class Point extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * pointX
     *
     * @var int
     */
    protected $pointX = null;

    /**
     * pointY
     *
     * @var int
     */
    protected $pointY = null;

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * author
     *
     * @var \In2code\Femanager\Domain\Model\User
     */
    protected $author = null;

    /**
     * user
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\In2code\Femanager\Domain\Model\User>
     */
    protected $users = null;

    /**
     * reservoir
     *
     * @var \GSchurkin\GsRf4note\Domain\Model\Reservoir
     */
    protected $reservoir = null;

    /**
     * fishes
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Fish>
     */
    protected $fishes = null;

    /**
     * type
     *
     * @var \GSchurkin\GsRf4note\Domain\Model\FishingType
     */
    protected $type = null;

    /**
     * lures
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Lure>
     */
    protected $lures = null;

    /**
     * slug
     *
     * @var string
     */
    protected $slug = null;

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
        $this->lures = $this->lures ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->users = $this->users ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the pointX
     *
     * @return int
     */
    public function getPointX()
    {
        return $this->pointX;
    }

    /**
     * Sets the pointX
     *
     * @param string $pointX
     * @return void
     */
    public function setPointX(int $pointX)
    {
        $this->pointX = $pointX;
    }

    /**
     * Returns the pointY
     *
     * @return int
     */
    public function getPointY()
    {
        return $this->pointY;
    }

    /**
     * Sets the pointY
     *
     * @param int $pointY
     * @return void
     */
    public function setPointY(int $pointY)
    {
        $this->pointY = $pointY;
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
     * Returns the author
     *
     * @return \In2code\Femanager\Domain\Model\User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the author
     *
     * @param \In2code\Femanager\Domain\Model\User $author
     * @return void
     */
    public function setAuthor(\In2code\Femanager\Domain\Model\User $author)
    {
        $this->author = $author;
    }

    /**
     * Adds a User
     *
     * @param \In2code\Femanager\Domain\Model\User $user
     * @return void
     */
    public function addUser(\In2code\Femanager\Domain\Model\User $user)
    {
        $this->users->attach($user);
    }

    /**
     * Removes a User
     *
     * @param \In2code\Femanager\Domain\Model\User $userToRemove The User to be removed
     * @return void
     */
    public function removeUser(\In2code\Femanager\Domain\Model\User $userToRemove)
    {
        $this->users->detach($userToRemove);
    }

    /**
     * Returns the users
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\In2code\Femanager\Domain\Model\User>
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Sets the users
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\In2code\Femanager\Domain\Model\User> $users
     * @return void
     */
    public function setUsers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $users)
    {
        $this->users = $users;
    }

    /**
     * Returns the reservoir
     *
     * @return \GSchurkin\GsRf4note\Domain\Model\Reservoir
     */
    public function getReservoir()
    {
        return $this->reservoir;
    }

    /**
     * Sets the reservoir
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\Reservoir $reservoir
     * @return void
     */
    public function setReservoir(\GSchurkin\GsRf4note\Domain\Model\Reservoir $reservoir)
    {
        $this->reservoir = $reservoir;
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

    /**
     * Returns the type
     *
     * @return \GSchurkin\GsRf4note\Domain\Model\FishingType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\FishingType $type
     * @return void
     */
    public function setType(\GSchurkin\GsRf4note\Domain\Model\FishingType $type)
    {
        $this->type = $type;
    }

    /**
     * Adds a Lure
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\Lure $lure
     * @return void
     */
    public function addLure(\GSchurkin\GsRf4note\Domain\Model\Lure $lure)
    {
        $this->lures->attach($lure);
    }

    /**
     * Removes a Lure
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\Lure $lureToRemove The Lure to be removed
     * @return void
     */
    public function removeLure(\GSchurkin\GsRf4note\Domain\Model\Lure $lureToRemove)
    {
        $this->lures->detach($lureToRemove);
    }

    /**
     * Returns the lures
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Lure>
     */
    public function getLures()
    {
        return $this->lures;
    }

    /**
     * Sets the lures
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GSchurkin\GsRf4note\Domain\Model\Lure> $lures
     * @return void
     */
    public function setLures(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $lures)
    {
        $this->lures = $lures;
    }


    /**
     * Get slug
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Set slug
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }
}
