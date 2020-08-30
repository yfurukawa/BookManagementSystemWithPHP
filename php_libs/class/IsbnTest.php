<?php

require_once('Isbn.php');

$isbn = new Isbn('4-8399-6234-0');

print($isbn->toIsbn13()."\n");
print($isbn->publisherCode()."\n");
