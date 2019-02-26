<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary' => '/usr/local/bin/wkhtmltopdf-amd64',
        'timeout' => false,
        'options' => array(
            'page-size' => 'A4',
            'margin-top' => 7,
            'margin-right' => 8,
            'margin-left' => 8,
            'margin-bottom' => 18,
            'footer-font-size' => 8,
        ),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary' => '"C:\Program Files\wkhtmltoimage\bin\wkhtmltoimage"',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
