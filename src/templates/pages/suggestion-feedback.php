<?php
require_once '../../config.php';

requireLogIn();

$suggestion_id = $_GET['id'];
$suggestion = getSuggestion($suggestion_id, $mysqli);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once INC_DIR . 'headInclude.php' ?>
    <title>Add Feedback</title>
</head>

<body class="bg-light">
    <div class="mb-4">
        <?php
        $navbar = true;
        include(TEMPLATES_DIR . 'components/header.php');
        ?>

        <div class="container">
            <div class="row justify-content-center align-items-center" style="margin-top: 100px; margin-bottom: 100px;">
                <div class="col-md-6">
                    <h2 class="mb-4" style="max-width: 80%;"><?php echo $suggestion['feedback'] ? 'Update' : 'Add' ?> Feedback For The Suggestion: <span class="fw-bold">"<?php echo $suggestion['title']; ?>"</span></h2>

                    <form method="post" action="core/operations.php">
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
    
    <?php include_once INC_DIR . 'footInclude.php' ?>
</body>

</html>