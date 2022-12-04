<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class CustomersFilter extends ApiFilter {
    
    protected $safeField = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'gender' => ['eq'],
        'date_of_birth' => ['eq', 'gt', 'lt']
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