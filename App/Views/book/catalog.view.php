<?php
foreach ($_SESSION['books'] as $book) { ?>
    <a href="/book/details/<?php echo $book['id']?>">
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $book['title'] ?></h5>
                <p class="card-text"><?php echo $book['autor'] ?></p>
                <p class="card-text"><?php echo $book['category'] ?></p>
                <p class="card-text"><?php echo $book['price'] ?></p>
            </div>
        </div>
    </a>
    <br>
<? } ?>