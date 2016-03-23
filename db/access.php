<?php

defined('MOODLE_INTERNAL') || die();

$capabilities = array(
    'tool/obsolete_user_removal:obsolete_user_removal' => array(
        'riskbitmask' => RISK_SPAM,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'moodle/site:obsolete_user_removal',
    ),
);
