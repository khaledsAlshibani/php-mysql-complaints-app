<?php
require_once '../../config.php';

requireLogIn();

$complaint_id = $_GET['id'];

$complaint = getComplaint($complaint_id, $mysqli);
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
                    <h2 class="mb-4" style="max-width: 80%;"><?php echo $complaint['feedback'] ? 'Update' : 'Add' ?> Feedback For The Complaint: <span class="fw-bold">"<?php echo $complaint['title']; ?>"</span></h2>

                    <form method="post" action="core/operations.php">
                        <input type="hidden" name="complaint_id" value="<?php echo $complaint_id; ?>">

                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" id="feedback" name="complaint_feedback" placeholder="Enter Feedback" rows="5" style="min-height: 150px;" required><?php echo $complaint['feedback']; ?></textarea>
                                <label for="feedback">Feedback</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block rounded-2"><?php echo $complaint['feedback'] ? 'Update' : 'Add' ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once INC_DIR . 'footInclude.php' ?>
</body>

</html>