<?php 
namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Blog\Model\Blog;          // <-- Add this import
use Blog\Form\BlogForm;       // <-- Add this import

class BlogController extends AbstractActionController
{
    public function indexAction()
    {
    	$blogTable = $this->getServiceLocator()->get("Blog\Model\BlogTable");
    		
    	$posts = $blogTable->fetchAll();
    	
        return array('posts'=>$posts);
    }
    
    public function addAction()
    {
    	// echo("addaction");
    	$form = new BlogForm();
    	$form->get('submit')->setValue('Add');
    	
    	$request = $this->getRequest();
    	// var_dump($request);
    	if ($request->isPost()) {
    		// echo("is post");
    		$blog = new Blog();
    		$form->setInputFilter($blog->getInputFilter());
    		$form->setData($request->getPost());
    	
    		if ($form->isValid()) {
    			echo("isValid");
    			$blog->exchangeArray($form->getData());
    			// exit();
    			$this->getBlogTable()->saveBlog($blog);
    	
    			// Redirect to list of albums
    			return $this->redirect()->toRoute('blog');
    		}
    	}
    	return array('form' => $form);
    }
    
    public function editAction()
    {
    	$id = (int) $this->params()->fromRoute('id', 0);
    	if (!$id) {
    		return $this->redirect()->toRoute('blog', array(
    				'action' => 'add'
    		));
    	}
    
    	// Get the Album with the specified id.  An exception is thrown
    	// if it cannot be found, in which case go to the index page.
    	try {
    		$blog = $this->getBlogTable()->getBlog($id);
    	}
    	catch (\Exception $ex) {
    		return $this->redirect()->toRoute('blog', array(
    				'action' => 'index'
    		));
    	}
    
    	//	var_dump($album);
    	//	exit();
    	$form  = new BlogForm();
    	$form->bind($blog);
    	$form->get('submit')->setAttribute('value', 'Edit');
    
    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$form->setInputFilter($blog->getInputFilter());
    		$form->setData($request->getPost());
    
    		if ($form->isValid()) {
    			$this->getBlogTable()->saveBlog($blog);
    
    			// Redirect to list of albums
    			return $this->redirect()->toRoute('blog');
    		}
    	}
    
    	return array(
    			'id' => $id,
    			'form' => $form,
    	);
    }
    
    protected $blogTable;
    public function getBlogTable()
    {
    	if (!$this->blogTable) {
    		$sm = $this->getServiceLocator();
    		$this->blogTable = $sm->get('Blog\Model\BlogTable');
    	}
    	return $this->blogTable;
    }
    
	public function deleteAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		if (!$id) {
			return $this->redirect()->toRoute('blog');
		}
		
		$request = $this->getRequest();
		if ($request->isPost()) {
			$del = $request->getPost('del', 'No');
		
			if ($del == 'Yes') {
				$id = (int) $request->getPost('id');
				$this->getBlogTable()->deleteBlog($id);
			}
		
			// Redirect to list of albums
			return $this->redirect()->toRoute('blog');
		}
		
		return array(
				'id'    => $id,
				'blog' => $this->getBlogTable()->getBlog($id)
		);
	}
}
