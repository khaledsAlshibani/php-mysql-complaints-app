<?php
require_once 'functions.php';

if (isLogout()) {
    header("Location: index.php");
    exit;
}

$suggestion_id = $_GET['id'];
$suggestion = getSuggestion($suggestion_id, $mysqli);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Add Feedback</title>
</head>

<body class="bg-light">
    <div class="mb-4">
        <?php
        $navbar = true;
        include('templates/header.php');
        ?>

        <div class="container">
            <div class="row justify-content-center align-items-center" style="margin-top: 100px; margin-bottom: 100px;">
                <div class="col-md-6">
                    <h2 class="mb-4" style="max-width: 80%;"><?php echo $suggestion['feedback'] ? 'Update' : 'Add' ?> Feedback For The Suggestion: <span class="fw-bold">"<?php echo $complaint['title']; ?>"</span></h2>

                    <form method="post" action="functions.php">
                        <input type="hidden" name="suggestion_id" value="<?php echo $suggestion_id; ?>">
                        
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" id="feedback" name="suggestion_feedback" placeholder="Enter Feedback" rows="5" style="min-height: 150px;" required><?php echo $suggestion['feedback']; ?></textarea>
                                <label for="feedback">Feedback</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block rounded-2"><?php echo $suggestion['feedback'] ? 'Update' : 'Add' ?> Feedback</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('templates/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>