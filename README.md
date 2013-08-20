zf-dropbox
==========

ZF-Dropbox - A simple Dropbox Client for Zendframework 1




Installation:
=============

Copy the folder "Dropbox" into the  directory "library/ZendX". 




Examples
========

return account info:

$httpclient = new Zend_Http_Client();
$endpoint = new ZendX_Dropbox_Endpoints_AccountInfo();

$dropbox = new ZendX_Dropbox_Api();
$dropbox->setAccessToken(YOUR ACCESSTOKEN)
		->setEndpoint($endpoint)
		->setHttpClient($httpclient)
		->connect();
		
		
		

upload a JPEG in your dropbox:

$httpclient = new Zend_Http_Client();
$endpoint = new ZendX_Dropbox_Endpoints_FilesPut();
$endpoint->setPath('cloud/audi.jpg')
		 ->setRoot('dropbox');
		
$dropbox = new ZendX_Dropbox_Api();
$dropbox->setAccessToken(YOUR ACCESSTOKEN)
		->setEndpoint($endpoint)
		->setHttpClient($httpclient)
		->setRequestBody(file_get_contents("/home/juergen/Bilder/Foto3.JPG"))
		->connect();