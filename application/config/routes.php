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
    'contact/send' => [
        'controller' => 'ContactViewController',
        'action' => 'send'
    ],
    'contact' => [
        'controller' => 'ContactViewController',
        'action' => 'index'
    ],     
    'test' => [
        'controller' => 'TestViewController',
        'action' => 'index'
    ]
];
