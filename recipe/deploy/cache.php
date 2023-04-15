<?php
declare(strict_types=1);

/*
 * This file is part of bwein deployer recipe.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Deployer;

desc('Clear status cache');
task(
    'deploy:cache_status_clear',
    function () {
        \clearstatcache(true);
    }
)->hidden();

set('public_url', '');
set('opcache_webroot', 'web');
set('opcache_filename', 'opcache.php');

desc('Reset OPcache');
task(
    'deploy:opcache_reset',
    static function () {
        run(
            'cd {{release_path}} && echo "<?php opcache_reset();" > {{opcache_webroot}}/{{opcache_filename}} && curl -sL {{public_url}}/{{opcache_filename}} && rm {{opcache_webroot}}/{{opcache_filename}}'
        );
    }
)->hidden();
