<?php

it('can render', function () {
    $contents = $this->view('create', [
        //
    ]);

    $contents->assertSee('');
});
