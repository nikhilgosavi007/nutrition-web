<?php
namespace GroupProject\NutritionWeb\Domain\Model;


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
 * Nutritionist
 */
class Nutritionist extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * email
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $email = '';

    /**
     * qualification
     * 
     * @var string
     */
    protected $qualification = '';

    /**
     * ratings
     * 
     * @var string
     */
    protected $ratings = '';

    /**
     * about
     * 
     * @var string
     */
    protected $about = '';

    /**
     * services
     * 
     * @var string
     */
    protected $services = '';

    /**
     * image
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * clients
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GroupProject\NutritionWeb\Domain\Model\Clients>
     */
    protected $clients = null;

    /**
     * blogs
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GroupProject\NutritionWeb\Domain\Model\Blog>
     */
    protected $blogs = null;

    /**
     * specializations
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GroupProject\NutritionWeb\Domain\Model\Specialization>
     */
    protected $specializations = null;

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->clients = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->blogs = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->specializations = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     * 
     * @return string $name
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
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the email
     * 
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     * 
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the qualification
     * 
     * @return string $qualification
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * Sets the qualification
     * 
     * @param string $qualification
     * @return void
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;
    }

    /**
     * Returns the ratings
     * 
     * @return string $ratings
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    /**
     * Sets the ratings
     * 
     * @param string $ratings
     * @return void
     */
    public function setRatings($ratings)
    {
        $this->ratings = $ratings;
    }

    /**
     * Returns the about
     * 
     * @return string $about
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Sets the about
     * 
     * @param string $about
     * @return void
     */
    public function setAbout($about)
    {
        $this->about = $about;
    }

    /**
     * Returns the services
     * 
     * @return string $services
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Sets the services
     * 
     * @param string $services
     * @return void
     */
    public function setServices($services)
    {
        $this->services = $services;
    }

    /**
     * Adds a Clients
     * 
     * @param \GroupProject\NutritionWeb\Domain\Model\Clients $client
     * @return void
     */
    public function addClient(\GroupProject\NutritionWeb\Domain\Model\Clients $client)
    {
        $this->clients->attach($client);
    }

    /**
     * Removes a Clients
     * 
     * @param \GroupProject\NutritionWeb\Domain\Model\Clients $clientToRemove The Clients to be removed
     * @return void
     */
    public function removeClient(\GroupProject\NutritionWeb\Domain\Model\Clients $clientToRemove)
    {
        $this->clients->detach($clientToRemove);
    }

    /**
     * Returns the clients
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GroupProject\NutritionWeb\Domain\Model\Clients> $clients
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Sets the clients
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GroupProject\NutritionWeb\Domain\Model\Clients> $clients
     * @return void
     */
    public function setClients(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $clients)
    {
        $this->clients = $clients;
    }

    /**
     * Adds a Blog
     * 
     * @param \GroupProject\NutritionWeb\Domain\Model\Blog $blog
     * @return void
     */
    public function addBlog(\GroupProject\NutritionWeb\Domain\Model\Blog $blog)
    {
        $this->blogs->attach($blog);
    }

    /**
     * Removes a Blog
     * 
     * @param \GroupProject\NutritionWeb\Domain\Model\Blog $blogToRemove The Blog to be removed
     * @return void
     */
    public function removeBlog(\GroupProject\NutritionWeb\Domain\Model\Blog $blogToRemove)
    {
        $this->blogs->detach($blogToRemove);
    }

    /**
     * Returns the blogs
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GroupProject\NutritionWeb\Domain\Model\Blog> $blogs
     */
    public function getBlogs()
    {
        return $this->blogs;
    }

    /**
     * Sets the blogs
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GroupProject\NutritionWeb\Domain\Model\Blog> $blogs
     * @return void
     */
    public function setBlogs(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $blogs)
    {
        $this->blogs = $blogs;
    }

    /**
     * Adds a Specialization
     * 
     * @param \GroupProject\NutritionWeb\Domain\Model\Specialization $specialization
     * @return void
     */
    public function addSpecialization(\GroupProject\NutritionWeb\Domain\Model\Specialization $specialization)
    {
        $this->specializations->attach($specialization);
    }

    /**
     * Removes a Specialization
     * 
     * @param \GroupProject\NutritionWeb\Domain\Model\Specialization $specializationToRemove The Specialization to be removed
     * @return void
     */
    public function removeSpecialization(\GroupProject\NutritionWeb\Domain\Model\Specialization $specializationToRemove)
    {
        $this->specializations->detach($specializationToRemove);
    }

    /**
     * Returns the specializations
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GroupProject\NutritionWeb\Domain\Model\Specialization> $specializations
     */
    public function getSpecializations()
    {
        return $this->specializations;
    }

    /**
     * Sets the specializations
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GroupProject\NutritionWeb\Domain\Model\Specialization> $specializations
     * @return void
     */
    public function setSpecializations(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $specializations)
    {
        $this->specializations = $specializations;
    }

    /**
     * Returns the image
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
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
}
