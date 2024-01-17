<?php

declare(strict_types=1);

namespace GSchurkin\GsRf4note\Controller;

use \TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use \Psr\Http\Message\ResponseInterface;


use GSchurkin\GsRf4note\Domain\Repository\PointRepository;
use GSchurkin\GsRf4note\Domain\Repository\ReservoirRepository;
use GSchurkin\GsRf4note\Domain\Repository\FishRepository;
use GSchurkin\GsRf4note\Domain\Repository\FishingTypeRepository;
use GSchurkin\GsRf4note\Domain\Repository\LureRepository;
use GSchurkin\GsRf4note\Domain\Model\Point;

use \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use \TYPO3\CMS\Core\Resource\ResourceFactory;
use \In2code\Femanager\Domain\Repository\UserRepository;
use \TYPO3\CMS\Core\Resource\FileReference as CoreFileReference;
use \TYPO3\CMS\Extbase\Domain\Model\FileReference as ExtbaseFileReference;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\DataHandling\SlugHelper;
use TYPO3\CMS\Core\DataHandling\Model\RecordStateFactory;

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;


/**
 * This file is part of the "Rf4note" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Georg Schurkin <gschurkin@gmail.com>
 */

/**
 * PointController
 */
class PointController extends ActionController
{
    /**
     * @var PersistenceManager
     */
    protected PersistenceManager $persistenceManager;

    /**
     * pointRepository
     *
     * @var PointRepository
     */
    protected $pointRepository = null;

    /**
     * reservoirRepository
     *
     * @var ReservoirRepository
     */
    protected $reservoirRepository = null;

    /**
     * pointRepository
     *
     * @var FishRepository
     */
    protected $fishRepository = null;

    /**
     * fishingTypeRepository
     *
     * @var FishingTypeRepository
     */
    protected $fishingTypeRepository = null;

    /**
     * lureRepository
     *
     * @var LureRepository
     */
    protected $lureRepository = null;

    /**
     * injectPersistenceManager
     *
     * @param  PersistenceManager $persistenceManager
     * @return void
     */
    public function injectPersistenceManager(PersistenceManager $persistenceManager) {
        $this->persistenceManager = $persistenceManager;
    }

    /**
     * @param LureRepository $lureRepository
     */
    public function injectLureRepository(LureRepository $lureRepository)
    {
        $this->lureRepository = $lureRepository;
    }

    /**
     * @param FishingTypeRepository $fishingTypeRepository
     */
    public function injectFishingTypeRepository(FishingTypeRepository $fishingTypeRepository)
    {
        $this->fishingTypeRepository = $fishingTypeRepository;
    }

    /**
     * @param FishRepository $fishRepository
     */
    public function injectFishRepository(FishRepository $fishRepository)
    {
        $this->fishRepository = $fishRepository;
    }

    /**
     * @param ReservoirRepository $reservoirRepository
     */
    public function injectReservoirRepository(ReservoirRepository $reservoirRepository)
    {
        $this->reservoirRepository = $reservoirRepository;
    }

    /**
     * @param PointRepository $pointRepository
     */
    public function injectPointRepository(PointRepository $pointRepository)
    {
        $this->pointRepository = $pointRepository;
    }

    /**
     * action list
     *
     * @return ResponseInterface
     */
    public function listAction(): ResponseInterface
    {
        $points = $this->pointRepository->findAll();

        $this->view->assign('points', $points);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \GSchurkin\GsRf4note\Domain\Model\Point $point
     * @return ResponseInterface
     */
    public function showAction(\GSchurkin\GsRf4note\Domain\Model\Point $point): ResponseInterface
    {
        $this->view->assign('point', $point);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     */
    public function newAction()
    {
        $form = $this->request->getArguments()['point'];
        $frontendUserId = $this->request->getAttribute('frontend.user')->user['uid'];
        $frontendUserEntity = GeneralUtility::makeInstance(UserRepository::class)->findByUid($frontendUserId);
        $image = $form['image'];

        //DebuggerUtility::var_dump($form);

        if ($form && $frontendUserEntity) {
            /** @var Point $point */
            $point = GeneralUtility::makeInstance(Point::class);
            $point->setName($form['name']);
            $point->setDescription($form['description']);
            $point->setPointX(intval($form['posX']));
            $point->setPointY(intval($form['posY']));
            $point->setAuthor($frontendUserEntity);
            $point->addUser($frontendUserEntity);
            $point->setReservoir($this->reservoirRepository->findByUid($form['reservoir']));
            $point->setType($this->fishingTypeRepository->findByUid($form['fishingtypes']));
            foreach ($form['fishes'] as $fish) {
                $point->addFish($this->fishRepository->findByUid($fish));
            }
            foreach ($form['lures'] as $lure) {
                $point->addLure($this->lureRepository->findByUid($lure));
            }

            if ($image['size']) {
                $fileReference = $this->getFileReference($image);
                $point->setImage($fileReference);
            }

            $this->pointRepository->add($point);
            $this->persistenceManager->persistAll();

            $pointArray = $this->pointRepository->findByUidAssoc($point->getUid());
            $point = $this->pointRepository->findOneByUid($point->getUid());
            $point->setSlug($this->generateSlug($pointArray));

            $this->pointRepository->update($point);
            $this->persistenceManager->persistAll();
        }

        $reservoirs = $this->reservoirRepository->findAll();
        $fishingtypes = $this->fishingTypeRepository->findAll();

        $this->view->assignMultiple([
            'reservoirs' => $reservoirs,
            'fishingtypes' => $fishingtypes,
        ]);
    }

    /**
     * check action
     *
     * @return string
     */
    public function checkAction() 
    {
        $args = $this->request->getArguments();

        if (isset($args['point']['reservoir'])) 
        {
            $form_fishes_array = [];
            $form_fishes = $this->reservoirRepository->findByUid($args['point']['reservoir'])->getFishes()->toArray();
            foreach($form_fishes as $form_fish) {
                $form_fishes_array[$form_fish->getUid()] = $form_fish->getName();
            }
            asort($form_fishes_array);
            return json_encode($form_fishes_array);
        }
        else if(isset($args['point']['fishingtypes']))
        {
            $form_lures_array = [];
            $form_lures = $this->fishingTypeRepository->findByUid($args['point']['fishingtypes'])->getLures()->toArray();
            foreach($form_lures as $form_lure) {
                $form_lures_array[$form_lure->getUid()] = $form_lure->getName();
            }
            asort($form_lures_array);
            return json_encode($form_lures_array);
        }
        else
        {
            return;
        }
    }

    /**
     * Get FileReference
     *
     * @param $image
     * @return ExtbaseFileReference
     */
    protected function getFileReference($image)
    {
        $imageUploadFolder = 'fishspot_images';
        $resourceFactory = GeneralUtility::makeInstance(ResourceFactory::class);
        $storage = $resourceFactory->getDefaultStorage();

        $newFile = $storage->addFile(
            $image['tmp_name'],
            $storage->getFolder($imageUploadFolder),
            $storage->sanitizeFileName($image['name'])
        );

        $fileResourceReference = new CoreFileReference(array('uid_local' => $newFile->getUid()));
        $fileSysReference = GeneralUtility::makeInstance(ExtbaseFileReference::class);
        $fileSysReference->setOriginalResource($fileResourceReference);

        return $fileSysReference;
    }

    /**
     * Generate Slug
     *
     * @param $name
     * @return string
     */
    protected function generateSlug($point)
    {
        $tableName = 'tx_gsrf4note_domain_model_point';
        $slugFieldName = 'slug';

        $fieldConfig = $GLOBALS['TCA'][$tableName]['columns'][$slugFieldName]['config'];
        $evalInfo = GeneralUtility::trimExplode(',', $fieldConfig['eval'], true);

        /** @var SlugHelper $slugHelper */
        $slugHelper = GeneralUtility::makeInstance(
            SlugHelper::class,
            $tableName,
            $slugFieldName,
            $fieldConfig
        );

        $slug = $slugHelper->generate($point, $point['pid']);
        $state = RecordStateFactory::forName($tableName)->fromArray($point, $point['pid'], $point['uid']);

        if (in_array('uniqueInSite', $evalInfo)) {
            $slug = $slugHelper->buildSlugForUniqueInSite($slug, $state);
        } else if (in_array('uniqueInPid', $evalInfo)) {
            $slug = $slugHelper->buildSlugForUniqueInPid($slug, $state);
        } else if (in_array('unique', $evalInfo)) {
            $slug = $slugHelper->buildSlugForUniqueInTable($slug, $state);
        }

        return $slug;
    }

}
