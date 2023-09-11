<?php

use function Pest\Laravel\artisan;

it('run the command deploy:permission successfully.', function () {
    artisan('deploy:permissions')->run();

});
