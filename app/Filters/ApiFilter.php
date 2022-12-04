<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter {
    
    protected $safeField = [];

    protected $columnMap = [];

    protected $operatorMap = [];

    public function transform(Request $request) {
        $eloQuery = [];

        foreach ($this->safeField as $field => $operators) {
            $query = $request->query($field);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$field] ?? $field;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}