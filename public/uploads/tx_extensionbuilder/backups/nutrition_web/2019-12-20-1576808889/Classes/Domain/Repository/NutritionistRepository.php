<?php
namespace GroupProject\NutritionWeb\Domain\Repository;


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
 * @param string $search
 * @return array|QueryResultInterface|Nutritionist[]
 */
class NutritionistRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @param string $search
     */
    public function findBySearch(string $search)
    {
        $query = $this->createQuery();
        $constraints = [];
        $constraints[] = $query->like('name', '%' . $search . '%');
        $constraints[] = $query->like('specializations', '%' . $search . '%');
        $query->matching(
        $query->logicalOr($constraints)
        );
        return $query->execute();
    }
}
