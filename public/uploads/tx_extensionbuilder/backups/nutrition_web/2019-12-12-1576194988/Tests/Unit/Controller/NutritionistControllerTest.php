<?php
namespace GroupProject\NutritionWeb\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Nikhil Gosavi <nikhil.gosavi@hof-universiy.de>
 */
class NutritionistControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \GroupProject\NutritionWeb\Controller\NutritionistController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\GroupProject\NutritionWeb\Controller\NutritionistController::class)
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
    public function listActionFetchesAllNutritionistsFromRepositoryAndAssignsThemToView()
    {

        $allNutritionists = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $nutritionistRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\NutritionistRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $nutritionistRepository->expects(self::once())->method('findAll')->will(self::returnValue($allNutritionists));
        $this->inject($this->subject, 'nutritionistRepository', $nutritionistRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('nutritionists', $allNutritionists);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenNutritionistToView()
    {
        $nutritionist = new \GroupProject\NutritionWeb\Domain\Model\Nutritionist();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('nutritionist', $nutritionist);

        $this->subject->showAction($nutritionist);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenNutritionistToNutritionistRepository()
    {
        $nutritionist = new \GroupProject\NutritionWeb\Domain\Model\Nutritionist();

        $nutritionistRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\NutritionistRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $nutritionistRepository->expects(self::once())->method('add')->with($nutritionist);
        $this->inject($this->subject, 'nutritionistRepository', $nutritionistRepository);

        $this->subject->createAction($nutritionist);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenNutritionistToView()
    {
        $nutritionist = new \GroupProject\NutritionWeb\Domain\Model\Nutritionist();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('nutritionist', $nutritionist);

        $this->subject->editAction($nutritionist);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenNutritionistInNutritionistRepository()
    {
        $nutritionist = new \GroupProject\NutritionWeb\Domain\Model\Nutritionist();

        $nutritionistRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\NutritionistRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $nutritionistRepository->expects(self::once())->method('update')->with($nutritionist);
        $this->inject($this->subject, 'nutritionistRepository', $nutritionistRepository);

        $this->subject->updateAction($nutritionist);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenNutritionistFromNutritionistRepository()
    {
        $nutritionist = new \GroupProject\NutritionWeb\Domain\Model\Nutritionist();

        $nutritionistRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\NutritionistRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $nutritionistRepository->expects(self::once())->method('remove')->with($nutritionist);
        $this->inject($this->subject, 'nutritionistRepository', $nutritionistRepository);

        $this->subject->deleteAction($nutritionist);
    }
}
