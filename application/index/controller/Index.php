<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        trace(input());
        $echostr = input('echostr');
        if(!empty($echostr)){
            $result = $this->checkSignature() ? $echostr : '';
            return $result;
        }else{

        }
    }

    /**
     * @return bool
     */
    private function checkSignature()
    {
        $signature = input('signature');
        $timestamp = input('timestamp');
        $nonce = input('nonce');

        $token = config('token');

        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
             return true;
        }else{
            return false;
        }
    }
    
}
