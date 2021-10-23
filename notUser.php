<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>

    <!-- link to bootstrap style -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/notUser.css">

</head>
<body>
    <!-- start of container -->
    <div class="home">
        <p>Your Search History would be diplayed Here</p>

        <!-- to display the unregistered search in a table -->

        <button id="onlyYou" type="submit">Clear</button>
        <div id="history">
            <table class="table">
                <thead>
                    <td>
                        <h2>Search Data</h2>
                    </td>
                    <td>
                        <h2>Search Time</h2>
                    </td>
                    <td>
                        <h2>Search Date</h2>
                    </td>
                </thead>
                <tbody>
                    <tr>
                        <td id="p1">
                        </td>
                        <td id="p2">
                        </td>
                        <td id="p3">
                        </td>
                    <tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end of container -->
    <script src="js/notUser.js"></script>
</body>
</html>