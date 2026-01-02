<?php

namespace App\Traits;

use App\Services\ActivityLoggerService;

trait LogsActivity
{
    public static function bootLogsActivity(): void
    {
        static::created(function ($model) {
            $meta = ActivityLoggerService::buildSnapshot($model, 'created');
            app(ActivityLoggerService::class)->log($model, 'created', $meta);
        });

        static::updated(function ($model) {
            $meta = ActivityLoggerService::buildUpdateChanges($model);
            if ($meta) {
                app(ActivityLoggerService::class)->log($model, 'updated', $meta);
            }
        });

        static::deleted(function ($model) {
            // for soft deletes, this triggers before actually gone; snapshot still available
            $meta = ActivityLoggerService::buildSnapshot($model, 'deleted');
            app(ActivityLoggerService::class)->log($model, 'deleted', $meta);
        });

        // if using SoftDeletes:
        if (method_exists(static::class, 'restored')) {
            static::restored(function ($model) {
                app(ActivityLoggerService::class)->log($model, 'restored', null);
            });

            static::forceDeleted(function ($model) {
                $meta = ActivityLoggerService::buildSnapshot($model, 'force_deleted');
                app(ActivityLoggerService::class)->log($model, 'force_deleted', $meta);
            });
        }
    }
}
