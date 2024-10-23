<?php

namespace App\Config;

$users = [
    [
        "id" => 1,
        "username" => "Admin",
        "email" => "admin@gmail.com",
        "password" => "123",
        "token" => "55555",
        "verified" => false,
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
    ]
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

$books = [
    [
        "id" => 1,
        "isbn" => "978-0439708180",
        "coverPhoto" => "https://example.com/harry_potter_sorcerer_stone.jpg",
        "title" => "Harry Potter and the Sorcerer's Stone",
        "autor" => "J.K. Rowling",
        "category" => "Fantasía",
        "synopsis" => "Un joven descubre que es un mago y se une a una escuela mágica donde enfrenta grandes desafíos.",
        "price" => 29.99,
    ],
    [
        "id" => 2,
        "isbn" => "978-0618640157",
        "coverPhoto" => "https://example.com/lord_of_the_rings_fellowship.jpg",
        "title" => "The Lord of the Rings: The Fellowship of the Ring",
        "autor" => "J.R.R. Tolkien",
        "category" => "Fantasía",
        "synopsis" => "Un grupo de héroes se embarca en una misión para destruir un anillo que puede dar poder ilimitado.",
        "price" => 35.99,
    ],
    [
        "id" => 3,
        "isbn" => "978-0446310789",
        "coverPhoto" => "https://example.com/to_kill_a_mockingbird.jpg",
        "title" => "To Kill a Mockingbird",
        "autor" => "Harper Lee",
        "category" => "Clásicos",
        "synopsis" => "Una historia sobre la injusticia racial en el sur de los Estados Unidos a través de los ojos de una niña.",
        "price" => 24.99,
    ],
    [
        "id" => 4,
        "isbn" => "978-0743273565",
        "coverPhoto" => "https://example.com/the_great_gatsby.jpg",
        "title" => "The Great Gatsby",
        "autor" => "F. Scott Fitzgerald",
        "category" => "Clásicos",
        "synopsis" => "La historia de un hombre misterioso y su obsesión por una mujer en la alta sociedad de Nueva York.",
        "price" => 19.99,
    ],
    [
        "id" => 5,
        "isbn" => "978-1469247028",
        "coverPhoto" => "https://example.com/rich_dad_poor_dad.jpg",
        "title" => "Rich Dad Poor Dad",
        "autor" => "Robert T. Kiyosaki",
        "category" => "Finanzas",
        "synopsis" => "Un enfoque diferente sobre cómo las personas pueden mejorar su situación financiera a través de la inversión y la educación financiera.",
        "price" => 21.99,
    ],
    [
        "id" => 6,
        "isbn" => "978-0307887894",
        "coverPhoto" => "https://example.com/the_power_of_habit.jpg",
        "title" => "The Power of Habit",
        "autor" => "Charles Duhigg",
        "category" => "Autoayuda",
        "synopsis" => "Un análisis profundo de cómo los hábitos influyen en nuestras vidas y cómo podemos transformarlos.",
        "price" => 18.99,
    ],
    [
        "id" => 7,
        "isbn" => "978-0066620992",
        "coverPhoto" => "https://example.com/good_to_great.jpg",
        "title" => "Good to Great",
        "autor" => "Jim Collins",
        "category" => "Negocios",
        "synopsis" => "Un estudio sobre cómo algunas empresas hacen la transición de ser buenas a convertirse en grandes.",
        "price" => 23.99,
    ],
    [
        "id" => 8,
        "isbn" => "978-0590353427",
        "coverPhoto" => "https://example.com/harry_potter_chamber_secrets.jpg",
        "title" => "Harry Potter and the Chamber of Secrets",
        "autor" => "J.K. Rowling",
        "category" => "Fantasía",
        "synopsis" => "Harry vuelve a Hogwarts para enfrentarse a una nueva amenaza que aterroriza a la escuela.",
        "price" => 29.99,
    ],
    [
        "id" => 9,
        "isbn" => "978-0618640157",
        "coverPhoto" => "https://example.com/the_hobbit.jpg",
        "title" => "The Hobbit",
        "autor" => "J.R.R. Tolkien",
        "category" => "Fantasía",
        "synopsis" => "La historia de Bilbo Bolsón y su aventura en busca del tesoro guardado por el dragón Smaug.",
        "price" => 32.99,
    ],
    [
        "id" => 10,
        "isbn" => "978-0307336002",
        "coverPhoto" => "https://example.com/the_secret.jpg",
        "title" => "The Secret",
        "autor" => "Rhonda Byrne",
        "category" => "Autoayuda",
        "synopsis" => "Un libro que explora el poder del pensamiento positivo y la ley de la atracción.",
        "price" => 16.99,
    ]
];

$orders = [
    [
        "id" => 1,
        "userId" => 2,
        "state" => 'pending'
    ],
    [
        "id" => 2,
        "userId" => 2,
        "state" => 'pending'
    ]
];

$orderLines = [
    [
        "id" => 1,
        "orderId" => 1,
        "itemId" => 1,
        "price" => 150,
        "quantity" => 3,
    ],
    [
        "id" => 2,
        "orderId" => 1,
        "itemId" => 2,
        "price" => 50,
        "quantity" => 1,
    ],
    [
        "id" => 3,
        "orderId" => 2,
        "itemId" => 3,
        "price" => 50,
        "quantity" => 2,
    ],
    [
        "id" => 4,
        "orderId" => 2,
        "itemId" => 3,
        "price" => 20,
        "quantity" => 5,
    ],
];


if (!isset($_SESSION['users'])) $_SESSION['users'] = $users;
if (!isset($_SESSION['books'])) $_SESSION['books'] = $books;
if (!isset($_SESSION['carts'])) $_SESSION['carts'] = $carts;
if (!isset($_SESSION['cartItems'])) $_SESSION['cartItems'] = $cartItems;
if (!isset($_SESSION['orders'])) $_SESSION['orders'] = $orders;
if (!isset($_SESSION['orderLines'])) $_SESSION['orderLines'] = $orderLines;
