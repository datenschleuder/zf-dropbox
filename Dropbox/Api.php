<?php
/**
 * ZF-Dropbox - A simple Dropbox Client for Zendframework 1
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @license    BSD
 */
final class ZendX_Dropbox_Api
{

    private $_httpclient = NULL;

    private $_endpoint = NULL;

    private $_accesstoken = NULL;
    
    private $_requestbody = NULL;

    /**
     * set http client
     *
     * @param Zend_Http_Client $client            
     * @return ZendX_Dropbox_Api
     */
    public function setHttpClient (Zend_Http_Client $client)
    {
        $this->_httpclient = $client;
        return $this;
    }

    /**
     * set access token
     *
     * @param string $accesstoken            
     * @return ZendX_Dropbox_Api
     */
    public function setAccessToken ($accesstoken)
    {
        $this->_accesstoken = (string) $accesstoken;
        return $this;
    }

    /**
     * set dropbox endpoint
     *
     * @param object $endpoint            
     * @return ZendX_Dropbox_Api
     */
    public function setEndpoint ($endpoint)
    {
        $this->_endpoint = (object) $endpoint;
        return $this;
    }
    
    /**
     * set requestbody for fileupload
     * 
     * @param stream $requestbody
     * @return ZendX_Dropbox_Api
     */
    public function setRequestBody($requestbody)
    {
        $this->_requestbody = $requestbody;
        return $this;
    }

    /**
     * set params and connecting to 
     * dropbox api
     *
     * @return mixed
     */
    public function connect ()
    {
        $endpointurl = $this->_endpoint->getUrl();
        
        $this->_httpclient->setUri($endpointurl['endpointurl']);
        $this->_httpclient->setHeaders('Authorization: Bearer ' . $this->_accesstoken);
        
        $this->_fileuploadHeaders();
        $this->_setParams();
        return $this->_getResponse($endpointurl);
    }

    /**
     * set special headers for fileupload
     *
     * @return void
     */
    private function _fileuploadHeaders ()
    {
        if (! is_null($this->_requestbody)) {
            $mimeinfo = new finfo(FILEINFO_MIME_TYPE);
            $this->_httpclient->setRawData($this->_requestbody, 
                    $mimeinfo->buffer($this->_requestbody));
            $this->_httpclient->setHeaders(
                    'Content-Length: ' . strlen($this->_requestbody));
        }
    }
    
    /**
     * return response from dropbox api
     *
     * @param array $endpointurl            
     * @return mixed
     */
    private function _getResponse ($endpointurl)
    {
        $response = $this->_httpclient->request(
                '' . strtoupper($endpointurl['method']) . '')->getBody();
        
        if (json_decode($response) != NULL) {
            return Zend_Json::decode($response);
        }
        return $response;
    }
    

    /**
     * read and set params from dropbox endpoint
     *
     * @return void
     */
    private function _setParams ()
    {
        $endpoint = $this->_endpoint->getData();
        if (count($endpoint) > 0) {
            
            $method = $this->_endpoint->getUrl();
            $methodname = 'setParameter' . ucfirst($method['method']);
            
            foreach ($endpoint as $param => $value) {
                $this->_httpclient->{$methodname}($param, $value);
            }
        }
    }
}