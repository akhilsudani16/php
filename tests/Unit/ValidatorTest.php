<?php

use Core\Validator;

it('validates string', function () {
    expect(Validator::string('food'))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
});

it('validates a min length', function () {
    expect(Validator::string('foo', 20))->toBeFalse();
});

it('validate email', function () {
    expect(Validator::email('foo'))->toBeFalse();
    expect(Validator::email('foo@gmail.com'))->toBeTrue();
});

it('validate that a number is grater then a given number', function () {
    expect(Validator::greaterThan(10, 1))->toBeTrue();
    expect(Validator::greaterThan(10, 100))->toBeFalse();

});