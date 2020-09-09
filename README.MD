
# Laravel Amazon SQS Job

  

This package is hosted on github only right now, as a public repo

  

## Installation

  

First, include the package in your dependencies in your **composer.json** file:

```

composer require fire-queue/amazon-sqs-job

```

  

Run the following command to bring the sample job file from package to the **App/Jobs** folder of your project

```

php artisan vendor:publish

```

Running the above command will print something like this:

![Screenshot](https://github.com/shujahm/video-indexing/blob/master/documents/Screenshot.png?raw=true)

  

From the above we select the number 9 that is against

> **FireQueue\AmazonSqsJob\AmazonSqsJobServiceProvider**

  

What this will essentially is migrate copy the file **SampleJob.php** file to your the **App/Jobs** folder of your project. Thus make sure App/Jobs folder is already there for this file to successfully move from package to your project.

  

## Configuration

  

1. Add the following variables to your **.env** file. This are just **sample** key:values , please update them as per your configuration

  

	```
	QUEUE_CONNECTION=sqs-fifo
	SQS_KEY=AKIA21212wsxbuXEJ5RN71212342fvcds12433454657UU4CHSN6V1212
	SQS_SECRET=y34380laT23232323212121343430hHQYEsU9VyUF7Qkad8VXqzx-0SQkAdVcR8hK6
	SQS_QUEUE=IndexingVideo.fifo
	SQS_REGION=us-east-2
	SQS_PREFIX=https://sqs.us-east-2.amazonaws.com/<quie-id>
	```

  

2. Add the following to your **app/queue.php** under **connections** array:

	```
	'sqs-fifo' => [
	'driver' => 'sqs-fifo',
	'key' => env('AWS_ACCESS_KEY_ID'),
	'secret' => env('AWS_SECRET_ACCESS_KEY'),
	'prefix' => env('SQS_PREFIX', 'https://sqs.amazonaws.com/your-account-id'),
	'queue' => env('SQS_QUEUE', 'your-queue-name'),
	'suffix' => env('SQS_SUFFIX'),
	'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
	'group' => 'default',
	'deduplicator' => 'unique'
	]
	```

  

## Heroku Worker Setup

You need to include the following worker in your Procfile

    worker: php artisan queue:restart && php artisan queue:work --tries=3
This will restart and put the queue to work whenever your application starts.

## Heroku Worker Configuration

To scale up heroku , and use more than 1 worker,  you have to use the following command:

    heroku ps:scale web=1 worker=5
In this way 1 Web Dyno and 5 Worker Dynos will be deployed. Also please note if you are using Free tier on Heroku running this command will give the following error

> Cannot update to more than 1 Free size dynos per process type.

So you have to upgrade to at least hobby version.

You can use the following command to see worker logs:

    heroku logs --tail --ps worker
    
this will print all the logs of the worker as shown below in the screenshot

![enter image description here](https://github.com/shujahm/video-indexing/blob/master/documents/Screenshot1.png?raw=true)
