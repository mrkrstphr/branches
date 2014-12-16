<?php

use Branches\Domain\Entity\Person\Name;

describe('Name', function () {
    describe('->__toString()', function () {
        it('should show given + surname when only those are present', function () {
            $name = new Name('William Jefferson', 'Clinton');
            assert('William Jefferson Clinton' === (string)$name, 'incorrect name result');
        });

        it('should include the surname prefix when present');

        it('should include the surname suffix when present');

        it('should include the name prefix when present');
    });
});
