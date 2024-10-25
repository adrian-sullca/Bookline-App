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

$books = [
    [
        "id" => 1,
        "isbn" => "978-0439708180",
        "coverPhoto" => "../../../Public/Assets/img/books/Harry Potter and the Sorcerer's Stone.jpg",
        "title" => "Harry Potter and the Sorcerer's Stone",
        "author" => "J.K. Rowling",
        "category" => "Fantasía",
        "synopsis" => "Un joven descubre que es un mago y se une a una escuela mágica donde enfrenta grandes desafíos.",
        "price" => 29.99,
    ],
    [
        "id" => 2,
        "isbn" => "978-0618640157",
        "coverPhoto" => "../../../Public/Assets/img/books/The Lord of the Rings The Fellowship of the Ring.jpg",
        "title" => "The Lord of the Rings: The Fellowship of the Ring",
        "author" => "J.R.R. Tolkien",
        "category" => "Fantasía",
        "synopsis" => "Un grupo de héroes se embarca en una misión para destruir un anillo que puede dar poder ilimitado.",
        "price" => 35.99,
    ],
    [
        "id" => 3,
        "isbn" => "978-0446310789",
        "coverPhoto" => "../../../Public/Assets/img/books/To Kill a Mockingbird.webp",
        "title" => "To Kill a Mockingbird",
        "author" => "Harper Lee",
        "category" => "Clásicos",
        "synopsis" => "Una historia sobre la injusticia racial en el sur de los Estados Unidos a través de los ojos de una niña.",
        "price" => 24.99,
    ],
    [
        "id" => 4,
        "isbn" => "978-0743273565",
        "coverPhoto" => "../../../Public/Assets/img/books/The Great Gatsby.webp",
        "title" => "The Great Gatsby",
        "author" => "F. Scott Fitzgerald",
        "category" => "Clásicos",
        "synopsis" => "La historia de un hombre misterioso y su obsesión por una mujer en la alta sociedad de Nueva York.",
        "price" => 19.99,
    ],
    [
        "id" => 5,
        "isbn" => "978-1469247028",
        "coverPhoto" => "../../../Public/Assets/img/books/Rich Dad Poor Dad.jpg",
        "title" => "Rich Dad Poor Dad",
        "author" => "Robert T. Kiyosaki",
        "category" => "Finanzas",
        "synopsis" => "Un enfoque diferente sobre cómo las personas pueden mejorar su situación financiera a través de la inversión y la educación financiera.",
        "price" => 21.99,
    ],
    [
        "id" => 6,
        "isbn" => "978-0307887894",
        "coverPhoto" => "../../../Public/Assets/img/books/The Power of Habit.jpg",
        "title" => "The Power of Habit",
        "author" => "Charles Duhigg",
        "category" => "Autoayuda",
        "synopsis" => "Un análisis profundo de cómo los hábitos influyen en nuestras vidas y cómo podemos transformarlos.",
        "price" => 18.99,
    ],
    [
        "id" => 7,
        "isbn" => "978-0066620992",
        "coverPhoto" => "../../../Public/Assets/img/books/Good to Great.webp",
        "title" => "Good to Great",
        "author" => "Jim Collins",
        "category" => "Negocios",
        "synopsis" => "Un estudio sobre cómo algunas empresas hacen la transición de ser buenas a convertirse en grandes.",
        "price" => 23.99,
    ],
    [
        "id" => 8,
        "isbn" => "978-0590353427",
        "coverPhoto" => "../../../Public/Assets/img/books/Harry Potter and the Chamber of Secrets.jpg",
        "title" => "Harry Potter and the Chamber of Secrets",
        "author" => "J.K. Rowling",
        "category" => "Fantasía",
        "synopsis" => "Harry vuelve a Hogwarts para enfrentarse a una nueva amenaza que aterroriza a la escuela.",
        "price" => 29.99,
    ],
    [
        "id" => 9,
        "isbn" => "978-0618640157",
        "coverPhoto" => "../../../Public/Assets/img/books/The Hobbit.webp",
        "title" => "The Hobbit",
        "author" => "J.R.R. Tolkien",
        "category" => "Fantasía",
        "synopsis" => "La historia de Bilbo Bolsón y su aventura en busca del tesoro guardado por el dragón Smaug.",
        "price" => 32.99,
    ],
    [
        "id" => 10,
        "isbn" => "978-0307336002",
        "coverPhoto" => "../../../Public/Assets/img/books/The Secret.jpg",
        "title" => "The Secret",
        "author" => "Rhonda Byrne",
        "category" => "Autoayuda",
        "synopsis" => "Un libro que explora el poder del pensamiento positivo y la ley de la atracción.",
        "price" => 16.99,
    ],
    [
        "id" => 11,
        "isbn" => "978-0143125471",
        "coverPhoto" => "../../../Public/Assets/img/books/The Alchemist.webp",
        "title" => "The Alchemist",
        "author" => "Paulo Coelho",
        "category" => "Filosofía",
        "synopsis" => "La historia de un joven pastor que sigue sus sueños para encontrar un tesoro en Egipto.",
        "price" => 25.99,
    ],
    [
        "id" => 12,
        "isbn" => "978-0307455925",
        "coverPhoto" => "../../../Public/Assets/img/books/The Road.webp",
        "title" => "The Road",
        "author" => "Cormac McCarthy",
        "category" => "Ficción",
        "synopsis" => "Un padre y su hijo luchan por sobrevivir en un mundo post-apocalíptico.",
        "price" => 14.99,
    ],
    [
        "id" => 13,
        "isbn" => "978-1501173219",
        "coverPhoto" => "../../../Public/Assets/img/books/The Outsider.jpg",
        "title" => "The Outsider",
        "author" => "Stephen King",
        "category" => "Terror",
        "synopsis" => "Un detective investiga un caso que desafía toda lógica y razón.",
        "price" => 22.99,
    ],
    [
        "id" => 14,
        "isbn" => "978-0060850524",
        "coverPhoto" => "../../../Public/Assets/img/books/Brave New World.webp",
        "title" => "Brave New World",
        "author" => "Aldous Huxley",
        "category" => "Distopía",
        "synopsis" => "Un mundo futurista donde el control total sobre la sociedad es el principal objetivo.",
        "price" => 19.99,
    ],
    [
        "id" => 15,
        "isbn" => "978-0553212570",
        "coverPhoto" => "../../../Public/Assets/img/books/The Old Man and the Sea.webp",
        "title" => "The Old Man and the Sea",
        "author" => "Ernest Hemingway",
        "category" => "Ficción",
        "synopsis" => "Las luchas de un viejo pescador contra un enorme pez en el mar.",
        "price" => 14.99,
    ],
    [
        "id" => 16,
        "isbn" => "978-0380730407",
        "coverPhoto" => "../../../Public/Assets/img/books/Dune.webp",
        "title" => "Dune",
        "author" => "Frank Herbert",
        "category" => "Ciencia Ficción",
        "synopsis" => "La lucha por el control de un planeta desértico y su recurso más valioso, la especia.",
        "price" => 29.99,
    ],
    [
        "id" => 17,
        "isbn" => "978-0345339683",
        "coverPhoto" => "../../../Public/Assets/img/books/The Catcher in the Rye.jpg",
        "title" => "The Catcher in the Rye",
        "author" => "J.D. Salinger",
        "category" => "Clásicos",
        "synopsis" => "La historia de un adolescente rebelde que busca su identidad y lugar en el mundo.",
        "price" => 18.99,
    ],
    [
        "id" => 18,
        "isbn" => "978-0143127550",
        "coverPhoto" => "../../../Public/Assets/img/books/Gone Girl.webp",
        "title" => "Gone Girl",
        "author" => "Gillian Flynn",
        "category" => "Thriller",
        "synopsis" => "La desaparición de una mujer revela secretos oscuros sobre su matrimonio.",
        "price" => 26.99,
    ],
    [
        "id" => 19,
        "isbn" => "978-1501110368",
        "coverPhoto" => "../../../Public/Assets/img/books/Station Eleven.jpg",
        "title" => "Station Eleven",
        "author" => "Emily St. John Mandel",
        "category" => "Ciencia Ficción",
        "synopsis" => "Un grupo de actores sobrevive en un mundo devastado por un virus.",
        "price" => 23.99,
    ],
    [
        "id" => 20,
        "isbn" => "978-0062851935",
        "coverPhoto" => "../../../Public/Assets/img/books/The Night Circus.webp",
        "title" => "The Night Circus",
        "author" => "Erin Morgenstern",
        "category" => "Fantasía",
        "synopsis" => "Un circo mágico aparece sin previo aviso y es el escenario de un desafío entre dos jóvenes magos.",
        "price" => 24.99,
    ],
    [
        "id" => 21,
        "isbn" => "978-0062238172",
        "coverPhoto" => "../../../Public/Assets/img/books/The Book Thief.jpg",
        "title" => "The Book Thief",
        "author" => "Markus Zusak",
        "category" => "Histórico",
        "synopsis" => "La historia de una niña que encuentra consuelo en los libros durante la Segunda Guerra Mundial.",
        "price" => 19.99,
    ],
    [
        "id" => 22,
        "isbn" => "978-0545162074",
        "coverPhoto" => "../../../Public/Assets/img/books/Looking for Alaska.webp",
        "title" => "Looking for Alaska",
        "author" => "John Green",
        "category" => "Joven Adulto",
        "synopsis" => "Un viaje emocional de amistad y pérdida en un internado.",
        "price" => 18.99,
    ],
    [
        "id" => 23,
        "isbn" => "978-0143039433",
        "coverPhoto" => "../../../Public/Assets/img/books/Atonement.jpg",
        "title" => "Atonement",
        "author" => "Ian McEwan",
        "category" => "Ficción",
        "synopsis" => "Una historia sobre amor y redención a través del tiempo.",
        "price" => 21.99,
    ],
    [
        "id" => 24,
        "isbn" => "978-0553213119",
        "coverPhoto" => "../../../Public/Assets/img/books/The Adventures of Huckleberry Finn.jpg",
        "title" => "The Adventures of Huckleberry Finn",
        "author" => "Mark Twain",
        "category" => "Clásicos",
        "synopsis" => "Las aventuras de un joven que escapa de su vida en el sur de los Estados Unidos.",
        "price" => 15.99,
    ],
    [
        "id" => 25,
        "isbn" => "978-0451529939",
        "coverPhoto" => "../../../Public/Assets/img/books/The Picture of Dorian Gray.jpg",
        "title" => "The Picture of Dorian Gray",
        "author" => "Oscar Wilde",
        "category" => "Clásicos",
        "synopsis" => "La historia de un joven que desea mantener su belleza eterna a cualquier costo.",
        "price" => 16.99,
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
