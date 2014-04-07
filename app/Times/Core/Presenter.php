<?php namespace Times\Core;


abstract class Presenter {

  /**
   * @var
   */
  protected $entity;

  /**
   * @param $entity
   */
  function __construct( $entity )
  {
     $this->entity = $entity;
  }


  /**
   * @param $property
   */
  public function __get( $property )
  {


    if( method_exists($this, $property) )
      return $this->{$property}();

    return $this->entity->getAttributes()[$property];
  }


}