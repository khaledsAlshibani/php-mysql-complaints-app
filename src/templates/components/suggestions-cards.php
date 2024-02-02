<section class="mb-5">
    <div class="d-flex gap-4 align-items-center mb-4">
        <h2 class="mb-0 fw-bold">Suggestions</h2>
        <?php if (getUserType() == 'user') : ?>
            <a href="templates/pages/create.php" class="btn btn-outline-primary">New Suggestion</a>
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
                                <a class="btn btn-success me-2" href="templates/pages/suggestion-feedback.php?id=<?php echo $suggestion['id']; ?>">Add Feedback</a>
                            <?php else : ?>
                                <a class="btn btn-primary me-2" href="templates/pages/suggestion-feedback.php?id=<?php echo $suggestion['id']; ?>">Update Feedback</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#sugFeedbackDeleteModal<?php echo $suggestion['id']; ?>">Delete Feedback</button>
                            <?php endif; ?>
                        <?php endif; ?>

                        <!-- Users Buttons -->
                        <?php if (getUserType() == 'user') : ?>
                            <?php if (!$suggestion['status']) : ?>
                                <a class="btn btn-primary me-2" href="templates/pages/update-suggestion.php?id=<?php echo $suggestion['id']; ?>">Update</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#sugDeleteModal<?php echo $suggestion['id']; ?>">Delete</button>
                            <?php else : ?>
                                <button type="button" class="btn btn-primary me-2" disabled>Update</button>
                                <button type="button" class="btn btn-danger" disabled>Delete</button>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php
            if (getUserType() == 'user') {
                include(MODALS_DIR . 'delete-suggestion-modal.php');
            } elseif (getUserType() == 'admin') {
                include(MODALS_DIR . 'delete-suggestion-feedback-modal.php');
            }
            ?>
        <?php endforeach; ?>
    </div>
</section>