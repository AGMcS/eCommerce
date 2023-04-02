    <!-- Sign-in Modal -->
    <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-light" id="signInModalLabel">Sign In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="http://localhost/website/Includes/login.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="signInEmail" id="email" aria-describedby="emailHelp"
                            value='<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : ""; ?>'>
                            <?php
                                if (isset($_SESSION["error"]) && $_SESSION["error"] == "Email field is empty") {
                                    echo "<p class='text-danger'>". $_SESSION['error']. "</p>";
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="signInPassword" id="password"
                            value=<?php echo isset($_SESSION["password"]) ? $_SESSION["password"] : ''; ?>>
                            <?php
                                if (isset($_SESSION["error"]) && $_SESSION["error"] == "Password field is empty") {
                                    echo "<p class='text-danger'>". $_SESSION['error']. "</p>";
                                }
                            ?>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="signInSubmit" class="btn btn-primary">Sign In</button>
                            <?php
                                if (isset($_SESSION["error"]) && $_SESSION["error"] == "Incorrect email or password") {
                                    echo "<p class='text-danger text-center'>". $_SESSION['error']. "</p>";
                                }
                            ?>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <p class="me-auto">Don't have an account? <a href="http://localhost/website/registerPage.php">Sign up here</a></p>
                    <button type="submit" name="signInCancel" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button>
                    </form>
                <?php
                    if(isset($_SESSION["error"])) {
                        echo '<script>
                                $(document).ready(function(){
                                    $("#signInModal").modal("show");
                                });
                            </script>';
                    }
                ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Sign-out Modal -->

    <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signOutModalLabel">Sign Out</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="http://localhost/website/Includes/logout.php" method="post">
                        <div class="mb-3 text-center">
                            <h4>Do You wish to sign out?</h4>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="signOutSubmit" class="btn btn-primary">Sign Out</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Basket Modal -->
    <div class="modal fade" id="basketModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Your Basket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Basket content goes here -->
                    <p>Your basket is currently empty.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue Shopping</button>
                    <a href="checkout.html" class="btn btn-secondary">Checkout</a>
                </div>
            </div>
        </div>
    </div>