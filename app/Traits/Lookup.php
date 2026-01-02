<?php

namespace App\Traits;

trait Lookup
{
    protected $filterColumns = [];

    public function scopeFilter($query, array $filters)
    {
        foreach ($this->filterColumns as $field) {
            if (!empty($filters[$field])) {
                $query->where($field, 'like', '%' . $filters[$field] . '%');
            }
        }
        return $query;
    }

}
