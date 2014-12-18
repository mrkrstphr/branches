<?php

use Branches\Domain\Entity\Person\Name;
use Branches\Domain\Entity\Person\Person;

describe('Person', function () {
    describe('->addName()', function () {
        it('should add the name to the collection of names', function () {
            $person = new Person();
            $name = new Name('Abraham', 'Lincoln');
            $person->addName($name);

            assert($person->getNames()->contains($name), 'name is not in the collection');
        });
    });

    describe('->getPreferredName()', function () {
        it('should return the first name in the name collection', function () {
            $person = new Person();
            $name = new Name();
            $name->setGiven('Abraham')->setSurname('Lincoln');
            $name2 = new Name();
            $name2->setNick('Honest Abe');

            $person->addName($name)->addName($name2);

            assert($name === $person->getPreferredName(), 'incorrect name returned');
        });
    });
});
