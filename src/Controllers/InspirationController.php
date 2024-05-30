<?php
namespace Ktith\Laravelexceptionnotifier\Controllers;

use Ktith\Laravelexceptionnotifier\Inspire;

class InspirationController
{
    public function __invoke(Inspire $inspire) {
        $quote = $inspire->justDoIt();
        return $quote;
    }
}
