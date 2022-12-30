<?php

namespace Peerme\Multiversx\Api\Entities;

use Peerme\Multiversx\Api\ApiTransformable;

final class NetworkConstants
{
    use ApiTransformable;

    public function __construct(
        public string $chainId,
        public int $gasPerDataByte,
        public int $minGasLimit,
        public int $minGasPrice,
        public int $minTransactionVersion,
    ) {
    }
}
