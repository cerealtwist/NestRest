<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class InvoicesFilter extends ApiFilter {

    protected $safeField = [
        'customer_id' => ['eq'],
        'room_id' => ['eq'],
        'price' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'status' => ['eq', 'neq'],
        'booked_date' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'paid_date' => ['eq', 'lt', 'gt', 'lte', 'gte'],
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'roomId' => 'room_id',
        'bookedDate' => 'booked_date',
        'paidDate' => 'paid_date'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'neq' => '!=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
        'in' => 'in'
    ];

}