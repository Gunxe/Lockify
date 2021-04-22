<div class="show container">

<ul class='white'>
    <?php

    echo "<ul><h1>$password->title</h1></ul>";
    echo "<ul><h2>Username: $password->username</h2></ul>";
    echo "<ul><h2>Passwort: $password->password</h2></ul>";
    echo "<ul><h2>Email: $password->email</h2></ul>";
    echo "<ul><h2>Notes: $password->notes</h2></ul>";

    ?>
    <button class="btn btn-lg btn-outline-secondary"  href="/">Home</button>
    <button class="btn btn-lg btn-outline-dark">Edit</button>
    <button class="btn btn-lg btn-outline-danger">Delete</button>
</ul>

</div