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

2) Start Docker from inside the example directory

```shell
cd laravel-moncash-example && ./vendor/bin/sail up
```

3) Add the credentials to the `.env` file or diretcly in the `./config/moncash.php` _(⚠ unsafe)_ file.

By default the demo site will be available in http://localhost/

## Usage

Add products to the cart from the product list. In the cart, use MonCash as a payment method. You can check the status
of a transaction

You will need a valid test phone number or you will not be able to go through with the.

You can use Ngrok to tunnel server responses

### Create a Business

In the

#### Return Url

MonCash server will signal your server directly to that URL
> example : http://localhost/secure/success

It is very important that you put MonCash IP/DomainName in the Allowlist/Acceptlist/Whitelist of the server for that
specific endpoint.

Get the transactionId to have the status of the payment for the provided orderID.

On a local server, you can use [Ngrok](https://dashboard.ngrok.com/get-started/setup) to tunnel

#### Alert Url

After the transaction is finished, the transactionId is appended to the URL so you can check the value
> result : http://localhost/payment/success?transactionId=2185608546


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

