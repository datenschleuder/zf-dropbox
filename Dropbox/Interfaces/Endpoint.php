<?php
/**
 * ZF-Dropbox - Interface for ZendX_Dropbox_Endpoints_*
 *
 * https://github.com/datenschleuder/zf-dropbox
 *
 *
 * @author     Jürgen Meier <support@mypasswordsafe.net>
 * @copyright  Jürgen Meier 2013
 * @version    1.0
 * @license    BSD
 */
interface ZendX_Dropbox_Interfaces_Endpoint
{

    public function getData ();

    public function getUrl ();
}