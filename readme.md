# MedicDigital Sandbox Application

This application is designed for testing of framework architecture for the MedicDigital Project.

The framework is [Laravel 6.0.2](https://laravel.com) - this is the most recent LTS (Long Term Service) release of Laravel.  The framework has some additional packages installed which will be discussed below.

## Setup and Installation
_This is tested on MacOS, most *Nix architectures and Windows - there are some extra notes for node development in Windows_
- Install [Vagrant](https://vagrantup.com)
- Install [Virtualbox](https://www.virtualbox.org/wiki/Downloads)
- Check out this repository to ~/code/MedicAlertSandbox - if you choose a different location you just need to make some changes to `Homestead.yaml`
- `cp Homestead.yaml.example Homestead.yaml`
- `cp .env.example .env`
- `vagrant up`

Once the machine is up you can log in with `vagrant ssh` and change to the code 
directory `cd code` - this directory is a share from the host system.  Once in continue setup
with:
- `composer install`
- `php artisan migrate`
- `npm install`
- `npm run dev` 

## Access to the site
The site will be available at the ip address in Homestead.yaml which currently defaults to `192.168.10.10`.  You can change that if it causes problems in your network.
If you'd like to use an easier address you can make an entry in `/etc/hosts` for something like `medicdigital.test`


## Package Creation
A key part of this sandbox is to test the ability to create custom packages.  To that end, 
this sandbox comes with [Laravel-Packager](https://github.com/Jeroen-G/laravel-packager) - a 3rtd party
package designed to make package creation easy.  You can bootstrap a new package using this tool:
```
php artisan packager:new VENDOR NAME
```
For instance, try this:
```
php artisan packager:mew victorycto mysandbox

```
Once complete there is a directory in your codebase under `/packages` built as `/packages/VENDOR/NAME` - so look for `/packages/victorycto/mysandbox`

_Note: Composer plans to enforce that all vendor and package names be lowercase in a future release, so please stick to that format_

*The repository will ignore the `/packages` directory, so work done here will not be loaded back to the repo*
