<?php
require_once 'Person.php';

$person   = null;
$submitted = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = htmlspecialchars(trim($_POST['firstname'] ?? ''));
    $lastname  = htmlspecialchars(trim($_POST['lastname'] ?? ''));
    $phone     = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $address   = htmlspecialchars(trim($_POST['address'] ?? ''));

    $person    = new Person($firstname, $lastname, $phone, $address);
    $submitted = true;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Form - Tugas PBO</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            padding: 40px 50px;
            width: 100%;
            max-width: 700px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 9px 11px;
            margin-bottom: 12px;
            border: 1px solid #b0c4d8;
            font-size: 13px;
            color: #333;
            outline: none;
            font-family: Arial, sans-serif;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #4a90d9;
        }

        textarea {
            height: 90px;
            resize: vertical;
        }

        .btn-submit {
            display: block;
            margin: 4px auto 0;
            background-color: #4a90d9;
            color: #ffffff;
            border: none;
            padding: 8px 24px;
            font-size: 13px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            border-radius: 20px;
        }

        .btn-submit:hover {
            background-color: #357abd;
        }

        /* --- Hasil --- */
        .result {
            margin-top: 20px;
            padding-top: 10px;
            font-size: 13px;
            color: #333333;
            line-height: 1.8;
        }

        .result a {
            display: inline-block;
            margin-top: 6px;
            font-size: 12px;
            color: #555555;
            text-decoration: none;
        }

        .result a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="card">
    <form method="POST" action="">
        <input
            type="text"
            name="firstname"
            placeholder="Firstname"
            value="<?php echo $submitted ? htmlspecialchars($_POST['firstname'] ?? '') : ''; ?>"
            required
        >
        <input
            type="text"
            name="lastname"
            placeholder="Lastname"
            value="<?php echo $submitted ? htmlspecialchars($_POST['lastname'] ?? '') : ''; ?>"
            required
        >
        <input
            type="text"
            name="phone"
            placeholder="Phone Number"
            value="<?php echo $submitted ? htmlspecialchars($_POST['phone'] ?? '') : ''; ?>"
            required
        >
        <textarea name="address" placeholder="Address" required><?php echo $submitted ? htmlspecialchars($_POST['address'] ?? '') : ''; ?></textarea>

        <button type="submit" name="submit" class="btn-submit">Submit</button>
    </form>

    <?php if ($submitted && $person): ?>
    <div class="result">
        <p>Hi, my name is <?php echo $person->getFullName(); ?></p>
        <p>Phone Number : <?php echo $person->getPhone(); ?></p>
        <p>Address : <?php echo $person->getAddress(); ?></p>
        <a href="index.php">Reset</a>
    </div>
    <?php endif; ?>
</div>

</body>
</html>
