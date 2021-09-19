<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'xuma');

// Project repository
set('repository', 'git@gitlab.bulutfon.com:sumasa.io/sumasa.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', ['.env']);
add('shared_dirs', ['node_modules']);
set('keep_releases', 5);
set('writable_use_sudo', false);
// Writable dirs by web server
add('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

host('95.173.187.229')
    ->user('sumasa')
    ->set('deploy_path', '~/{{application}}');

task('yarn:build', function () {
    run("cd {{release_path}} && yarn && yarn dev", ['timeout' => null, 'tty' => true]);
    write('Yarn build is done!');

});


//task('supervisor:reload', function () {
//    run("cd {{release_path}} && supervisorctl restart all");
//});

task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'artisan:optimize',
    'artisan:migrate',
    'deploy:symlink',
    'deploy:unlock',
    'yarn:build',
    'cleanup'
]);

after('deploy:failed', 'deploy:unlock');

before('deploy:symlink', 'artisan:migrate');

task('deploy:done', function () {
    write('Supervisor restarting services!');
    run("cd {{release_path}} && supervisorctl restart all", ['timeout' => null, 'tty' => true]);
});

after('deploy', 'deploy:done');
