# Developer Comments
- Please run artisan migrate for the database table setup
```
php artisan migrate
```
- Please check the config file in `packages/michaelberry/src/config/mbimage.php` for configuration
- Edit `.env` file and include the credentials for S3 directory

# Victory Laravel Sandbox Application

This application is designed for testing of Laravel Framework capabilities.  Please submit your changes as a Pull Request.

The framework is [Laravel 6.0.2](https://laravel.com) - this is the most recent LTS (Long Term Service) release of Laravel.  The framework has some additional packages installed which will be discussed below.

## Setup and Installation
_This is tested on MacOS, most *Nix architectures and Windows - there are some extra notes for node development in Windows_
- Install [Vagrant](https://vagrantup.com)
- Install [Virtualbox](https://www.virtualbox.org/wiki/Downloads)
- Check out this repository to ~/code/LaravelSandbox - if you choose a different location you just need to make some changes to `Homestead.yaml`
- `cp Homestead/Homestead.yaml.example Homestead/Homestead.yaml`
- `cp .env.example .env`
- `vagrant up`

Once the machine is up you can log in with `vagrant ssh` and change to the code 
directory `cd code` - this directory is a share from the host system.  Here you can run any cli items needed like artisan commands.

## Access to the site
The site will be available at the ip address in Homestead.yaml which currently defaults to `192.168.10.10`.  You can change that if it causes problems in your network.
If you'd like to use an easier address you can make an entry in `/etc/hosts` for something like `sandbox.test`


## Package Creation
A key part of this sandbox is to test the ability to create custom packages.  To that end, 
this sandbox comes with [Laravel-Packager](https://github.com/Jeroen-G/laravel-packager) - a 3rtd party
package designed to make package creation easy.  You can bootstrap a new package using this tool:
```
php artisan packager:new VENDOR NAME
```
For instance, try this:
```
php artisan packager:new victorycto mysandbox

```
Once complete there is a directory in your codebase under `/packages` built as `/packages/VENDOR/NAME` - so look for `/packages/victorycto/mysandbox`

_Note: Composer plans to enforce that all vendor and package names be lowercase in a future release, so please stick to that format_

*The repository will ignore the `/packages` directory, so work done here will not be loaded back to the repo*


## The Coding Test
We do not believe in standard coding tests at Victory, but we do want to see and understand your style of coding - we find the best way 
of doing that is to see you code a real world example.  You may use whatever tools you have available and build this 
in any way you see fit.  

Please fork this repository and do your work.  When done email us with the fork url.

### Build a Service
For this exercise you will build a simple service which can be utilized by the site from any controller.  This is
an image service, designed to ingest images and prepare them for use on the site.  Your service should:
- Accept a multipart form image upload
- Resize / Recompress the image to at least 3 sizes (think thumbnail, small and full).  You may change the image format and compression to best suite use on a website
- Store the image to S3 or GCP cloud storage and create a public url - ideally with a CDN frontend
- Save the image data to a table of your design in the local mysql database
- Make the image available to the frontend

You should be able to accomplish this within the free tier of either cloud service, and provide locations and directions in your code for
any needed setup.  If you need help or a paid account reach out and we will provide it.  

We're looking for best practices, good documentation and testing, and creativity.  
