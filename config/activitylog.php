<?php

return [
    // fields you don’t want to store in meta
    'exclude_attributes' => [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'updated_at',
        'created_at', // usually noise
    ],
    // for "created" and "deleted", keep only these attributes; if empty => keep all (minus excludes)
    'snapshot_whitelist' => [
        // e.g. 'name', 'email'
    ],
];
