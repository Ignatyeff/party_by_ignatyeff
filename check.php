<?php

session_start();

require 'vendor/autoload.php';

$app = new \atk4\ui\App('Проверка');
$app->initLayout('Centered');

$check = new \atk4\data\Model(new \atk4\data\Persistence_Array($a));
$check->addField('password',['type'=>'password','required'=>TRUE]);

$form = $app->layout->add('Form');
$form->setModel($check);
if (isset($_ENV['pass']));{
  $pass = $_ENV['pass'];
} else {
  $pass='password';
}
$form->onSubmit(function($form) use($pass, $app) {
  if ($form->model['password'] == $pass) {
      $_SESSION['admin_access'] = 'fnupaw39r23rvwefk91248';
      return new \atk4\ui\jsExpression('document.location = "admin.php" ');
  } else {
      return new \atk4\ui\jsExpression('document.location = "index.php" ');
  }
 });
