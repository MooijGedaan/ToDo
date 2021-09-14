<?php
$servername = "localhost";
$username = "root";
$password = "mysqlww";
$dbname = 'smarttodo';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//I do this so I can use functions from functions.php
require "functions.php";
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do app</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <script src="api/api.js"></script>
    <link href="/tailwind.css" rel="stylesheet">
    <script src="/script.js"></script>
    <link href="reset.css" rel="stylesheet">
    </link>
    <link href="style.css" rel="stylesheet">
    </link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

    <?php
    $sql = "SELECT * FROM tasks;";
    $result = $conn->query($sql);
    ?>

    <div class="wrapper">
        <h1>To-Do app</h1>

        <form method="POST" action="upload.php" class="invoerveld">
            <input name="task_name" class="invoerveldTypeBar" placeholder="Type hier je To-Do">
            <button class="invoerveldKnop">
                Voeg toe
            </button>
        </form>


        <div class="WrapperToDo">
            <h2>To-Do's</h2>
            <div class="ToDoLijst">
                <?php
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    if (!$row["completed"]) {
                ?>
                        <div onclick="wegstrepen(this); sendUpdate( <?php echo $row['task_id']; ?>);">
                            <button class="rondje">
                                <div class="bevestiging"></div>
                            </button>
                            <p class="textToDo">
                                <?php
                                echo $row['task_name'];
                                ?>
                            </p>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>

        <div class="ToDoLijst">
            <h2>Gedaan</h2>
            <?php
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                if ($row["completed"]) {
            ?>
                    <div onclick="wegstrepen(this); sendUpdate( <?php echo $row['task_id']; ?>);">
                        <button class="rondje">
                            <div class="bevestiging"></div>
                        </button>
                        <p class="textToDo">

                            <?php
                            echo $row['task_name'];
                            ?>

                        </p>
                    </div>
            <?php
                }
            }
            ?>

        </div>

        <div class="WrapperSuggesties">
            <h2>Suggesties</h2>
            <div>
                <ul role="list" class="divide-y divide-solid divide-gray-200">
                    <li class="py-5">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-800">
                            Het is 35 graden
                        </span>
                        <div class="SuggestieItem">
                            <button class="SuggestieKnop">
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-plus fa-w-12 fa-7x">
                                    <path fill="currentColor" d="M368 224H224V80c0-8.84-7.16-16-16-16h-32c-8.84 0-16 7.16-16 16v144H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h144v144c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V288h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z" class=""></path>
                                </svg>
                            </button>
                            <p>
                                Ijsjes halen
                            </p>
                        </div>
                    </li>

                    <li class="py-5">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-800">
                            Het is 35 graden
                        </span>
                        <div class="SuggestieItem">
                            <button class="SuggestieKnop">
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-plus fa-w-12 fa-7x">
                                    <path fill="currentColor" d="M368 224H224V80c0-8.84-7.16-16-16-16h-32c-8.84 0-16 7.16-16 16v144H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h144v144c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V288h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z" class=""></path>
                                </svg>
                            </button>
                            <p>
                                Ijsjes halen
                            </p>
                        </div>
                    </li>
                    <li class="py-5">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-800">
                            Het is 35 graden
                        </span>
                        <div class="SuggestieItem">
                            <button class="SuggestieKnop">
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-plus fa-w-12 fa-7x">
                                    <path fill="currentColor" d="M368 224H224V80c0-8.84-7.16-16-16-16h-32c-8.84 0-16 7.16-16 16v144H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h144v144c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V288h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z" class=""></path>
                                </svg>
                            </button>
                            <p>
                                Ijsjes halen
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>




    </div>



</body>

</html>