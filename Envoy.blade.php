@servers(['web' => ['git@128.199.63.237']])

@task('deploy', ['on' => 'web'])
    cd /var/git/directevents

    @if ($branch)
        git pull origin {{ $branch }}
    @endif

    php artisan migrate
@endtask