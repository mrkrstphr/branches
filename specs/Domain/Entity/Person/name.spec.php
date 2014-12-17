<?php

use Branches\Domain\Entity\Person\Name;

describe('Name', function () {
    describe('->__toString()', function () {
        it('should show given + surname when only those are present', function () {
            $name = new Name('William Jefferson', 'Clinton');
            assert('William Jefferson Clinton' === (string)$name, 'incorrect name result');
        });

        it('should include the surname prefix when present', function () {
            $name = new Name('John', 'Jong');
            $name->setSurnamePrefix('de');

            assert('John de Jong' == (string)$name, 'incorrect name with surname prefix');
        });

        it('should include the suffix when present', function () {
            $name = new Name('John', 'Williams');
            $name->setSuffix('Jr');

            assert('John Williams Jr' === (string)$name, 'incorrect name with suffix');
        });

        it('should include the name prefix when present', function () {
            $name = new Name('Samuel', 'Wilson');
            $name->setPrefix('Uncle');

            assert('Uncle Samuel Wilson' === (string)$name, 'incorrect name with prefix');
        });
    });
});
