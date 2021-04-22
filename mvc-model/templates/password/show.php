<div class="show container">

<ul class='white'>
    <?php

    echo "<ul><h1>$password->title</h1></ul>";
    echo "<ul><h2>Username: $password->username</h2></ul>";
    echo "<ul><h2>Passwort: $password->password</h2></ul>";
    echo "<ul><h2>Email: $password->email</h2></ul>";
    echo "<ul><h2>Notes: $password->notes</h2></ul>";

    ?>
    <button class="btn btn-lg btn-outline-secondary" onclick="document.location.href='/password'" >Back</button>
    <button class="btn btn-lg btn-outline-dark" href="" onclick="document.location.href='/password/update?id=<?= $password->id?>'">Edit</button>
    <button class="btn btn-lg btn-outline-danger" onclick="document.location.href='/password/delete?id=<?= $password->id?>'">Delete</button>
</ul>

</div>