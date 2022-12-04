<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class ReservationFilter extends ApiFilter {

    protected $safeField = [
        'customer_id' => ['eq'],
        'hotel_id' => ['eq'],
        'room_id' => ['eq'],
        'booked_date' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'check_in' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'check_out' => ['eq', 'lt', 'gt', 'lte', 'gte'],
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'hotelId' => 'hotel_id',
        'roomId' => 'room_id',
        'bookedDate' => 'booked_date',
        'check_in' => 'check_in',
        'check_out' => 'check_out'
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