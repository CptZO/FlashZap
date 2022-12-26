# FlashZap
This Website Consist of 
Client
index.php (landing page)
Products ( is accessible without logging in but when user tries to add product in cart , it askes login first all other pages are strict requires login first )
Add to cart button 
Account
can change address
can change password ( requires old password)
Login/Signup
includes password matching and validation
Cart
view cart
remove product 
Product info
quantity change
Orders( By user client)
for tracking orderID
Logout
destroys all session variables 

Seller
index.php(seller landing page)
Login Seller
Signup Seller
View product (only products uploaded by specific Seller)
Edit product  
Delete product ( won't permanently delete , it will change status value=0)
Upload Product
Restore Product (would restore back deleted product )
Order view (can view only order placed by userclient consisting of products uploaded by specific seller ).

Database
Tables
cart 
(cartID,prodID,username,quantity)
orders
(orderID,prodID,usernameod,address,totalprice,quantityod)
products
(prodID,username,prodname,price,details,imgpath,status)
user(Seller)
(userID,username,password)
userclient
(userID,usernamecl,password,address)
