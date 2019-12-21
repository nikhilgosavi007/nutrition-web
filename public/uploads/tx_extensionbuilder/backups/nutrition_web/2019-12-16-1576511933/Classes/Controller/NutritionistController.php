<?php
namespace GroupProject\NutritionWeb\Controller;


/***
 *
 * This file is part of the "Nutrition Web Extension" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Nikhil Gosavi <nikhil.gosavi@hof-universiy.de>
 *
 ***/
/**
 * NutritionistController
 */
class NutritionistController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * nutritionistRepository
     * 
     * @var \GroupProject\NutritionWeb\Domain\Repository\NutritionistRepository
     */
    protected $nutritionistRepository = null;

    /**
     * @param \GroupProject\NutritionWeb\Domain\Repository\NutritionistRepository $nutritionistRepository
     */
    public function injectNutritionistRepository(\GroupProject\NutritionWeb\Domain\Repository\NutritionistRepository $nutritionistRepository)
    {
        $this->nutritionistRepository = $nutritionistRepository;
    }

    /**
     * 
     * @param string $search
     */
    public function listAction($search = null)
    {
        if($search === null){
            $nutritionists = $this->nutritionistRepository->findAll();
        } else {
            $nutritionists = $this->nutritionistRepository->findBySearch($search);
        }
        $this->view->assign('search', $search);
        $this->view->assign('nutritionists', $nutritionists);
    }

    /**
     * action show
     * 
     * @param \GroupProject\NutritionWeb\Domain\Model\Nutritionist $nutritionist
     * @return void
     */
    public function showAction(\GroupProject\NutritionWeb\Domain\Model\Nutritionist $nutritionist)
    {
        $this->view->assign('nutritionist', $nutritionist);
    }

    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * action create
     * 
     * @param \GroupProject\NutritionWeb\Domain\Model\Nutritionist $newNutritionist
     * @return void
     */
    public function createAction(\GroupProject\NutritionWeb\Domain\Model\Nutritionist $newNutritionist)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->nutritionistRepository->add($newNutritionist);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \GroupProject\NutritionWeb\Domain\Model\Nutritionist $nutritionist
     * @ignorevalidation $nutritionist
     * @return void
     */
    public function editAction(\GroupProject\NutritionWeb\Domain\Model\Nutritionist $nutritionist)
    {
        $this->view->assign('nutritionist', $nutritionist);
    }

    /**
     * action update
     * 
     * @param \GroupProject\NutritionWeb\Domain\Model\Nutritionist $nutritionist
     * @return void
     */
    public function updateAction(\GroupProject\NutritionWeb\Domain\Model\Nutritionist $nutritionist)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->nutritionistRepository->update($nutritionist);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \GroupProject\NutritionWeb\Domain\Model\Nutritionist $nutritionist
     * @return void
     */
    public function deleteAction(\GroupProject\NutritionWeb\Domain\Model\Nutritionist $nutritionist)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->nutritionistRepository->remove($nutritionist);
        $this->redirect('list');
    }
}
