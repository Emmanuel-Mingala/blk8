<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="data/style.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
    <title>Block 8</title>
    <style>
        p {
            width: 100%;
            margin: 0 auto;
            /* font-size-adjust: Futara; */
            font-family: "PT Sans", Calibri, Tahoma, sans-serif;
          /* text-transform: lowercase; */
        }

        .title {
            /* font-size-adjust: Arial; */

            font-size: 84px;
            /* text-transform: uppercase; */
            margin: 5px auto 0 auto;
            text-align: center;
            color: rgba(255, 255, 255, 0.2);
            background: url(data/image/fire.jpg)repeat-x;
            -webkit-background-clip: text;
            background-clip: text;
            background-size: contain;
            animation: fire 15s linear infinite;
        }
        @keyframes fire {
            0% {
                background-position: left 0 top 52px;
            }
            5% {
                background-position: left 130px top -35px;
            }
            100% {
                background-position: left 250px top 0px;
            }
        }
    </style>
</head>

<body>
    <h2 class="title">BLOCK 8
        <p>Grill and Sizzling House </p>
    </h2>
    <header>
        <div>
            <section id="home">
                <br>
                <button class="btn" id="myButton">Order Now</button>
            </section>
        </div>
        <script>
            // Get the button element by its ID
            const myButton = document.getElementById("myButton");

            // Add an event listener to the button
            myButton.addEventListener("click", function() {
                // Redirect to a new page
                window.location.href = "index2.php";
            });
        </script>

</body>
</html>