<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'teorihandbok');

// Project repository
set('repository', 'git@github.com:chas-academy/05-dynamisk-webbplats-php-eleninikou-1.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

host('ssh.binero.se')
    ->set('deploy_path', '~/eleninikou.chas.academy/public_html') 
    ->user('226747_eleninik')
    ->port(22);   
    

// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
