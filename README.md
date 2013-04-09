# College Connect

*Working title*

## Requirements

* [VirtualBox](https://www.virtualbox.org)
* [Vagrant](http://vagrantup.com)
* [vagrant-hostmaster](https://github.com/mosaicxm/vagrant-hostmaster)
* [git](http://git-scm.com)


## Installation

Clone this repository

    $ git clone git@github.com:MiniCodeMonkey/CollegeConnect.git
	$ cd CollegeConnect

Update submodules

	$ git submodule update --init


## Local development

A Vagrantfile is included for local development, to get started developing locally, just run:

	$ vagrant up

When the Vagrant VM is first started, it is necessary to log in via SSH and install/update the Composer dependencies.

	$ vagrant ssh
	$ cd public
    $ composer install


## Development stack

* Laravel 4
* Socket.io
* Facebook SDK


## Project URLs

* Development: http://collegeconnect.local
* Production: http://collegeconnect.codemonkey.io


## Pushing to production

The master branch is automatically pulled to the production URL when changes are pushed to it.