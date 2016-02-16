<?php

use Clearvox\DateConstraints\Constraints\Month\SpecificMonthConstraint;

class SpecificMonthConstraintTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var SpecificMonthConstraint
     */
    public $constraint;

    public function setUp()
    {
        $this->constraint = new SpecificMonthConstraint(SpecificMonthConstraint::JANUARY);
    }

    public function testSingleMonthIsValid()
    {
        $this->assertTrue($this->constraint->isValid(new DateTime('2016-01-01')));
    }

    public function testSingleMonthIsInvalid()
    {
        $this->assertFalse($this->constraint->isValid(new DateTime('2016-02-01')));
    }

    public function testMultipleMonthIsValid()
    {
        $this->constraint->addMonth(SpecificMonthConstraint::FEBRUARY);

        $this->assertTrue($this->constraint->isValid(new DateTime('2016-01-01')));
        $this->assertTrue($this->constraint->isValid(new DateTime('2016-02-01')));
    }

    public function testMultipleMonthIsInvalid()
    {
        $this->constraint->addMonth(SpecificMonthConstraint::FEBRUARY);

        $this->assertFalse($this->constraint->isValid(new DateTime('2016-03-01')));
    }
}