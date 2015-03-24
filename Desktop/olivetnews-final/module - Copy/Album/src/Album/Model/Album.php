<?php
namespace Album\Model;

// Add these import statements
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Album
{
    public $id;
    public $category;
    public $title;
  
    public $content;
    public $time_created;
    public $author;
    public $img;
    public $status;
    protected $inputFilter;                       // <-- Add this variable
    
    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->category = (isset($data['category'])) ? $data['category'] : null;
        $this->title  = (isset($data['title'])) ? $data['title'] : null;
        
        $this->content  = (isset($data['content'])) ? $data['content'] : null;
        $this->time_created  = (isset($data['time_created'])) ? $data['time_created'] : null;
        $this->author  = (isset($data['author'])) ? $data['author'] : null;
        $this->img  = (isset($data['img'])) ? $data['img'] : null;
        $this->status  = (isset($data['status'])) ? $data['status'] : null;
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