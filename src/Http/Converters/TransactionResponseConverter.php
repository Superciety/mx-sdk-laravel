<?php

namespace Superciety\ElrondSdk\Http\Converters;

use Illuminate\Support\Collection;
use Superciety\ElrondSdk\Api\Entities\Transaction;
use Superciety\ElrondSdk\Utils\FormatterUtil;

/**
 * find the corresponding typescript representation in our frontend core package:
 * https://github.com/Superciety/pwa-core-library
 */
class TransactionResponseConverter
{
    public static function single(Transaction $transaction): array
    {
        return [
            'type' => $transaction->getType(),
            'hash' => $transaction->txHash,
            'gasLimit' => $transaction->gasLimit,
            'gasPrice' => $transaction->gasPrice,
            'gasUsed' => $transaction->gasUsed,
            'miniBlockHash' => $transaction->miniBlockHash,
            'nonce' => $transaction->nonce,
            'receiver' => $transaction->receiver,
            'receiverShard' => $transaction->receiverShard,
            'sender' => $transaction->sender,
            'senderShard' => $transaction->senderShard,
            'signature' => $transaction->signature,
            'status' => $transaction->status,
            'value' => $transaction->value,
            'fee' => $transaction->fee,
            'timestamp' => $transaction->timestamp->timestamp,
            'time' => FormatterUtil::timeToHumanReadable($transaction->timestamp),
            'data' => $transaction->data,
            'tokenIdentifier' => $transaction->tokenIdentifier,
            'tokenValue' => $transaction->tokenValue,
        ];
    }

    public static function many(Collection $tokens): array
    {
        return collect($tokens)
            ->map(fn ($tokens) => self::single($tokens))
            ->toArray();
    }
}
