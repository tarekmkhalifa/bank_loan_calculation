<?php

function laonCalc($amount, $years)
{
    if ($_POST['years'] <= 3) {
        $rate = 0.10;
    } else {
        $rate = 0.15;
    }

    global $interest, $total_interest, $total_loan, $paid_monthly;
    $interest = $_POST['loan'] * $rate;
    $total_interest = $interest * $_POST['years'];
    $total_loan = $total_interest + $_POST['loan'];
    $months = $_POST['years'] * 12;
    $paid_monthly = round(($total_loan / $months), 2, PHP_ROUND_HALF_UP);
    return $paid_monthly;
}

if ($_POST) {
    if (empty($_POST['name']) or  empty($_POST['loan']) or  empty($_POST['years'])) {
        $error = "<div class='msg'>All Fields Required</div>";
    } else {
        $interest = '';
        $total_interest = '';
        $total_loan = '';
        $paid_monthly = '';
        $loancal = laonCalc($_POST['loan'], $_POST['years']);
        $table =   "<table class='table text-center'>
                    <tr class='bg-primary'>
                        <th>Name</th>
                        <th>Required Loan</th>
                        <th>Years</th>
                        <th>Interest</th>
                        <th>Total Interest</th>
                        <th>Total Loan</th>
                        <th>Paid Monthly</th>
                    </tr>
                    <tr>
                        <td>" . $_POST['name'] . "</td>
                        <td>" . $_POST['loan'] . "</td>
                        <td>" . $_POST['years'] . "</td>
                        <td>" . $interest . "</td>
                        <td>" . $total_interest . "</td>
                        <td>" . $total_loan . "</td>
                        <td>" . $paid_monthly . "</td>
                    </tr>
                </table>
                <a class='back' href='index.php'>Back</a>
                ";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Bank</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .msg {
            margin: 20px auto;
            padding: 10px;
            width: 50%;
            background-color: white;
            color: red;
            text-align: center;
        }

        button {
            margin-top: 15px;
            width: 100%;
        }

        table {
            margin-top: 25px;
            font-size: 20px;
        }

        table td {
            font-size: 18px;
        }

        .back {
            display: inline-block;
            padding: 10px;
            background-color: #2a6cf4;
            color: white;
            text-decoration: none;
            text-transform: uppercase;
            margin: 70px 20px;
        }

        .back:hover {
            text-decoration: none;
            color: white;
            opacity: 0.8;
        }
        /* To hide Form Inputs */
        <?php echo isset($table) ? "form {
            display: none;
        }" : ''; ?>
    </style>
</head>

<body>

    <div class="container">
        <div class="row my-5">
            <div class="col-8 offset-2">
                <form method="post">
                    <div class="row">
                        <div class="col-12">
                            <input type="text" name="name" class="form-control" placeholder="Please Enter Your Name">
                        </div>
                        <div class="col-12">
                            <input type="number" name="loan" class="form-control" placeholder="Amount of Loan">
                        </div>
                        <div class="col-12">
                            <input type="number" name="years" class="form-control" placeholder="Years">
                        </div>
                        <div class="col-12">
                            <?php echo isset($error) ? $error : ''; ?>

                        </div>

                        <div class="col-3">
                            <button id="loanButton" type="submit" class="btn btn-primary" value="calculate">Calculate Loan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php echo isset($table) ? $table : ''; ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>