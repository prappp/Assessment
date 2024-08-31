<?php
$name = '';
$food = '';
$greeting = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $food = htmlspecialchars($_POST['food']);

    $currentHour = date('H');

    if ($currentHour >= 2 && $currentHour < 11) {
        $greeting = "Good Morning";
    } elseif ($currentHour >= 11 && $currentHour < 16) {
        $greeting = "Good Afternoon";
    } elseif ($currentHour >= 16 && $currentHour < 21) {
        $greeting = "Good Evening";
    } else {
        $greeting = "Good Night";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greeting Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        label {
            display: block;
            margin: 10px 0;
        }

        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .radio-group {
            text-align: left;
            margin-bottom: 15px;
        }

        .radio-group span {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <h1><?php echo "$greeting, $name!"; ?></h1>
            <p>Your favorite food is <?php echo $food; ?>.</p>
            <a href="index.php">Back to form</a>
        <?php else: ?>
            <h1>Greeting Form</h1>
            <form action="index.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <div class="radio-group">
                    <span>Favorite Food:</span>
                    <label><input type="radio" name="food" value="Burger" required> Burger</label>
                    <label><input type="radio" name="food" value="Sushi"> Sushi</label>
                    <label><input type="radio" name="food" value="Tacos"> Tacos</label>
                </div>
                
                <button type="submit">Submit</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>