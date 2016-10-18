<h3> This is the result of executing post on test2.php </h3>
Hi
<?php echo htmlspecialchars($_POST['name']); ?>.

You are <?php echo (int)$_POST['age']; ?> years old.

And the method was <?php echo $_SERVER['REQUEST_METHOD']; ?>
