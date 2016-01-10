<?php
/**
 * Created by PhpStorm.
 * User: fengxiaotx
 * Date: 2016/1/11
 * Time: 0:02
 */

namespace MoenSun\aliyun\oss;


use OSS\Core\OssException;
use OSS\OssClient;

class MSAliyunOssClient
{
    private $ossClient ;

    private $bucket;

    public function __construct($accessKeyId, $accessKeySecret, $endpoint, $bucket,$isCName = false, $securityToken = NULL)
    {
        $this->bucket = $bucket ;
        $this->ossClient = new OssClient($accessKeyId,$accessKeySecret,$endpoint,$isCName,$securityToken);
    }

    public function putObject($object , $content){
        try{
            $this->ossClient->putObject($this->bucket,$object ,$content);
        }catch(OssException $e){
            throw new OssException($e);
        }
    }

    public function uploadFile($object, $filePath, $options = array()){
        try{
            $this->ossClient->uploadDir($this->bucket,$object,$filePath,$options);
        }catch(OssException $e){
            throw new OssException($e);
        }
    }
}