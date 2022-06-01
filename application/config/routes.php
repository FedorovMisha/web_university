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
    ],
    'guest-book' => [
        'controller' => 'GuestBookViewController',
        'action' => 'index'
    ], 
    'add-comment' => [
        'controller' => 'GuestBookViewController',
        'action' => 'addComment'
    ],
    'comment-upload' => [
        'controller' => 'GuestBookViewController',
        'action' => 'admin'
    ], 
    'admin/upload-comments' => [
        'controller' => 'GuestBookViewController',
        'action' => 'uploadComments'
    ],
    'admin/blog' => [
        'controller' => 'BlogAdminViewController',
        'action' => 'index'
    ],
    'admin/create-blog' => [
        'controller' => 'BlogAdminViewController',
        'action' => 'create'
    ],
    'blogs' => [
        'controller' => 'BlogAdminViewController',
        'action' => 'blogs'
    ]
];
