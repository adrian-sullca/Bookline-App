
<p>Books</p>
<?php
if (isset($params['allBooks'])) {
    foreach ($params['allBooks'] as $book) {
        echo '<p>' . $book['title'] . '</p>';
    }
}