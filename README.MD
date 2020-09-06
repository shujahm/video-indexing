# Laravel Amazon SQS Job

This package is hosted on github only right now, as a public repo

## Installation

First, include the package in your dependencies in your **composer.json** file:
```
"movieenglish/amazon-sqs-job": "master"
```
Then add the github link for the respective repo in the **composer.json** file:
```
"repositories": [{
  "type": "vcs",
  "url": "https://github.com/shujahm/video-indexing.git"
}],
```
Run the following command to bring the sample job file from package to the **App/Jobs** folder of your project
```
php artisan vendor:publish
```
Running the above command will print something like this:
![Screenshot](https://github.com/shujahm/video-indexing/blob/master/documents/Screenshot_4.png?raw=true)

From the above we select the number 9 that is against 
> **MovieEnglish\AmazonSqsJob\AmazonSqsJobServiceProvider**

What this will essentially is migrate copy the file **SampleJob.php** file to your the **App/Jobs** folder of your project. Thus make sure App/Jobs folder is already there for this file to successfully move from package to your project.

## Configuration

 1. Add the following variables to your **.env** file. This are just **sample** key:values , please update them as per your configuration

	```
	QUEUE_CONNECTION=sqs-fifo
	SQS_KEY=AKIAXEJ5RN7UU4CHSN6V1212
	SQS_SECRET=ylaT343430hHQYEsU9VyUF7Qkad8VXqzxSQkAdVcR8hK6
	SQS_QUEUE=IndexingVideo.fifo
	SQS_REGION=us-east-2
	SQS_PREFIX=https://sqs.us-east-2.amazonaws.com/<quie-id>
	```

 2. Add the following to your **app/queue.php** under **connections** array:
	```
	'sqs-fifo'  => [
		'driver'  =>  'sqs-fifo',
		'key'  =>  env('AWS_ACCESS_KEY_ID'),
		'secret'  =>  env('AWS_SECRET_ACCESS_KEY'),
		'prefix'  =>  env('SQS_PREFIX', 'https://sqs.amazonaws.com/your-account-id'),
		'queue'  =>  env('SQS_QUEUE', 'your-queue-name'),
		'suffix'  =>  env('SQS_SUFFIX'),
		'region'  =>  env('AWS_DEFAULT_REGION', 'us-east-1'),
		'group'  =>  'default',
		'deduplicator'  =>  'unique'
	]
	```
