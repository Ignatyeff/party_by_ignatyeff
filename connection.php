<?php
require 'vendor/autoload.php';

$db = new \atk4\data\Persistence_SQL('mysql:dbname=library;host=localhost','root','');



class Client extends \atk4\data\Model {

  public $table = 'client';

  function init() {

    parent::init();

    $this->addField('name',['required'=>TRUE,'caption'=>'Имя']);
    $this->addField('surname',['required'=>TRUE,'caption'=>'Фамилия']);
    $this->addField('password',['required'=>TRUE, 'type'=>'password']);
    $this->hasMany('Borrow', new Borrow);

  }

}

class Book extends \atk4\data\Model {
  public $table = 'book';
  function init() {
    parent::init();
    $this->addField('author');
    $this->addField('name');
    $this->addField('quantity');
    $this->addField('year_published',['type'=>'date']);
    $this->hasMany('Borrow', new Borrow);
  }
}
class Borrow extends \atk4\data\Model {
  public $table = 'borrow';
  function init() {
    parent::init();
    $this->addField('date_checked_out',['type'=>'date']);
    $this->addField('date_returned',['type'=>'date']);
    $this->addField('returned');
    $this->addField('quantity');
    $this->hasOne('client_id', new Client);
    $this->hasOne('book_id', new Book);
  }
}
class Librarian extends \atk4\data\Model {
  public $table = 'librarian';
  function init() {
    parent::init();
    $this->addField('name');
    $this->addField('surname');
    $this->addField('password',['type'=>'password']);
  }
}
