<?php
$app = new \atk4\ui\App('Library');
$app->initLayout('Admin');
$app->layout->leftMenu->addItem(['Все книги', 'icon'=>'book'],['book']);
$app->layout->leftMenu->addItem(['Книги, который надо вернуть', 'icon'=>'book'],['book']);
$app->layout->leftMenu->addItem(['Admin', 'icon'=>'building'],['check']);
