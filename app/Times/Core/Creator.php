<?php namespace Times\Core;

class Creator {

  protected $entity;
  protected $errors = [];

  public function __construct()
  {
    $this->entity = new $this->entity;
  }


  /**
   * @param $data
   * @return bool|User
   */
  public function create( $data )
  {
    $this->entity->fill( $data );

    if( ! $this->entity->isValid() ) {
      $this->errors = $this->entity->getErrors();
      return false;
    }

    if( ! $this->entity->save() ) {
      // TODO: Throw exception
      $this->errors[] = "Database error. Please try again.";
      return false;
    }

    return $this->entity;
  }


  /**
   * @return array
   */
  public function getErrors()
  {
    return array_flatten($this->errors->getMessages());
  }


  /**
   * @return string
   */
  public function getErrorList()
  {
    $html = "<ul>";
    foreach( $this->getErrors() as $error )
      $html .= "<li>" . $error . "</li>";
    $html .= "</ul>";
    return $html;
  }

}