<?php

namespace Peerme\Multiversx\Tests;

use Peerme\Multiversx\Elrond;

it('gets economics', function () {
    fakeApiRequestWithResponse('/economics', 'network/economics.json');

    $actual = Elrond::api()
        ->network()
        ->getEconomics();

    assertMatchesResponseSnapshot($actual);
});

it('gets constants', function () {
    fakeApiRequestWithResponse('/constants', 'network/constants.json');

    $actual = Elrond::api()
        ->network()
        ->getNetworkConstants();

    assertMatchesResponseSnapshot($actual);
});
