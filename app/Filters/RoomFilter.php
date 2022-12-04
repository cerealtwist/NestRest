<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class RoomFilter extends ApiFilter {
    
    protected $safeField = [
        'number' => ['eq'],
        'room_type' => ['eq'],
        'hotel_id' => ['eq'],
        'price' => ['eq', 'gt', 'lt', 'lte', 'gte'],
        'status' => ['eq']
    ];

    protected $columnMap = [
        'dateOfBirth' => 'date_of_birth'
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