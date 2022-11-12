

# Laravel-Moncash-Example

<p align="center">
    <img src="./banner.png?v=1" alt="banner">
</p>

An example on how to integrate the base MonCash Rest API in your Laravel project without any 3rd party package.

This example focuses on the

## Installation

1) Clone the package

```shell
gh repo clone Fruitsbytes/Laravel-Moncash-Example
```

2) Install the packages
```shell
php composer install
```
or using [Laravel Sail + Docker](https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects)

```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```



Note: Some extensions are required for specific strategies but you can switch strategies in the `config/moncash.php
`file.

3) Migrate the database (Make sur the configurations OK)
```shell
php artisan migrate
```
or if you are using Docker

```shell
sail artisan migrate
```


4) Add the credentials to the `.env` file or diretcly in the `./config/moncash.php` _(⚠ unsafe)_ file.

By default the demo site will be available in http://localhost/


<table>
<tr>
<td><img src="./assets/images/demo1.jpg?v=1" alt="demo1"></td>
<td><img src="./assets/images/demo2.jpg?v=1" alt="demo1"></td>
</tr>
<tr>
<td><img src="./assets/images/demo3.jpg?v=1" alt="demo1"></td>
<td><img src="./assets/images/demo4.jpg?v=1" alt="demo1"></td>
</tr>
</table>


## Usage

Add products to the cart from the product list. In the cart, use MonCash as a payment method. You can check the status
of a transaction

You will need a valid test phone number or you will not be able to go through with the.

You can use Ngrok to tunnel server responses

### Create a Business

In the

#### Return Url

MonCash server will signal your server directly to that URL
> example : http://localhost/api/notify

In production a good pratice would be that you put MonCash IP/DomainName in the Allowlist (Acceptlist or Whitelist) of the server for that
specific endpoint. 

To illustrate that this is not a connection initiated by you to the MonCash server we put it in the `/api` routes. It can be a different server that is specifically tailored to fulfill the transaction, differebt than the one used to display the products. 


On a local server, you can use [Ngrok](https://dashboard.ngrok.com/get-started/setup) to tunnel or `sail share` if you are using [Laravel Sail](https://laravel.com/docs/9.x/sail#sharing-your-site)

#### Alert Url

After the transaction is finished, the transactionId is appended to the URL so you can check the value
> result : http://localhost/success?transactionId=2185608546

NOTE: If you share Your local server via a proxie or use an online instance, make sure to configure the Business in the MonCash admin portal accordingly

<p align="center">
<img width="400" src="./assets/images/ngrpk%20Moncash.png?v=2" alt="Ngrok example">
</p>

## Pick a Strategy
We proposed several service providers to handle the business logic.

###   Authentication
If we can cache yje token andd re-use it until it expires this will reduce the nuber of new token requests we make to the API.
- Redis (recommended)
- 🚧  MySQL
- HTTP (default / fallback)

### Payment log
Store the Payment for later use, example: Approve the delivery pf the products after the payment is verified as successful, or use this information for accounting reports.
- Redis (fast)
- MySQL (default/fallback)
- 🚧 File (Slow, needs permission)

### OrderID
Get a uniq orderID that we can use to reference the transaction later, especially if we don' t have a transactionID yet to link to the cirrent order.  
- UUID (low risk of collision)
- 🚧 MySQL (No collision but slow. The toll increases in distributed infrastructure )
- Random Uniq ID (Not too reliable, expecially with distributed infrastructure )

## Security

If you discover a security vulnerability within this package, please send an email
to [security@anbapyezanman.com](mailto:security@anbapyezanman.com). All security vulnerabilities will be addressed as
soon as possible. You may view our full security policy [here](./SECURITY.md).

## Need Help?

Don't hesitate to check the [discussion page](https://github.com/Fruitsbytes/Laravel-Moncash-Example/discussions) and
check if the issue is not addressed yet. You can start a new discussion ineed be.

We offer assistance on projects you can contactus here:

<a href="mailto:business@anbapyezanman.com" target="_blank">business@anbapyezanman.com</a>

If you are an upcoming startup, a student or don't have the budget for consultation fees, it will take longer but we can
submit a public repo illustrating the help you need as long as it will benefit the rest of the community:

<a href="mailto:help@anbapyezanman.com" target="_blank">help@anbapyezanman.com</a>

<table>
<tr valign="middle">
<td>
<a href="https://www.youtube.com/channel/UC14dR51q2_mFCQulsmecL1Q" target="_blank">
<img src="./assets/images/youtube.png?v=1" alt="YT">
</a>
</td>
<td >
You can also check our <a href="https://www.youtube.com/channel/UC14dR51q2_mFCQulsmecL1Q" target="_blank">Youtube Channel</a>
</td>
</tr>
</table>

## License

This project is available under [MIT](https://github.com/Fruitsbytes/Laravel-Moncash-Example/blob/main/LICENSE) license.

