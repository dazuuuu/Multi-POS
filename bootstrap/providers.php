<?php

use App\Providers\AppServiceProvider;
use App\Providers\TenancyServiceProvider;
use App\Modules\Core\Providers\CoreModuleServiceProvider;

return [
    AppServiceProvider::class,
    TenancyServiceProvider::class,
    CoreModuleServiceProvider::class,
];
