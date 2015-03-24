<?php
 namespace News;

 use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
 use Zend\ModuleManager\Feature\ConfigProviderInterface;
 
 use Album\Model\News;
 use Album\Model\NewsTable;
 use Zend\Db\ResultSet\ResultSet;
 use Zend\Db\TableGateway\TableGateway;

 class Module implements AutoloaderProviderInterface, ConfigProviderInterface
 {
     public function getAutoloaderConfig()
     {
         return array(
             'Zend\Loader\ClassMapAutoloader' => array(
                 __DIR__ . '/autoload_classmap.php',
             ),
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 ),
             ),
         );
     }

     public function getConfig()
     {
         return include __DIR__ . '/config/module.config.php';
     }
     
 	public function getServiceConfig()
	{
		return array(
             'factories' => array(
	                 'News\Model\NewsTable' =>  function($sm) {
						$tableGateway = $sm->get('NewsTableGateway');
				
						$table = new AlbumTable($tableGateway);
						
						return $table;
	                 },
	                 
	                 'NewsTableGateway' => function ($sm) {

	                 	 $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');

		                 $resultSetPrototype = new ResultSet();
		                
		                 $resultSetPrototype->setArrayObjectPrototype(new News());
		               
		                 return new TableGateway('newss', $dbAdapter, null, $resultSetPrototype);
	                 },
	                 
	                
	                 
                 )
                
              );
		}
 }