<?php
namespace GroupProject\NutritionWeb\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Nikhil Gosavi <nikhil.gosavi@hof-universiy.de>
 */
class ClientReportTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \GroupProject\NutritionWeb\Domain\Model\ClientReport
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \GroupProject\NutritionWeb\Domain\Model\ClientReport();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getReportReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getReport()
        );
    }

    /**
     * @test
     */
    public function setReportForStringSetsReport()
    {
        $this->subject->setReport('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'report',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getClientReturnsInitialValueForClients()
    {
        self::assertEquals(
            null,
            $this->subject->getClient()
        );
    }

    /**
     * @test
     */
    public function setClientForClientsSetsClient()
    {
        $clientFixture = new \GroupProject\NutritionWeb\Domain\Model\Clients();
        $this->subject->setClient($clientFixture);

        self::assertAttributeEquals(
            $clientFixture,
            'client',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNutritionistReturnsInitialValueForNutritionist()
    {
        self::assertEquals(
            null,
            $this->subject->getNutritionist()
        );
    }

    /**
     * @test
     */
    public function setNutritionistForNutritionistSetsNutritionist()
    {
        $nutritionistFixture = new \GroupProject\NutritionWeb\Domain\Model\Nutritionist();
        $this->subject->setNutritionist($nutritionistFixture);

        self::assertAttributeEquals(
            $nutritionistFixture,
            'nutritionist',
            $this->subject
        );
    }
}
