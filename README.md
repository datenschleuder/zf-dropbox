zf-dropbox
==========

ZF-Dropbox - A simple Dropbox Client for Zendframework 1, OAuth2 used for authentication and requires no Curl.




Installation:
=============

Copy the folder "Dropbox" into the  directory "library/ZendX". 




Examples
========

return account info:
<pre><code>
$httpclient = new Zend_Http_Client();
$endpoint = new ZendX_Dropbox_Endpoints_AccountInfo();

$dropbox = new ZendX_Dropbox_Api();
$dropbox->setAccessToken(YOUR ACCESSTOKEN)
		->setEndpoint($endpoint)
		->setHttpClient($httpclient)
		->connect();
</code></pre>		
		
		

upload a JPEG in your dropbox:

<pre><code>
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
</code></pre>
