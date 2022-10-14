<?php include 'config/database.php'; ?>

<?php
    $sql ='SELECT * from stored_urls';
    $result = mysqli_query($conn, $sql);
    $urls = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
define("URL_LENGTH", 5);
define("CHARSET", "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");

function generate_code(){
	
	$charset = str_shuffle(CHARSET);
	$code = substr($charset, 0, URL_LENGTH);
	
	return $code;
}

    $org_url= '';
    $url_err='';

    if(isset($_POST['submit'])) {
        $short_url = generate_code();
        if(empty($_POST['org_url'])) {
            $url_err = 'URL is required';
        } else {
            $org_url = filter_input(INPUT_POST, 'org_url', FILTER_SANITIZE_URL);
        }

        if(empty($url_err)) {
            $sql = "INSERT INTO stored_urls (org_url, tiny_url) VALUES ('$org_url', 'http://localhost:8080/url-shortener/$short_url')";

            if(mysqli_query($conn, $sql)) {
                unset($org_url);
                header('Location: index.php');
            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiny URL</title>
    <link rel="stylesheet" href="main.css" />
</head>

<body>
    <div class="top-page">
        <header>
            <h1>Tiny URL</h1>
        </header>

        <main>
            <section>
                <!-- //PHP_SELF is the name of the currently executing script. -->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <label for="org_url">Enter your long URL here:</label>
                    <input type="text" name="org_url" id="org_url" placeholder="www.google.com/longsearchhere" />

                    <input type="submit" name="submit" value="SHORTEN" />
                </form>
            </section>
            <section>
                <div class="urls">
                    <ul>
                        <?php foreach($urls as $item): ?>
                        <p>
                            <strong>Long URL:</strong>
                            <?php echo $item['org_url']; ?> <strong>Short Version:</strong>
                            <a href="<?php echo $item['org_url']; ?>"> <?php echo $item['tiny_url']; ?> </a>
                        </p>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
        </main>
</body>

</html>