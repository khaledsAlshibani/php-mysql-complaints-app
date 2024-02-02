<section class="mb-5">
    <div class="d-flex gap-4 align-items-center mb-4">
        <h2 class="mb-0 fw-bold">Complaints</h2>
        <?php if (getUserType() == 'user') : ?>
            <a href="templates/pages/create.php" class="btn btn-outline-primary">New Complaint</a>
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
                                <a class="btn btn-success me-2" href="templates/pages/complaint-feedback.php?id=<?php echo $complaint['id']; ?>">Add Feedback</a>
                            <?php else : ?>
                                <a class="btn btn-primary me-2" href="templates/pages/complaint-feedback.php?id=<?php echo $complaint['id']; ?>">Update Feedback</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#compFeedbackDeleteModal<?php echo $complaint['id']; ?>">Delete Feedback</button>
                            <?php endif; ?>
                        <?php endif; ?>

                        <!-- Users Buttons -->
                        <?php if (getUserType() == 'user') : ?>
                            <a class="btn btn-primary me-2" href="templates/pages/update-complaint.php?id=<?php echo $complaint['id']; ?>">Update</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#compDeleteModal<?php echo $complaint['id']; ?>">Delete</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Delete Modals -->
            <?php
            if (getUserType() == 'user') {
                include(MODALS_DIR . 'delete-complaint-modal.php');
            } elseif (getUserType() == 'admin') {
                include(MODALS_DIR . 'delete-complaint-feedback-modal.php');
            }
            ?>
        <?php endforeach; ?>
    </div>
</section>