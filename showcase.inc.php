<div class="schowcase">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="profile__header">
                    <div class="profile__imageBox ">
                        <?php if (isset($user["profile_img"])) : ?>
                            <img src="<?php echo "uploads/" . htmlspecialchars($user["profile_img"]) ?>" alt="profile image" style="border: none;" class="profile__image">
                        <?php else : ?>
                            <i class="bi bi-person-bounding-box"></i>
                        <?php endif; ?>
                    </div>
                    <div class="profile__mainInfo mx-4">
                        <div class="profile__username">
                            <h1><?php echo htmlspecialchars($user["username"]); ?></h1>
                        </div>
                        <?php if (empty($user["course"])) : ?>
                            <div class="profile__course"><span>No course added yet.</span></div>
                        <?php else : ?>
                            <div class="profile__course"><span><?php echo htmlspecialchars($user["course"]); ?></span></div>
                        <?php endif; ?>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                1 of 2
            </div>
            <div class="col">
                2 of 2
            </div>
        </div>
    </div>
</div>