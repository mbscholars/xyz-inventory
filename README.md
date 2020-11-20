

<p align="center"> 
</p>

## About The Project

This project is built with Laravel application framework and it is expected to serve as an inventory management system for a restaurant. 
It is built with the following features
 - Authentication for Drivers, Users (customers) and Admin
 -- Authentication was implemented using Laravel Passport for the APIs and designated role is specified using a field ('role') in the database
 -- Gates were used to ensure that only the authorized user role get to execute designated methods
 -- Policies were also used to ensure and enforce database integrity. There are three policies created: 
1. DeliveryPolicy: To ensure that only the customer who created the delivery order can edit or make changes to it, to also ensure that delivered orders or completed deliveries cannot be edited.
2. OrderPolicy etc.. You can find these in the policies folder

     
## Installation

To install, clone the repository to your server
Run ```composer install```
To deploy ```php artisan passport:install ``` 
To create the database tables ```php artisan migrate``` as you would a laravel application


## Controllers

There are four controllers created that performs specific functions:
1. InventoryCategoryController: This controller handles everything for product category creation etc
2. InventoryPageController: This controller handles all results obtained on the front end for the user interface
3. DeliveryController: This controller handles the delivery logic
4. OrderController: This controller handles the ordering logic. 

### Testing
- Using laravel phpunit, test cases where created for each methods and endpoints

## FrontEnd

The front end was implemented using BootstrapVue Framework

## Events and Notifications
Coming soon
