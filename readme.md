Wing Commander is a Mustache wrapper for the Flight PHP microframework.

Installation
============

The easiest way to install Wing Commander is using Composer. Create a composer.json file in the root of your project and require Wing Commander.

	{
		"require": {
			"xmeltrut/wingcommander": "*"
		}
	}

Then run the install command, and this will install all dependencies - including Flight and Mustache.

	composer install

Usage
=====

A basic usage would look like the following.

	require 'vendor/autoload.php';
	
	WingCommander::init();
	
	Flight::route('/', function(){
		Flight::view()->set("someVar", "Hello, World!");
		Flight::render("homepage", array(), "body");
		Flight::render("layout", array("title" => $pageTitle));
	});
	
	Flight::start();

By default, it will look for Mustache templates in the ./templates directory of your project. You can change this by calling the setTemplatePath method.

	Flight::view()->setTemplatePath("./application/templates");

Lets create homepage.mustache.

	<p>{{someVar}}</p>

A layout to wrap it in too - layout.mustache.

	<p>Wing Commander says:</p>
	{{{body}}}

Bringing it all together, you can use it like you would use the standard Flight view component.

	Flight::view()->set("someVar", "Hello, World!");
	Flight::render("homepage", array(), "body");
	Flight::render("layout", array("title" => $pageTitle));

Further Reading
===============

* [Flight](http://flightphp.com/)
* [Mustache.php](https://github.com/bobthecow/mustache.php)
