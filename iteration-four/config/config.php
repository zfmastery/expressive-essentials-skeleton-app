<?php

// config.php
use Zend\Stdlib\ArrayUtils;
use Zend\Stdlib\Glob;

$config = [];

foreach (Glob::glob(
    'config/autoload/{{,*.}global,{,*.}local}.php',
    Glob::GLOB_BRACE) as $file
) {
    $config = ArrayUtils::merge($config, include $file);
}

return new ArrayObject($config, ArrayObject::ARRAY_AS_PROPS);
