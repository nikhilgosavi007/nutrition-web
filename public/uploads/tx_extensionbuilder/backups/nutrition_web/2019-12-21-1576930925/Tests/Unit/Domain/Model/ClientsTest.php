<?php
namespace GroupProject\NutritionWeb\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Nikhil Gosavi <nikhil.gosavi@hof-universiy.de>
 */
class ClientsTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \GroupProject\NutritionWeb\Domain\Model\Clients
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \GroupProject\NutritionWeb\Domain\Model\Clients();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEmailReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailForStringSetsEmail()
    {
        $this->subject->setEmail('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'email',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAgeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAge()
        );
    }

    /**
     * @test
     */
    public function setAgeForIntSetsAge()
    {
        $this->subject->setAge(12);

        self::assertAttributeEquals(
            12,
            'age',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getHeightReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getHeight()
        );
    }

    /**
     * @test
     */
    public function setHeightForIntSetsHeight()
    {
        $this->subject->setHeight(12);

        self::assertAttributeEquals(
            12,
            'height',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getWeightReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getWeight()
        );
    }

    /**
     * @test
     */
    public function setWeightForIntSetsWeight()
    {
        $this->subject->setWeight(12);

        self::assertAttributeEquals(
            12,
            'weight',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBloodgroupReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getBloodgroup()
        );
    }

    /**
     * @test
     */
    public function setBloodgroupForStringSetsBloodgroup()
    {
        $this->subject->setBloodgroup('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'bloodgroup',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBmiReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getBmi()
        );
    }

    /**
     * @test
     */
    public function setBmiForIntSetsBmi()
    {
        $this->subject->setBmi(12);

        self::assertAttributeEquals(
            12,
            'bmi',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPhotoReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getPhoto()
        );
    }

    /**
     * @test
     */
    public function setPhotoForFileReferenceSetsPhoto()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setPhoto($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'photo',
            $this->subject
        );
    }
}
