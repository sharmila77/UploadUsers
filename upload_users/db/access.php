<?php

//Capability to upload CSV file
$capabilities = array(
    'local/csvuploader:uploadcsv' => array(
        'riskbitmask' => RISK_SPAM | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
            'admin' => CAP_ALLOW,
        ),
    ),
);
