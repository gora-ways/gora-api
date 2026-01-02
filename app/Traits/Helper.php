<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait Helper
{
   private function parseDate(?string $value): ?string
    {
        if (!$value) return null;
        try {
            // Accepts YYYY-MM-DD, MM/DD/YYYY, etc.
            return Carbon::parse($value)->toDateString();
        } catch (\Throwable $e) {
            return null; // ignore bad dates
        }
    }

    private function toYesNo(?string $v): ?string
    {
        if ($v === null || $v === '') return null;
        $v = strtolower(trim($v));
        return in_array($v, ['1','y','yes','true','t'], true) ? 'Yes'
             : (in_array($v, ['0','n','no','false','f'], true) ? 'No' : $v);
    }

    private function toNullableNumber($v): ?float
    {
        if ($v === null || $v === '') return null;
        $v = str_replace([','], '', $v);
        return is_numeric($v) ? (float)$v : null;
    }

}