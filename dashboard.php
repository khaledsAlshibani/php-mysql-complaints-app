<?php
require_once 'functions.php';

if (isLogout()) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dashboard - Complaints and Suggestions System</title>
</head>

<body class="bg-light">
    <div class="mb-4">
        <?php
        $navbar = true;
        include('templates/header.php');
        ?>

        <div class="container-fluid mt-5">
            <div class="row justify-content-center mt-4" style="margin-top: 120px !important;">
                <div class="">
                    <div class="container"> <!-- Added container div -->
                        <!-- Complaints Cards Start -->
                        <section class="mb-5">
                            <div class="d-flex gap-4 align-items-center mb-4">
                                <h2 class="mb-0 fw-bold">Complaints</h2>
                                <?php if (getUserType() == 'user') : ?>
                                    <a href="create.php" class="btn btn-outline-primary">New Complaint</a>
                                <?php endif; ?>
                            </div>

                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                <?php
                                $i = 1;

                                if (getUserType() == 'admin') {
                                    $complaints = getAllComplaints($mysqli);
                                } else {
                                    $complaints = getComplaintsByUser($mysqli);
                                }

                                foreach ($complaints as $complaint) : ?>
                                    <div class="col mb-2">
                                        <div class="card d-flex flex-column h-100 border-gray rounded-4">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $complaint['title']; ?></h5>
                                                <p class="card-text"><?php echo $complaint['description']; ?></p>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <?php if (getUserType() == 'admin') : ?>
                                                    <li class="list-group-item border-top-0 border-start-0 border-end-0">
                                                        <strong>By: </strong>
                                                        <span class="text-capitalize"><?php echo getFullNameById($complaint['user_id'], $mysqli); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="list-group-item border-top-0 border-start-0 border-end-0">
                                                    <strong>Status: </strong>
                                                    <span class="badge <?php echo $complaint['status'] ? 'bg-success text-white' : 'bg-warning text-white'; ?>">
                                                        <?php echo $complaint['status'] ? 'Resolved' : 'Pending'; ?>
                                                    </span>
                                                </li>
                                                <li class="list-group-item border-top-0 border-start-0 border-end-0">
                                                    <strong>Feedback: </strong>
                                                    <?php if ($complaint['feedback']) : ?>
                                                        <?php echo $complaint['feedback']; ?>
                                                    <?php else : ?>
                                                        No feedback added
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                            <div class="card-body d-flex align-items-end">
                                                <!-- Admin Buttons -->
                                                <?php if (getUserType() == 'admin') : ?>
                                                    <?php if (!$complaint['feedback']) : ?>
                                                        <a class="btn btn-success me-2" href="complaint-feedback.php?id=<?php echo $complaint['id']; ?>">Add Feedback</a>
                                                    <?php else : ?>
                                                        <a class="btn btn-primary me-2" href="complaint-feedback.php?id=<?php echo $complaint['id']; ?>">Update Feedback</a>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#compFeedbackDeleteModal<?php echo $complaint['id']; ?>">Delete Feedback</button>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <!-- Users Buttons -->
                                                <?php if (getUserType() == 'user') : ?>
                                                    <a class="btn btn-primary me-2" href="update-complaint.php?id=<?php echo $complaint['id']; ?>">Update</a>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#compDeleteModal<?php echo $complaint['id']; ?>">Delete</button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modals -->
                                    <?php include('templates/complaint-delete-modal.php'); ?>
                                    <?php include('templates/complaint-feedback-delete-modal.php'); ?>
                                <?php endforeach; ?>
                            </div>
                        </section>
                        <!-- Complaints Cards End -->

                        <!-- Suggestions Cards Start -->
                        <section class="mb-5">
                            <div class="d-flex gap-4 align-items-center mb-4">
                                <h2 class="mb-0 fw-bold">Suggestions</h2>
                                <?php if (getUserType() == 'user') : ?>
                                    <a href="create.php" class="btn btn-outline-primary">New Suggestion</a>
                                <?php endif; ?>
                            </div>

                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                <?php
                                $i = 1;

                                if (getUserType() == 'admin') {
                                    $suggestions = getAllSuggestions($mysqli);
                                } else {
                                    $suggestions = getSuggestionsByUser($mysqli);
                                }

                                foreach ($suggestions as $suggestion) : ?>
                                    <div class="col mb-4">
                                        <div class="card d-flex flex-column h-100 border-gray rounded-4">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $suggestion['title']; ?></h5>
                                                <p class="card-text"><?php echo $suggestion['description']; ?></p>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <?php if (getUserType() == 'admin') : ?>
                                                    <li class="list-group-item border-top-0 border-start-0 border-end-0">
                                                        <strong>By: </strong>
                                                        <span class="text-capitalize"><?php echo getFullNameById($suggestion['user_id'], $mysqli); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="list-group-item border-top-0 border-start-0 border-end-0">
                                                    <strong>Status: </strong>
                                                    <span class="badge <?php echo $suggestion['status'] ? 'bg-success text-white' : 'bg-warning text-white'; ?>">
                                                        <?php echo $suggestion['status'] ? 'Resolved' : 'Pending'; ?>
                                                    </span>
                                                </li>
                                                <li class="list-group-item border-top-0 border-start-0 border-end-0">
                                                    <strong>Feedback: </strong>
                                                    <?php if (isset($suggestion['feedback'])) : ?>
                                                        <?php echo $suggestion['feedback']; ?>
                                                    <?php else : ?>
                                                        No feedback added
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                            <div class="card-body d-flex align-items-end">
                                                <!-- Admin Buttons -->
                                                <?php if (getUserType() == 'admin') : ?>
                                                    <?php if (!$suggestion['feedback']) : ?>
                                                        <a class="btn btn-success me-2" href="suggestion-feedback.php?id=<?php echo $suggestion['id']; ?>">Add Feedback</a>
                                                    <?php else : ?>
                                                        <a class="btn btn-primary me-2" href="suggestion-feedback.php?id=<?php echo $suggestion['id']; ?>">Update Feedback</a>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#sugFeedbackDeleteModal<?php echo $suggestion['id']; ?>">Delete Feedback</button>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <!-- Users Buttons -->
                                                <?php if (getUserType() == 'user') : ?>
                                                    <?php if (!$complaint['status']) : ?>
                                                        <a class="btn btn-primary me-2" href="update-suggestion.php?id=<?php echo $suggestion['id']; ?>">Update</a>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#compDeleteModal<?php echo $suggestion['id']; ?>">Delete</button>
                                                    <?php else : ?>
                                                        <button type="button" class="btn btn-primary me-2" disabled>Update</button>
                                                        <button type="button" class="btn btn-danger" disabled>Delete</button>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modals -->
                                    <?php include('templates/suggestion-delete-modal.php'); ?>
                                    <?php include('templates/suggestion-feedback-delete-modal.php'); ?>
                                <?php endforeach; ?>
                            </div>
                        </section>
                        <!-- Suggestions Cards End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('templates/footer.php') ?>

    <!-- Include your scripts here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>


</html>