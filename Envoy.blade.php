@servers(['web' => ['root@128.199.63.237']])

@task('deploy', ['on' => 'web'])
    {{-- go to the right directory --}}
    cd /var/git/directevents

    {{-- pull master branch --}}
    git pull origin master

    {{-- run migrations --}}
    php artisan migrate
@endtask

@task('foo', ['on' => 'web'])
    ls -la
@endtask