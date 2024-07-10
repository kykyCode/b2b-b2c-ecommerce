<?php

namespace App\Enums;

enum PaymentType: string
{
    case BankTransfer = 'bank_transfer';
    case Stripe = 'stripe';
}
