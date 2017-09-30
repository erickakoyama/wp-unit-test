# Unit Testing WordPress Plugins with PHPUnit

Hi all! this repo will serve as the starting point for the workshop on Unit Testing WordPress with PHPUnit. You can incorporate this plugin into your own WordPress development environment; however it is not absolutely necessary, as we will not need a WordPress environment to run PHPUnit tests.

The plugin template was largely based from: https://github.com/DevinVinson/WordPress-Plugin-Boilerplate

### Environment Requirements

To follow along locally with this workshop on your machine, you will need at least:

* PHP 5.6
* Composer PHP package manager
* XDebug installed and enabled ( optionally for code coverage reports )

### Other Dependencies
See composer.json for project dependencies

### Setup
* Clone or download the repo
* Optionally setup plugin in a WordPress instance
* `$ cd ${plugin_dir}/tests`
* `$ composer install`
* `$ vendor/bin/phpunit --version`



### Workshop Topic Outline
* Why unit testing?
* The WordPress automated testing suite is awesome but we are not going to use it here
* PHPUnit configuration and bootstrap
* Basic assertions
* Using WP_Mock to mock the WordPress environment
* Generating code coverage reports with php-code-coverage
* Using Data Providers
* Testing private and protected methods
* Mocking part of the same class you are testing
* Mocking external classes
* Next steps

### Have a Follow-Up Question?
If your question is not addressed during the workshop, feel free to file a GitHub issue on this repo.
