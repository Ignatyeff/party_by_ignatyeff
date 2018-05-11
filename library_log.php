<?php
require 'vendor/autoload.php';
require 'connection.php';
$app = new \atk4\ui\App('Library');
$app->initLayout('Centered');


$someone = new Librarian($db);
$form = $app->layout->add('Form');
$form->setModel(new Librarian($db));
$form->buttonSave->set('Вход');
$form->onSubmit(function($form) use ($someone) {

//  $someone = $form->model->tryLoadBy('nick_name',$form->model['nick_name']);
  $someone->tryLoadBy('name',$form->model['name']);
  if ($someone['surname'] == $form->model['surname']){
    if ($someone['password'] == $form->model['password']) {
      $_SESSION['user_id'] = $someone->id;
      $_SESSION['status'] = 'librarian';
      return new \atk4\ui\jsExpression('document.location="main.php"');
    } else {
      $someone->unload();
      $er = (new \atk4\ui\jsNotify('Incorrect username or password.'));
      $er->setColor('red');
      return $er;
    }
  } else {
    $someone->unload();
    $er = (new \atk4\ui\jsNotify('Incorrect username or password.'));
    $er->setColor('red');
    return $er;
  }
});
