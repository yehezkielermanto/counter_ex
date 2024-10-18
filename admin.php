<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counter App: Admin</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container-fluid text-center my-4">
        <h1>Nomor Antrian Saat Ini</h1>
        <h1 id="current_number" class="fw-bold" style="font-size: 80px;">0</h1>
    </div>
    
    <div class="my-4 container-fluid">
        <div class="d-flex flex-col justify-content-between">
            <button type="button" class="btn btn-primary mx-4 btn-lg" onclick="decrementNumber()">Previous</button>
            <button type="button" class="btn btn-secondary mx-4 btn-lg" onclick="resetNumber()">Reset</button>
            <button type="button" class="btn btn-primary mx-4 btn-lg" onclick="incrementNumber()">Next</button>
        </div>
    </div>

    <div class="container-fluid my-4">
        <div class="d-flex flex-col">
            <input type="number" class="form-control mx-2" min="0" name="custom_number" id="custom_number">
            <button type="button" class="btn btn-primary" onclick="addCustomNumber()">Insert Custom</button>
        </div>
    </div>

    
    <script type="text/javascript">
        function addCustomNumber(){
            let customNumber = document.querySelector('#custom_number')
            numberLocalStorage = parseInt(customNumber.value)

            const xhr = new XMLHttpRequest();
            // URL of the PHP file with query parameters
            const url = "/conn/customInsertData.php";
            const data = "number=" + numberLocalStorage;
            
            // Configure the GET request
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // Callback function when request completes
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the content with the server response
                    document.getElementById("current_number").innerHTML = xhr.responseText;
                }
            };

            // Send the POST request
            xhr.send(data);

            customNumber.value = 0;
        }

        function incrementNumber(){
            const xhr = new XMLHttpRequest();
            // URL of the PHP file with query parameters
            const url = "/conn/incrementData.php";

            // Configure the GET request
            xhr.open("POST", url, true);

            // Callback function when request completes
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the content with the server response
                    document.getElementById("current_number").innerHTML = xhr.responseText;
                }
            };

            // Send the POST request
            xhr.send();
        }

        function resetNumber(){
            const xhr = new XMLHttpRequest();
            // URL of the PHP file with query parameters
            const url = "/conn/resetData.php";

            // Configure the GET request
            xhr.open("POST", url, true);

            // Callback function when request completes
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the content with the server response
                    document.getElementById("current_number").innerHTML = xhr.responseText;
                }
            };

            // Send the POST request
            xhr.send();
        }

        function decrementNumber(){
            const xhr = new XMLHttpRequest();
            // URL of the PHP file with query parameters
            const url = "/conn/decrementData.php";

            // Configure the GET request
            xhr.open("POST", url, true);

            // Callback function when request completes
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the content with the server response
                    document.getElementById("current_number").innerHTML = xhr.responseText;
                }
            };

            // Send the POST request
            xhr.send();
        }

        function checkTrigger() {
            const numberDisplayed = localStorage.getItem('counter');
            if (numberDisplayed) {
                document.getElementById('current_number').innerText = numberDisplayed;
            }

        }

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
        // setInterval(sendAJAXRequest, 1000);
        window.onload = () => {
            sendAJAXRequest()
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>