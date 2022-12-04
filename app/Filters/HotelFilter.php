<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class HotelFilter extends ApiFilter {
    
    protected $safeField = [
        'name' => ['eq'],
        'address' => ['eq'],
        'description' => ['eq'],
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