<?php

use Core\Container;

test('it resolve something out of container', function () {

    $container = new Container();

    $container->bind('foo', fn() => 'bar');

    $result = $container->resolve('foo');

    expect($result)->toBe('bar');

});
