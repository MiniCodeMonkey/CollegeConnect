# College Connect

*Working title*

## Requirements

* [VirtualBox](https://www.virtualbox.org)
* [Vagrant](http://vagrantup.com)
* [vagrant-hostmaster](https://github.com/mosaicxm/vagrant-hostmaster)
* [git](http://git-scm.com)
* [PHP (cli)](http://php.net)
* [Composer](http://getcomposer.org/download/)

## Installation

Clone this repository

    $ git clone git@github.com:MiniCodeMonkey/CollegeConnect.git
	$ cd CollegeConnect

Update submodules

	$ git submodule update --init

Install dependencies with Composer

    $ composer install

## Local development

A Vagrantfile is included for local development, to get started developing locally, just run:

	$ vagrant up


## Development stack

* Laravel 4
* Socket.io
* Facebook SDK


## Project URLs

* Development: http://collegeconnect.local
* Production: http://collegeconnect.codemonkey.io

## Pushing to production

The master branch is automatically pulled to the production URL when changes are pushed to it.