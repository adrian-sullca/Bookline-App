<?php

namespace App\Config;

$users = [
    [
        "id" => 1,
        "username" => "Admin",
        "email" => "admin@gmail.com",
        "password" => "123",
        "token" => "55555",
        "verified" => true,
        "rol" => "admin",
        "imgProfile" => "default_img_profile.webp",
    ],
    [
        "id" => 2,
        "username" => "Adrian",
        "email" => "adrian.sullc@cirvianum.cat",
        "password" => "123",
        "address" => "Vic",
        "phoneNumber" => "631367253",
        "cartId" => 1,
        "token" => "55555",
        "verified" => true,
        "rol" => "client",
        "imgProfile" => "default_img_profile.webp",
    ],
    [
        "id" => 3,
        "username" => "Toni",
        "email" => "toni@cirvianum.cat",
        "password" => "123",
        "address" => "Vic",
        "phoneNumber" => "631367254",
        "cartId" => 2,
        "token" => "555",
        "verified" => true,
        "rol" => "client",
        "imgProfile" => "default_img_profile.webp",
    ],
    [
        "id" => 4,
        "username" => "Delivery",
        "email" => "delivery@gmail.com",
        "password" => "123",
        "token" => "55555",
        "verified" => true,
        "rol" => "delivery_person",
        "imgProfile" => "default_img_profile.webp",
    ],
];

$carts = [
    [
        "id" => 1,
        "userId" => 2,
    ],
    [
        "id" => 2,
        "userId" => 3,
    ]
];

$categories = [
    "Fantasy",
    "Classics",
    "Finance",
    "Self-Help",
    "Business",
    "Historical Fiction",
    "Science Fiction",
    "Philosophy",
    "Fiction",
    "Horror",
    "Dystopia",
    "Young Adult"
];

$books = [
    [
        "id" => 1,
        "isbn" => "978-0439708180",
        "coverPhoto" => "../../../Public/Assets/img/books/Harry Potter and the Sorcerer's Stone.jpg",
        "title" => "Harry Potter and the Sorcerer's Stone",
        "author" => "J.K. Rowling",
        "category" => "Fantasy",
        "synopsis" => "A young boy discovers he is a wizard and joins a magical school where he faces great challenges.",
        "price" => 29.99,
        "enabled" => true,
    ],
    [
        "id" => 2,
        "isbn" => "978-0618640157",
        "coverPhoto" => "../../../Public/Assets/img/books/The Lord of the Rings The Fellowship of the Ring.jpg",
        "title" => "The Lord of the Rings: The Fellowship of the Ring",
        "author" => "J.R.R. Tolkien",
        "category" => "Fantasy",
        "synopsis" => "A group of heroes embarks on a mission to destroy a ring that can grant unlimited power.",
        "price" => 35.99,
        "enabled" => true,
    ],
    [
        "id" => 3,
        "isbn" => "978-0446310789",
        "coverPhoto" => "../../../Public/Assets/img/books/To Kill a Mockingbird.webp",
        "title" => "To Kill a Mockingbird",
        "author" => "Harper Lee",
        "category" => "Classics",
        "synopsis" => "A story about racial injustice in the southern United States through the eyes of a young girl.",
        "price" => 24.99,
        "enabled" => true,
    ],
    [
        "id" => 4,
        "isbn" => "978-0743273565",
        "coverPhoto" => "../../../Public/Assets/img/books/The Great Gatsby.webp",
        "title" => "The Great Gatsby",
        "author" => "F. Scott Fitzgerald",
        "category" => "Classics",
        "synopsis" => "The story of a mysterious man and his obsession with a woman in the high society of New York.",
        "price" => 19.99,
        "enabled" => true,
    ],
    [
        "id" => 5,
        "isbn" => "978-1469247028",
        "coverPhoto" => "../../../Public/Assets/img/books/Rich Dad Poor Dad.jpg",
        "title" => "Rich Dad Poor Dad",
        "author" => "Robert T. Kiyosaki",
        "category" => "Finance",
        "synopsis" => "A different approach on how people can improve their financial situation through investment and financial education.",
        "price" => 21.99,
        "enabled" => true,
    ],
    [
        "id" => 6,
        "isbn" => "978-0307887894",
        "coverPhoto" => "../../../Public/Assets/img/books/The Power of Habit.jpg",
        "title" => "The Power of Habit",
        "author" => "Charles Duhigg",
        "category" => "Self-Help",
        "synopsis" => "A deep analysis of how habits influence our lives and how we can transform them.",
        "price" => 18.99,
        "enabled" => true,
    ],
    [
        "id" => 7,
        "isbn" => "978-0066620992",
        "coverPhoto" => "../../../Public/Assets/img/books/Good to Great.webp",
        "title" => "Good to Great",
        "author" => "Jim Collins",
        "category" => "Business",
        "synopsis" => "A study on how some companies transition from being good to becoming great.",
        "price" => 23.99,
        "enabled" => true,
    ],
    [
        "id" => 8,
        "isbn" => "978-0590353427",
        "coverPhoto" => "../../../Public/Assets/img/books/Harry Potter and the Chamber of Secrets.jpg",
        "title" => "Harry Potter and the Chamber of Secrets",
        "author" => "J.K. Rowling",
        "category" => "Fantasy",
        "synopsis" => "Harry returns to Hogwarts to face a new threat that terrorizes the school.",
        "price" => 29.99,
        "enabled" => true,
    ],
    [
        "id" => 9,
        "isbn" => "978-0618640157",
        "coverPhoto" => "../../../Public/Assets/img/books/The Hobbit.webp",
        "title" => "The Hobbit",
        "author" => "J.R.R. Tolkien",
        "category" => "Fantasy",
        "synopsis" => "The story of Bilbo Baggins and his adventure in search of treasure guarded by the dragon Smaug.",
        "price" => 32.99,
        "enabled" => true,
    ],
    [
        "id" => 10,
        "isbn" => "978-0307336002",
        "coverPhoto" => "../../../Public/Assets/img/books/The Secret.jpg",
        "title" => "The Secret",
        "author" => "Rhonda Byrne",
        "category" => "Self-Help",
        "synopsis" => "A book that explores the power of positive thinking and the law of attraction.",
        "price" => 16.99,
        "enabled" => true,
    ],
    [
        "id" => 11,
        "isbn" => "978-0143125471",
        "coverPhoto" => "../../../Public/Assets/img/books/The Alchemist.webp",
        "title" => "The Alchemist",
        "author" => "Paulo Coelho",
        "category" => "Philosophy",
        "synopsis" => "The story of a young shepherd who follows his dreams to find treasure in Egypt.",
        "price" => 25.99,
        "enabled" => true,
    ],
    [
        "id" => 12,
        "isbn" => "978-0307455925",
        "coverPhoto" => "../../../Public/Assets/img/books/The Road.webp",
        "title" => "The Road",
        "author" => "Cormac McCarthy",
        "category" => "Fiction",
        "synopsis" => "A father and his son struggle to survive in a post-apocalyptic world.",
        "price" => 14.99,
        "enabled" => true,
    ],
    [
        "id" => 13,
        "isbn" => "978-1501173219",
        "coverPhoto" => "../../../Public/Assets/img/books/The Outsider.jpg",
        "title" => "The Outsider",
        "author" => "Stephen King",
        "category" => "Horror",
        "synopsis" => "A detective investigates a case that defies all logic and reason.",
        "price" => 22.99,
        "enabled" => true,
    ],
    [
        "id" => 14,
        "isbn" => "978-0060850524",
        "coverPhoto" => "../../../Public/Assets/img/books/Brave New World.webp",
        "title" => "Brave New World",
        "author" => "Aldous Huxley",
        "category" => "Dystopia",
        "synopsis" => "A futuristic world where total control over society is the main goal.",
        "price" => 19.99,
        "enabled" => true,
    ],
    [
        "id" => 15,
        "isbn" => "978-0553212570",
        "coverPhoto" => "../../../Public/Assets/img/books/The Old Man and the Sea.webp",
        "title" => "The Old Man and the Sea",
        "author" => "Ernest Hemingway",
        "category" => "Fiction",
        "synopsis" => "The struggles of an old fisherman against a giant fish in the sea.",
        "price" => 14.99,
        "enabled" => true,
    ],
    [
        "id" => 16,
        "isbn" => "978-0380730407",
        "coverPhoto" => "../../../Public/Assets/img/books/Dune.webp",
        "title" => "Dune",
        "author" => "Frank Herbert",
        "category" => "Science Fiction",
        "synopsis" => "The struggle for control of a desert planet and its most valuable resource, spice.",
        "price" => 29.99,
        "enabled" => true,
    ],
    [
        "id" => 17,
        "isbn" => "978-0345339683",
        "coverPhoto" => "../../../Public/Assets/img/books/The Catcher in the Rye.jpg",
        "title" => "The Catcher in the Rye",
        "author" => "J.D. Salinger",
        "category" => "Classics",
        "synopsis" => "The story of a rebellious teenager seeking his identity and place in the world.",
        "price" => 17.99,
        "enabled" => true,
    ],
    [
        "id" => 18,
        "isbn" => "978-0061122415",
        "coverPhoto" => "../../../Public/Assets/img/books/The Book Thief.jpg",
        "title" => "The Book Thief",
        "author" => "Markus Zusak",
        "category" => "Historical Fiction",
        "synopsis" => "The story of a girl who finds comfort in books during World War II.",
        "price" => 26.99,
        "enabled" => true,
    ],
    [
        "id" => 19,
        "isbn" => "978-1501110368",
        "coverPhoto" => "../../../Public/Assets/img/books/Station Eleven.jpg",
        "title" => "Station Eleven",
        "author" => "Emily St. John Mandel",
        "category" => "Science Fiction",
        "synopsis" => "A group of actors survives in a world devastated by a virus.",
        "price" => 23.99,
        "enabled" => true,
    ],
    [
        "id" => 20,
        "isbn" => "978-0062851935",
        "coverPhoto" => "../../../Public/Assets/img/books/The Night Circus.webp",
        "title" => "The Night Circus",
        "author" => "Erin Morgenstern",
        "category" => "Fantasy",
        "synopsis" => "A magical circus appears without warning and serves as the stage for a challenge between two young magicians.",
        "price" => 24.99,
        "enabled" => true,
    ],
    [
        "id" => 21,
        "isbn" => "978-0062238172",
        "coverPhoto" => "../../../Public/Assets/img/books/The Book Thief.jpg",
        "title" => "The Book Thief",
        "author" => "Markus Zusak",
        "category" => "Historical Fiction",
        "synopsis" => "The story of a girl who finds solace in books during World War II.",
        "price" => 19.99,
        "enabled" => true,
    ],
    [
        "id" => 22,
        "isbn" => "978-0545162074",
        "coverPhoto" => "../../../Public/Assets/img/books/Looking for Alaska.webp",
        "title" => "Looking for Alaska",
        "author" => "John Green",
        "category" => "Young Adult",
        "synopsis" => "An emotional journey of friendship and loss at a boarding school.",
        "price" => 18.99,
        "enabled" => true,
    ],
    [
        "id" => 23,
        "isbn" => "978-0143039433",
        "coverPhoto" => "../../../Public/Assets/img/books/Atonement.jpg",
        "title" => "Atonement",
        "author" => "Ian McEwan",
        "category" => "Fiction",
        "synopsis" => "A story about love and redemption across time.",
        "price" => 21.99,
        "enabled" => true,
    ],
    [
        "id" => 24,
        "isbn" => "978-0553213119",
        "coverPhoto" => "../../../Public/Assets/img/books/The Adventures of Huckleberry Finn.jpg",
        "title" => "The Adventures of Huckleberry Finn",
        "author" => "Mark Twain",
        "category" => "Classics",
        "synopsis" => "The adventures of a young boy escaping his life in the southern United States.",
        "price" => 15.99,
        "enabled" => true,
    ],
    [
        "id" => 25,
        "isbn" => "978-0451529939",
        "coverPhoto" => "../../../Public/Assets/img/books/The Picture of Dorian Gray.jpg",
        "title" => "The Picture of Dorian Gray",
        "author" => "Oscar Wilde",
        "category" => "Classics",
        "synopsis" => "The story of a young man who wishes to maintain his eternal beauty at any cost.",
        "price" => 16.99,
        "enabled" => true,
    ],
];

$cartItems = [
    [
        "id" => 1,
        "cartId" => 1,
        "bookId" => 1,
        "quantity" => 4,
    ],
    [
        "id" => 2,
        "cartId" => 1,
        "bookId" => 3,
        "quantity" => 1,
    ],
    [
        "id" => 3,
        "cartId" => 2,
        "bookId" => 2,
        "quantity" => 3,
    ],
    [
        "id" => 4,
        "cartId" => 2,
        "bookId" => 5,
        "quantity" => 1,
    ]
];

$orders = [
    [
        "id" => 1,
        "userId" => 2,
        "state" => 'Pending',
        "orderDate" => '2024-10-01 10:00:00'
    ],
    [
        "id" => 2,
        "userId" => 2,
        "state" => 'Canceled',
        "orderDate" => '2024-10-02 11:30:00'
    ],
    [
        "id" => 3,
        "userId" => 3,
        "state" => 'Validated',
        "orderDate" => '2024-10-03 12:45:00'
    ],
    [
        "id" => 4,
        "userId" => 2,
        "state" => 'In Transit',
        "orderDate" => '2024-10-04 14:00:00'
    ],
    [
        "id" => 5,
        "userId" => 3,
        "state" => 'Delivered to the Customer',
        "orderDate" => '2024-10-05 15:15:00'
    ],
    [
        "id" => 6,
        "userId" => 2,
        "state" => 'Confirmed by Customer',
        "orderDate" => '2024-10-06 16:30:00'
    ],
    [
        "id" => 7,
        "userId" => 3,
        "state" => 'Pending',
        "orderDate" => '2024-10-07 17:45:00'
    ],
    [
        "id" => 8,
        "userId" => 2,
        "state" => 'Validated',
        "orderDate" => '2024-10-08 09:00:00'
    ],
    [
        "id" => 9,
        "userId" => 3,
        "state" => 'In Transit',
        "orderDate" => '2024-10-09 10:15:00'
    ],
    [
        "id" => 10,
        "userId" => 2,
        "state" => 'Canceled',
        "orderDate" => '2024-10-10 11:30:00'
    ],
];

$orderLines = [
    // Lines for order 1
    [
        "id" => 1,
        "orderId" => 1,
        "itemId" => 1,
        "price" => 29.99,
        "quantity" => 3,
    ],
    [
        "id" => 2,
        "orderId" => 1,
        "itemId" => 2,
        "price" => 35.99,
        "quantity" => 1,
    ],
    // Lines for order 2
    [
        "id" => 3,
        "orderId" => 2,
        "itemId" => 3,
        "price" => 24.99,
        "quantity" => 2,
    ],
    [
        "id" => 4,
        "orderId" => 2,
        "itemId" => 4,
        "price" => 19.99,
        "quantity" => 1,
    ],
    // Lines for order 3
    [
        "id" => 5,
        "orderId" => 3,
        "itemId" => 5,
        "price" => 21.99,
        "quantity" => 2,
    ],
    [
        "id" => 6,
        "orderId" => 3,
        "itemId" => 6,
        "price" => 18.99,
        "quantity" => 1,
    ],
    // Lines for order 4
    [
        "id" => 7,
        "orderId" => 4,
        "itemId" => 7,
        "price" => 23.99,
        "quantity" => 2,
    ],
    [
        "id" => 8,
        "orderId" => 4,
        "itemId" => 8,
        "price" => 29.99,
        "quantity" => 1,
    ],
    // Lines for order 5
    [
        "id" => 9,
        "orderId" => 5,
        "itemId" => 9,
        "price" => 32.99,
        "quantity" => 3,
    ],
    [
        "id" => 10,
        "orderId" => 5,
        "itemId" => 10,
        "price" => 16.99,
        "quantity" => 1,
    ],
    // Lines for order 6
    [
        "id" => 11,
        "orderId" => 6,
        "itemId" => 11,
        "price" => 25.99,
        "quantity" => 2,
    ],
    [
        "id" => 12,
        "orderId" => 6,
        "itemId" => 12,
        "price" => 14.99,
        "quantity" => 1,
    ],
    // Lines for order 7
    [
        "id" => 13,
        "orderId" => 7,
        "itemId" => 13,
        "price" => 22.99,
        "quantity" => 4,
    ],
    [
        "id" => 14,
        "orderId" => 7,
        "itemId" => 14,
        "price" => 19.99,
        "quantity" => 2,
    ],
    // Lines for order 8
    [
        "id" => 15,
        "orderId" => 8,
        "itemId" => 15,
        "price" => 21.99,
        "quantity" => 3,
    ],
    [
        "id" => 16,
        "orderId" => 8,
        "itemId" => 16,
        "price" => 24.99,
        "quantity" => 1,
    ],
    // Lines for order 9
    [
        "id" => 17,
        "orderId" => 9,
        "itemId" => 17,
        "price" => 29.99,
        "quantity" => 2,
    ],
    [
        "id" => 18,
        "orderId" => 9,
        "itemId" => 18,
        "price" => 16.99,
        "quantity" => 1,
    ],
    // Lines for order 10
    [
        "id" => 19,
        "orderId" => 10,
        "itemId" => 19,
        "price" => 24.99,
        "quantity" => 3,
    ],
    [
        "id" => 20,
        "orderId" => 10,
        "itemId" => 20,
        "price" => 18.99,
        "quantity" => 1,
    ],
];



if (!isset($_SESSION['categories'])) $_SESSION['categories'] = $categories;
if (!isset($_SESSION['users'])) $_SESSION['users'] = $users;
if (!isset($_SESSION['books'])) $_SESSION['books'] = $books;
if (!isset($_SESSION['carts'])) $_SESSION['carts'] = $carts;
if (!isset($_SESSION['cartItems'])) $_SESSION['cartItems'] = $cartItems;
if (!isset($_SESSION['orders'])) $_SESSION['orders'] = $orders;
if (!isset($_SESSION['orderLines'])) $_SESSION['orderLines'] = $orderLines;
