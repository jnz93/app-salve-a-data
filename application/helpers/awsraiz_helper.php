<?php

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

function createS3(){
	include_once 'lib/aws/aws-autoloader.php';
	$client = new Aws\S3\S3Client([
		'version'=>'latest',
		'http'=>[
			'verify'=>false
		],
		'region'=>'sa-east-1',
		'endpoint'=>'http://s3.amazonaws.com',
		'credentials'=>[
			'key'=>'AKIAIXHEWODIUAXLDSRQ',
			'secret'=>'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',
		],
	]);
	return $client;
}

function putfileS3($filename, $source){

	$client = createS3();
	try{
		// Get the object
		$result = $client->putObject(array(
			'Bucket'=>'cakedigital',
			'Key'=>"$filename",
			'SourceFile'=>$source,
			'ContentType'=>mime_content_type($source),
			'ACL'=>'public-read'
		));
		return $result->get('ObjectURL');
	}catch(S3Exception $e){
		print_r($e->getMessage());
		return false;
	}
}
function putstrS3($filename, $source,$type){

	$client = createS3();
	try{
		// Get the object
		$result = $client->putObject(array(
			'Bucket'=>'cakedigital',
			'Key'=>"$filename",
			'Body'=>$source,
			'ContentType'=>$type,
			'ACL'=>'public-read'
		));
		return $result->get('ObjectURL');
	}catch(S3Exception $e){
		print_r($e->getMessage());
		return false;
	}
}

function delS3($filename){
	$client = createS3();
	return $client->deleteObject([
		'Bucket'=>'cakedigital',
		'Key'=>"$filename"
	]);
}


