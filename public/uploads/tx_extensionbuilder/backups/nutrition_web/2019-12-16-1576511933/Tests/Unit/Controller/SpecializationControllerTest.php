<?php
namespace GroupProject\NutritionWeb\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Nikhil Gosavi <nikhil.gosavi@hof-universiy.de>
 */
class SpecializationControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \GroupProject\NutritionWeb\Controller\SpecializationController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\GroupProject\NutritionWeb\Controller\SpecializationController::class)
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
    public function listActionFetchesAllSpecializationsFromRepositoryAndAssignsThemToView()
    {

        $allSpecializations = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $specializationRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\SpecializationRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $specializationRepository->expects(self::once())->method('findAll')->will(self::returnValue($allSpecializations));
        $this->inject($this->subject, 'specializationRepository', $specializationRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('specializations', $allSpecializations);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenSpecializationToView()
    {
        $specialization = new \GroupProject\NutritionWeb\Domain\Model\Specialization();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('specialization', $specialization);

        $this->subject->showAction($specialization);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenSpecializationToSpecializationRepository()
    {
        $specialization = new \GroupProject\NutritionWeb\Domain\Model\Specialization();

        $specializationRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\SpecializationRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $specializationRepository->expects(self::once())->method('add')->with($specialization);
        $this->inject($this->subject, 'specializationRepository', $specializationRepository);

        $this->subject->createAction($specialization);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenSpecializationToView()
    {
        $specialization = new \GroupProject\NutritionWeb\Domain\Model\Specialization();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('specialization', $specialization);

        $this->subject->editAction($specialization);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenSpecializationInSpecializationRepository()
    {
        $specialization = new \GroupProject\NutritionWeb\Domain\Model\Specialization();

        $specializationRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\SpecializationRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $specializationRepository->expects(self::once())->method('update')->with($specialization);
        $this->inject($this->subject, 'specializationRepository', $specializationRepository);

        $this->subject->updateAction($specialization);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenSpecializationFromSpecializationRepository()
    {
        $specialization = new \GroupProject\NutritionWeb\Domain\Model\Specialization();

        $specializationRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\SpecializationRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $specializationRepository->expects(self::once())->method('remove')->with($specialization);
        $this->inject($this->subject, 'specializationRepository', $specializationRepository);

        $this->subject->deleteAction($specialization);
    }
}
