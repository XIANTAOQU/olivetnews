<?php
namespace Album\Form;
 
use Zend\Form\Form;
 
class AlbumForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('album');
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'title',
            'type' => 'Text',
            'options' => array(
                'label' => 'Title',
            ),
        ));
        $this->add(array(
            'name' => 'category',
            'type' => 'Text',
            'options' => array(
                'label' => 'Category',
            ),
        ));
        $this->add(array(
        		'name' => 'content',
        		'type' => 'Text',
        		'options' => array(
        				'label' => 'content',
        		),
        ));
        $this->add(array(
        		'name' => 'time_created',
        		'type' => 'Text',
        		'options' => array(
        				'label' => 'time_created',
        		),
        ));
        $this->add(array(
        		'name' => 'img',
        		'type' => 'Text',
        		'options' => array(
        				'label' => 'Image',
        		),
        ));
        $this->add(array(
        		'name' => 'author',
        		'type' => 'Text',
        		'options' => array(
        				'label' => 'Author',
        		),
        ));
        $this->add(array(
        		'name' => 'status',
        		'type' => 'Text',
        		'options' => array(
        				'label' => 'Status',
        		),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}