<?php
namespace GroupProject\NutritionWeb\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Nikhil Gosavi <nikhil.gosavi@hof-universiy.de>
 */
class ClientReportControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \GroupProject\NutritionWeb\Controller\ClientReportController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\GroupProject\NutritionWeb\Controller\ClientReportController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllClientReportsFromRepositoryAndAssignsThemToView()
    {

        $allClientReports = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $clientReportRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\ClientReportRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $clientReportRepository->expects(self::once())->method('findAll')->will(self::returnValue($allClientReports));
        $this->inject($this->subject, 'clientReportRepository', $clientReportRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('clientReports', $allClientReports);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenClientReportToView()
    {
        $clientReport = new \GroupProject\NutritionWeb\Domain\Model\ClientReport();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('clientReport', $clientReport);

        $this->subject->showAction($clientReport);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenClientReportToClientReportRepository()
    {
        $clientReport = new \GroupProject\NutritionWeb\Domain\Model\ClientReport();

        $clientReportRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\ClientReportRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $clientReportRepository->expects(self::once())->method('add')->with($clientReport);
        $this->inject($this->subject, 'clientReportRepository', $clientReportRepository);

        $this->subject->createAction($clientReport);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenClientReportToView()
    {
        $clientReport = new \GroupProject\NutritionWeb\Domain\Model\ClientReport();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('clientReport', $clientReport);

        $this->subject->editAction($clientReport);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenClientReportInClientReportRepository()
    {
        $clientReport = new \GroupProject\NutritionWeb\Domain\Model\ClientReport();

        $clientReportRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\ClientReportRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $clientReportRepository->expects(self::once())->method('update')->with($clientReport);
        $this->inject($this->subject, 'clientReportRepository', $clientReportRepository);

        $this->subject->updateAction($clientReport);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenClientReportFromClientReportRepository()
    {
        $clientReport = new \GroupProject\NutritionWeb\Domain\Model\ClientReport();

        $clientReportRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\ClientReportRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $clientReportRepository->expects(self::once())->method('remove')->with($clientReport);
        $this->inject($this->subject, 'clientReportRepository', $clientReportRepository);

        $this->subject->deleteAction($clientReport);
    }
}
