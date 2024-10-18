<?php
include 'conn/conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counter App</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-main">

    <div class="container-fluid p-4 text-center content">
        <h1 class="large-text-title" style="margin-top: 50px;">Nomor Antrean Saat Ini</h1>
        <h1 class="large-text fw-bold" id="current_number">0</h1>
    </div>
    <div class="running-text-container">
        <div class="running-text">
            Chag Sukkot Sameach | Persiapkan nomor antrean anda untuk mendapatkan
            sertifikat Hayesod The Foundation...
        </div>
    </div>

    <script type="text/javascript">
        function sendAJAXRequest() {
            // Create a new XMLHttpRequest object
            const xhr = new XMLHttpRequest();
            // URL of the PHP file with query parameters
            const url = "/conn/getData.php";

            // Configure the GET request
            xhr.open("GET", url, true);

            // Callback function when request completes
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the content with the server response
                    document.getElementById("current_number").innerHTML = xhr.responseText;
                }
            };

            // Send the GET request
            xhr.send();
        }

        // Run the check on page load
        setInterval(sendAJAXRequest, 5000);

        // Optionally, check for changes to localStorage
        // window.addEventListener('storage', checkTrigger);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>