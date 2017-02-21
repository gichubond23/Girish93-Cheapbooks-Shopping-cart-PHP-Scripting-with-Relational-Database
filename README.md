# Girish93-Cheapbooks-Shopping-cart-PHP-Scripting-with-Relational-Database

Description:
This project is based on developing a shopping cart for purchase of books online. The front end is developed using PHP scripting language. This project involves the implementation of setting up a database for Cheapbooks.com for sales of book online. The project is divided into parts such as login, searching for books by author or title, adding the books to cart, displaying the shopping basket to the user, storing the shopping basket in the database and shipping the order to the customer. The items added in the shopping cart are stored using the session shopping cart array which stores the items throughout the session. The session is started once the user logs into his account and is destroyed and the cart is restored when the user logs out of his account. The backend is implemented using Maria DB using phpMyAdmin. The shipping order of a particular user is tracked by storing the books ordered by the user into a shipping order table stored at the backend. Once the user purchases a set of books the stocks table at the backend is updated.  

Files:

1. Register.php: Create an account for a new customer.
 
2. Login.php: Login page to enable the customer to log into his account

3. Loginprocess.php: Process the credentials of the customer to enable the customer to purchase books

4. Account.php: Displays the customer's account and his recent actvities and displays the books available for purchase 

5. Cart.php: Add the books to shopping cart

6. Cartprocess.php: Update, store or remove the items in the cart based on customer's choice

7. Buy.php: Checkout page for the customer's to make payment.

8. ShippingOrder.php: Displays the details of items to be shipped to the customer.

9. Logout.php: Enables th customer to logout after the completion of his activities.
