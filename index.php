<!DOCTYPE html>
<head><title>Muhammad Salman Razzaq</title></head>
<body style="font-family: sans-serif;">
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash of a four digit pin and check all 10,000 possible four digit PINs to determine the PIN.</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
// If there is no parameter, this code is all skipped
if (isset($_GET['md5'])) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // This is our numbers
    $txt = "0123456789";
    $show = 15;

    // Outer loop to go through the number for the
    // first position in our "possible" pre-hash
    // text
    for ($i = 0; $i < strlen($txt); $i++) {
        $no1 = $txt[$i]; // The first of four numbers

        // Our inner loop. Note the use of new variables
        // $j and $no2
        for ($j = 0; $j < strlen($txt); $j++) {
            $no2 = $txt[$j]; // The second of four numbers

            // Our inner loop. Note the use of new variables
            // $k and $no3

            for ($k = 0; $k < strlen($txt); $k++) {
                $no3 = $txt[$k]; // The third of four numbers

                // Our inner loop. Note the use of new variables
                // $l and $no4
                for ($l = 0; $l < strlen($txt); $l++) {
                    $no4 = $txt[$l]; // Our fourth number

                    // Concatenate the 4 numbrs together to 
                    // form the "possible" pre-hash text
                    $try = $no1 . $no2 . $no3 . $no4;

                    // Run the hash and then check to see if we match
                    $check = hash('md5', $try);
                    if ($check == $md5) {
                        $goodtext = $try;
                        break; // Exit the inner loop
                    }

                    // Debug output until $show hits 0
                    if ($show > 0) {
                        print "$check $try\n";
                        $show = $show - 1;
                    }
                }
            }
        }
    }
    // Compute elapsed time
    $time_post = microtime(true);
    print "Ellapsed time: ";
    print $time_post - $time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>PIN: <?= htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>

</ul>
</body>
</html>



