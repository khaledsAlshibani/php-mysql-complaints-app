<?php
require_once '../../config.php';

requireLogIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once INC_DIR . 'headInclude.php' ?>
    <title>Create Complaints & Suggestions</title>
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
                    <h2 class="mb-4 fw-bold" style="max-width: 80%;">Create a Complaint or Suggestion</h2>

                    <form method="post" action="core/operations.php">
                        <div class="mb-3">
                            <div class="form-floating">
                                <select class="form-select" id="type" name="type" required>
                                    <option value="1">Complaint</option>
                                    <option value="2">Suggestion</option>
                                </select>
                                <label for="type">Type</label>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control rounded-2" id="title" placeholder="Title" name="title" required>
                                <label for="title">Title</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" id="description" name="description" placeholder="Enter description" rows="5" style="min-height: 150px;" required></textarea>
                                <label for="description">Description</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block rounded-2">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once INC_DIR . 'footInclude.php' ?>
</body>

</html>