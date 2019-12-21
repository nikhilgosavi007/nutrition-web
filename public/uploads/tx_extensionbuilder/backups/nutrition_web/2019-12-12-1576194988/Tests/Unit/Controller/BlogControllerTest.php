<?php
namespace GroupProject\NutritionWeb\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Nikhil Gosavi <nikhil.gosavi@hof-universiy.de>
 */
class BlogControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \GroupProject\NutritionWeb\Controller\BlogController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\GroupProject\NutritionWeb\Controller\BlogController::class)
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
    public function listActionFetchesAllBlogsFromRepositoryAndAssignsThemToView()
    {

        $allBlogs = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $blogRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\BlogRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $blogRepository->expects(self::once())->method('findAll')->will(self::returnValue($allBlogs));
        $this->inject($this->subject, 'blogRepository', $blogRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('blogs', $allBlogs);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenBlogToView()
    {
        $blog = new \GroupProject\NutritionWeb\Domain\Model\Blog();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('blog', $blog);

        $this->subject->showAction($blog);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenBlogToBlogRepository()
    {
        $blog = new \GroupProject\NutritionWeb\Domain\Model\Blog();

        $blogRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\BlogRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $blogRepository->expects(self::once())->method('add')->with($blog);
        $this->inject($this->subject, 'blogRepository', $blogRepository);

        $this->subject->createAction($blog);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenBlogToView()
    {
        $blog = new \GroupProject\NutritionWeb\Domain\Model\Blog();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('blog', $blog);

        $this->subject->editAction($blog);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenBlogInBlogRepository()
    {
        $blog = new \GroupProject\NutritionWeb\Domain\Model\Blog();

        $blogRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\BlogRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $blogRepository->expects(self::once())->method('update')->with($blog);
        $this->inject($this->subject, 'blogRepository', $blogRepository);

        $this->subject->updateAction($blog);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenBlogFromBlogRepository()
    {
        $blog = new \GroupProject\NutritionWeb\Domain\Model\Blog();

        $blogRepository = $this->getMockBuilder(\GroupProject\NutritionWeb\Domain\Repository\BlogRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $blogRepository->expects(self::once())->method('remove')->with($blog);
        $this->inject($this->subject, 'blogRepository', $blogRepository);

        $this->subject->deleteAction($blog);
    }
}
