<?php
namespace Blog\Model;

// Add these import statements
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Blog {
	protected $id;
	protected $name;
	protected $position;	
	
	protected $inputFilter;                       // <-- Add this variable
	
	public function exchangeArray($data)
	{
		$this->id = $data['id'];
		$this->name = $data['name'];
		$this->position = $data['position'];
	}
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
	// Add content to these methods:
	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception("Not used");
	}
	public function getId(){
		return $this->id;
	}
	
	public function getName(){
		return $this->name;
	}
	public function getPosition(){
		return $this->position;
	}
	public function getInputFilter()
	{
		if (!$this->inputFilter) {
			// echo("getinputfilter");
			$inputFilter = new InputFilter();
			$factory     = new InputFactory();
			/*
			 $inputFilter->add($factory->createInput(array(
			 'name'     => 'id',
			 'required' => false,
			 'filters'  => array(
			 array('name' => 'Int'),
			 ),
			 )));
	
			 $inputFilter->add($factory->createInput(array(
			 'name'     => 'category',
			 'required' => true,
			 'filters'  => array(
			 array('name' => 'StripTags'),
			 array('name' => 'StringTrim'),
			 ),
			 'validators' => array(
			 array(
			 'name'    => 'StringLength',
			 'options' => array(
			 'encoding' => 'UTF-8',
			 'min'      => 1,
			 'max'      => 11,
			 ),
			 ),
			 ),
			 )));
	
			 $inputFilter->add($factory->createInput(array(
			 'name'     => 'title',
			 'required' => true,
			 'filters'  => array(
			 array('name' => 'StripTags'),
			 array('name' => 'StringTrim'),
			 ),
			 'validators' => array(
			 array(
			 'name'    => 'StringLength',
			 'options' => array(
			 'encoding' => 'UTF-8',
			 'min'      => 1,
			 'max'      => 255,
			 ),
			 ),
			 ),
			 )));
			 $inputFilter->add($factory->createInput(array(
			 'name'     => 'content',
			 'required' => true,
			 'filters'  => array(
			 array('name' => 'StripTags'),
			 array('name' => 'StringTrim'),
			 ),
			 'validators' => array(
			 array(
			 'name'    => 'StringLength',
			 'options' => array(
			 'encoding' => 'UTF-8',
			 'min'      => 1,
			 'max'      => 1000,
			 ),
			 ),
			 ),
			 )));
	
			 $inputFilter->add($factory->createInput(array(
			 'name'     => 'time_created',
			 'required' => true,
			 'filters'  => array(
			 array('name' => 'StripTags'),
			 array('name' => 'StringTrim'),
			 ),
			 'validators' => array(
			 array(
			 'name'    => 'StringLength',
			 'options' => array(
			 'encoding' => 'UTF-8',
			 'min'      => 1,
			 'max'      => 11,
			 ),
			 ),
			 ),
			 )));
			 $inputFilter->add($factory->createInput(array(
			 'name'     => 'author',
			 'required' => true,
			 'filters'  => array(
			 array('name' => 'StripTags'),
			 array('name' => 'StringTrim'),
			 ),
			 'validators' => array(
			 array(
			 'name'    => 'StringLength',
			 'options' => array(
			 'encoding' => 'UTF-8',
			 'min'      => 1,
			 'max'      => 100,
			 ),
			 ),
			 ),
			 )));
	
			 $inputFilter->add($factory->createInput(array(
			 'name'     => 'status',
			 'required' => true,
			 'filters'  => array(
			 array('name' => 'StripTags'),
			 array('name' => 'StringTrim'),
			 ),
			 'validators' => array(
			 array(
			 'name'    => 'StringLength',
			 'options' => array(
			 'encoding' => 'UTF-8',
			 'min'      => 1,
			 'max'      => 11,
			 ),
			 ),
			 ),
			 )));
	
			 $inputFilter->add($factory->createInput(array(
			 'name'     => 'img',
			 'required' => true,
			 'filters'  => array(
			 array('name' => 'StripTags'),
			 array('name' => 'StringTrim'),
			 ),
			 'validators' => array(
			 array(
			 'name'    => 'StringLength',
			 'options' => array(
			 'encoding' => 'UTF-8',
			 'min'      => 1,
			 'max'      => 100,
			 ),
			 ),
			 ),
			 )));
			*/
			$this->inputFilter = $inputFilter;
		}
	
		return $this->inputFilter;
	}
}
	