# Bookline E-commerce Project 📚
## Key Features
Link video: https://youtu.be/jqPUdqFOtTo

This project is an e-commerce platform dedicated to selling books. Users can browse and purchase books, while administrators manage the catalog and orders. User authentication and account management features are also included.

---

## Key Features

### 1. Book Catalog
- **Catalog Display:** Shows the list of available books for purchase.
- **Filtering:** Users can filter books by category or by using a search bar to search by book title.
- **Book Details:** Users can view detailed information about a book before adding it to the cart.
- **Admin Management:** An administrator user can enable or disable books and update book details within the catalog.

### 2. Shopping Cart 🛒
- **Add or Remove Books:** Customers can add books from the catalog to their cart or remove them.
- **Quantity Updates:** Allows modifying the quantity of each book in the cart.
- **Automatic Total Calculation:** Automatically calculates the cart total based on the selected books and quantities.

### 3. Order Management 📦
- **Order Creation:** Users can proceed with the purchase of the books in their cart.
- **Order History:** Each user can view their previous orders, including details such as date, time, purchased products, and the total.
- **Order Statuses:**
  - **Pending:** Order created and awaiting admin validation.
  - **Validated:** Order approved by the admin and ready for delivery.
  - **In Transit:** Marked as in transit by the delivery user.
  - **Delivered:** Marked as completed after delivery to the customer.

### 4. User Account Features
- **Account Registration and Verification:** Users register by providing their email, which must be verified through a unique token sent by email (PHP Mailer).
- **Google Login:** Users can log in using a Google account.
- **Personal Data Updates:** Users can update their information, including username, phone number, password, and profile picture.

### 5. User Roles

- **Customer:**
  - Browses the catalog and manages their cart.
  - Places orders and views order details and history.
  - Manages personal information.

- **Administrator:**
  - Manages the catalog: enables, disables, or updates books.
  - Monitors all customer orders.
  - Validates or cancels customer orders, changing the order status accordingly.

- **Delivery User:**
  - Can view validated orders.
  - Updates the order status to “In Transit” or “Delivered” once it is in progress or completed.