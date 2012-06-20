Wing Commander is a Mustache wrapper for the Flight PHP microframework.

Usage
=====

Grab the files and place them in a directory inside your project (./vendors/wingcommander would do nicely). Then just include the path and register the class.

	Flight::path("vendors/wingcommander");
	Flight::register("view", "WingCommander");

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

Credits
=======

I wrote very little code here. Full credit should go to [Justin Hileman](http://justinhileman.com/) ([@bobthecow](https://twitter.com/#!/bobthecow)) who implemented the PHP library for Mustache.

Mustache library
================

I've included the Mustache library files in this on the off chance that people are as lazy as I am and just want a drop in directory. However, you can get the latest Mustache files to drop in over the top of these, from Github.

<https://github.com/bobthecow/mustache.php>