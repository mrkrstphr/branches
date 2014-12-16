<?php

use Branches\Domain\Entity\Family\Family;
use Branches\Domain\Entity\Person\Person;

describe('Family', function () {
    describe('->getPartner()', function () {
        it('should return the partner of a person in this family', function () {
            $family = new Family();
            $mother = (new Person())->setId(100);
            $father = (new Person())->setId(200);

            $family->addParent($mother)->addParent($father);

            assert($family->getPartner($mother) === $father, 'father expected but not returned');
            assert($family->getPartner($father) === $mother, 'mother expected but not returned');
        });
    });
});
