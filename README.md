# Laravel Api Response

[![Build Status](https://travis-ci.org/lucandrade/laravel-apiresponse.svg?branch=master)](https://travis-ci.org/lucandrade/laravel-apiresponse)
[![Codacy Badge](https://api.codacy.com/project/badge/e2b621c953524831a4da8ab1bc847e75)](https://www.codacy.com/app/lucas-andrade-oliveira/laravel-apiresponse)

Standard API response to use with Laravel Framework

## Compatibility

 Laravel  | PHP
:---------|:----------
 5.0.x    | >= 5.4
 5.1.x    | >= 5.5.9

## Installation

Add the following line to your `composer.json` file:

```
"lucasandrade/laravel-apiresponse": "dev-master"
```

Then run `composer update` to get the package.

## Configuration - Laravel

Add this line of code to the `providers` array located in your `config/app.php` file:

```
Lucandrade\ApiResponse\ApiResponseServiceProvider::class,
```

Add this line to the `aliases` array:

```
'ApiResponse' => Lucandrade\ApiResponse\Facades\ApiResponse::class,
```

Run the `vendor:publish` command:

```
php artisan vendor:publish
```

## Configuration - Lumen

Execute this command from your project path:

```
cp ./vendor/lucasandrade/laravel-apiresponse/src/config/apiresponse.php ./config
```

Uncomment the following line of your `bootstrap/app.php` file:

```
\\ $app->withFacades();
```

Add this line in the end of file:

```
$app->register(Lucandrade\ApiResponse\Lumen\ApiResponeServiceProvider::class);
```

## Usage

```
Route::get('/api-response', function() {
	return ApiResponse::setPayload("Here's data")
		->setStatusMessage("OK")
		->setRequestCode(0)
		->get();
});
```

Output:

```
{
	"status":true,
	"payload":"Here's data",
	"message":"OK",
	"completed_at":"2015-09-02 16:27:11",
	"code":0
}
```

To change response fields alter `apiresponse.php` file located in your `config` directory:

```
return [
	"keys" => [
		"status" => "{statusNameField}",
		"status_message" => "{messageNameField}",
		"request_code" => "{codeNameField}",
		"payload" => "{payloadNameField}",
		"time" => "{completedAtNameField}"
	]
];
```

> **Note:** remember to add `use ApiResponse;` to the beginning of the yours class file