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

desc('Cleanup previous release');
task(
    'cleanup:previous_release',
    function () {
        if (has('previous_release')) {
            $sudo = get('clear_use_sudo') ? 'sudo' : '';
            foreach (array_filter(get('cleanup_previous_release_dirs')) as $dir) {
                run("$sudo rm -rf {{previous_release}}/$dir");
            }
        }
    }
)->hidden();
