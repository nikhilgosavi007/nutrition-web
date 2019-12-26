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
 * ClientReportController
 */
class ClientReportController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{


    /**
     * clientReportRepository
     *
     * @var \GroupProject\NutritionWeb\Domain\Repository\ClientReportRepository
     */
    protected $clientReportRepository = null;

    /**
     * @param \GroupProject\NutritionWeb\Domain\Repository\ClientReportRepository $clientReportRepository
     */
    public function injectClientReportRepository(\GroupProject\NutritionWeb\Domain\Repository\ClientReportRepository $clientReportRepository)
    {
        $this->clientReportRepository = $clientReportRepository;
    }

    /**
     * clientsRepository
     *
     * @var \GroupProject\NutritionWeb\Domain\Repository\ClientsRepository
     */
    protected $clientsRepository = null;

    /**
     * @param \GroupProject\NutritionWeb\Domain\Repository\ClientsRepository $clientsRepository
     */
    public function injectClientsRepository(\GroupProject\NutritionWeb\Domain\Repository\ClientsRepository $clientsRepository)
    {
        $this->clientsRepository = $clientsRepository;
    }


    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $clientReports = $this->clientReportRepository->findAll();
        $this->view->assign('clientReports', $clientReports);
        //var_dump($clientReports); die();
        $client = $this->clientsRepository->findByUid(10);
        $query = $this->clientReportRepository->createQuery();
        $query->contains('client', $client);
        $individualReports = $query->execute();

        $this->view->assign('abc',  $individualReports);
    }

    /**
     * action show
     *
     * @param \GroupProject\NutritionWeb\Domain\Model\ClientReport $clientReport
     * @return void
     */
    public function showAction(\GroupProject\NutritionWeb\Domain\Model\ClientReport $clientReport)
    {
        $this->view->assign('clientReport', $clientReport);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction(\GroupProject\NutritionWeb\Domain\Model\Nutritionist $nutritionist,\GroupProject\NutritionWeb\Domain\Model\Clients $clients)
    {
        $this->view->assign('nutritionist',$nutritionist);
        $this->view->assign('clients',$clients);
    }

    /**
     * action create
     *
     * @param \GroupProject\NutritionWeb\Domain\Model\ClientReport $newClientReport
     * @return void
     */
    public function createAction(\GroupProject\NutritionWeb\Domain\Model\ClientReport $newClientReport)
    {

        $this->clientReportRepository->add($newClientReport);
        $client = $newClientReport->getClient();
        $nutritionist = $newClientReport->getNutritionist();
        $this->addFlashMessage('New presciption submited for '.$client->getName(), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::INFO);
        $this->redirect('new',NULL,NULL, ['nutritionist' => $nutritionist,'clients'=>$client]);
    }

    /**
     * action edit
     *
     * @param \GroupProject\NutritionWeb\Domain\Model\ClientReport $clientReport
     * @ignorevalidation $clientReport
     * @return void
     */
    public function editAction(\GroupProject\NutritionWeb\Domain\Model\ClientReport $clientReport)
    {
        $this->view->assign('clientReport', $clientReport);
    }

    /**
     * action update
     *
     * @param \GroupProject\NutritionWeb\Domain\Model\ClientReport $clientReport
     * @return void
     */
    public function updateAction(\GroupProject\NutritionWeb\Domain\Model\ClientReport $clientReport)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->clientReportRepository->update($clientReport);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \GroupProject\NutritionWeb\Domain\Model\ClientReport $clientReport
     * @return void
     */
    public function deleteAction(\GroupProject\NutritionWeb\Domain\Model\ClientReport $clientReport)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->clientReportRepository->remove($clientReport);
        $this->redirect('list');
    }
}
