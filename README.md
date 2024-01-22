## Setting Up Locally

To Setup this project on your local machine. The below step is with the assumption that [**composer**](https://getcomposer.org/download/, 'Get Composer Download Documentation') are installed on your machine

- Clone this repo using the below code:
<pre>
<code>
    git clone git@github.com:OjerIsaac/laravel-repository-pattern.git
</code>
</pre>
_(Note: this will create a folder called _**laravel-repository-pattern**_)_
- Run `cd laravel-repository-pattern` to change the directory into project folder which was created in step one.
- Run `composer install` to install all dependencies.
- Run `cp .env.example .env` to clone the .env.example file as .env.
- Modify your `.env` with your db and mail credentials.
- Run `php artisan key:generate` to generate app key.
- Run `php artisan migrate` to migrate tables to your db.

## Documentation link
- The endpoints to test the service are provided in the [Postman Documentation](https://documenter.getpostman.com/view/25225100/2s9YymFito).