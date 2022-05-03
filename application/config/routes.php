<?php

$routes = [
    '' => [
        'controller' => 'MainViewController',
        'action' => 'index'
    ], 
    'hobbies' => [
        'controller' => "HobbiesViewController",
        'action' => 'index'
    ], 
    'album' => [
        'controller' => "AlbumViewController",
        'action' => 'index'
    ], 
    'contact' => [
        'controller' => 'ContactViewController',
        'action' => 'index'
    ],     
    'contact/send' => [
        'controller' => 'ContactViewController',
        'action' => 'send'
    ],
    'test' => [
        'controller' => 'TestViewController',
        'action' => 'index'
    ]
];
