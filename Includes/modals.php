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
                                if (isset($_GET["errorEmail"])) {
                                    echo "<p class='text-danger'>". $_GET['errorEmail']. "</p>";
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="signInPassword" id="password"
                            value=<?php echo isset($_SESSION["password"]) ? $_SESSION["password"] : ''; ?>>
                            <?php
                                if (isset($_GET["errorPassword"])) {
                                    echo "<p class='text-danger'>". $_GET['errorPassword']. "</p>";
                                }
                            ?>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="signInSubmit" class="btn btn-primary">Sign In</button>
                            <?php
                                if (isset($_GET["wrongCredentials"])) {
                                    echo "<p class='text-danger text-center'>". $_GET['wrongCredentials']. "</p>";
                                }
                            ?>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <p class="me-auto">Don't have an account? <a href="http://localhost/website/registerPage.php">Sign up here</a></p>
                    <button type="submit" name="signInCancel" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button>
                    </form>
                <?php
                    if(isset($_GET["errorEmail"]) || isset($_GET["errorPassword"]) || isset($_GET["wrongCredentials"])) {
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

    <!-- Account Modal -->
    
    <div class="modal fade" id="accountModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-light" id="accountModalLabel">My Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td class="text-end"><b>Account ID</b></td>
                            <td><?php echo $_SESSION["account"]["AccountID"]; ?></td>
                        </tr>

                        <?php
                            if (isset($_SESSION["account"]["AdminID"])) {
                        ?>

                        <tr>
                            <td class="text-end"><b>Administrator ID</b></td>
                            <td><?php echo $_SESSION["account"]["AdminID"]; ?></td>
                        </tr>

                        <?php
                            }
                        ?>

                        <tr>
                            <td class="text-end"><b>Name</b></td>
                            <td><?php echo $_SESSION["account"]["FirstName"]. " ".$_SESSION["account"]["LastName"]; ?></td>
                        </tr>
                        <tr>
                            <td class="text-end"><b>Address</b></td>
                            <td><?php echo $_SESSION["account"]["Street"]; ?></td>
                        </tr>
                        <tr>
                            <td class="text-end"></td>
                            <td><?php echo $_SESSION["account"]["City"]; ?></td>
                        </tr>
                        <tr>
                            <td class="text-end"></td>
                            <td><?php echo $_SESSION["account"]["Country"]; ?></td>
                        </tr>
                        <tr>
                            <td class="text-end"></td>
                            <td><?php echo $_SESSION["account"]["Postcode"]; ?></td>
                        </tr>
                        <tr>
                            <td class="text-end"><b>E-mail</b></td>
                            <td><?php echo $_SESSION["account"]["Email"]; ?></td>
                        </tr>
                    </table>

                    <div class="row-mb-3 text-center">
                        <button href="#" data-bs-toggle="modal" data-bs-target="#accountEditModal" style="background-color: #008d7d;" class="btn text-light">Edit Account</button>
                        <button href="#" data-bs-toggle="modal" data-bs-target="#passwordChangeModal" style="background-color: rgba(248, 90, 64, 0.8); font-weight: 600" class="btn text-dark">Change Password</button>
                    </div>

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
                    <a href="checkout.php" class="btn btn-secondary">Checkout</a>
                </div>
            </div>
        </div>
    </div>

        <!----------- Edit Account Modal ------------->

        <div class="modal fade" id="accountEditModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-light" id="accountEditModalLabel"><?php echo $_SESSION["account"]["AccountID"] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form" action="http://localhost/website/Includes/userAlterAccount.php" method="post">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="editFirstName" class="form-label">First Name</label>
                                    <input type="text" name="edit[firstName]" class="form-control" id="editFirstName" value="<?php echo $_SESSION["account"]["FirstName"] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="editLastName" class="form-label">Last Name</label>
                                    <input type="text" name="edit[lastName]" class="form-control" id="editLastName" value="<?php echo $_SESSION["account"]["LastName"] ?>">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="editAddress" class="form-label">Address</label>
                                <input type="text" name="edit[street]" class="form-control" id="editAddress" value="<?php echo $_SESSION["account"]["Street"] ?>">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="editCity" class="form-label">City</label>
                                    <input type="text" name="edit[city]" class="form-control" id="editCity" value="<?php echo $_SESSION["account"]["City"] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="editCountry" class="form-label">Country</label>
                                    <select id="editCountry" name="edit[country]" class="form-select">
                                        <option value="England" <?php echo ($_SESSION["account"]["Country"] == "England") ? "selected" : ""; ?>>England</option>
                                        <option value="Scotland" <?php echo ($_SESSION["account"]["Country"] == "Scotland") ? "selected" : ""; ?>>Scotland</option>
                                        <option value="Northern Ireland" <?php echo ($_SESSION["account"]["Country"] == "Northern Ireland") ? "selected" : ""; ?>>Northern Ireland</option>
                                        <option value="Wales" <?php echo ($_SESSION["account"]["Country"] == "Wales") ? "selected" : ""; ?>>Wales</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label for="editPostcode" class="form-label">Zip</label>
                                    <input type="text" name="edit[postcode]" class="form-control" id="editPostcode" value="<?php echo $_SESSION["account"]["Postcode"] ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="editEmail" class="form-label">Email</label>
                                    <input type="email" name="edit[email]" class="form-control" id="editEmail" value="<?php echo $_SESSION["account"]["Email"] ?>">
                                </div>

                            </div>

                            <div class="row-mb-3 text-center">
                                <input type="hidden" name="edit[id]" value="<?php echo $_SESSION["account"]["AccountID"]; ?>">
                                <button type="submit" style="background-color: #008d7d;" name="<?php echo "edit[submit]"; ?>" class="btn text-light">Save Changes</button>
                                <button type="submit" style="background-color: rgba(248, 90, 64, 0.8); font-weight: 600" name="<?php echo "edit[delete]"; ?>" class="btn text-dark">Delete Account</button>
                            </div>

                            <hr class="hr-splitter">
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="passwordChangeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-light" id="passwordChangeModalLabel">Password Change</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form" action="http://localhost/website/Includes/userAlterAccount.php" method="post">

                            <div class="mb-3">
                                <label for="oldPassword" class="form-label">To change passwords, please enter your current password</label>
                                <input type="password" name="password[old]" class="form-control" id="oldPassword">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input type="password" name="password[new]" class="form-control" id="newPassword">
                                </div>
                                <div class="col-md-6">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" name="password[confirm]" class="form-control" id="confirmPassword">
                                </div>
                            </div>

                            <div class="row-mb-3 text-center">
                                <input type="hidden" name="password[id]" value="<?php echo $_SESSION["account"]["AccountID"]; ?>">
                                <button type="submit" style="background-color: #008d7d;" name="<?php echo "edit[submit]"; ?>" class="btn text-light">Save Changes</button>
                            </div>

                            <hr class="hr-splitter">
                        </form>
                    </div>
                </div>
            </div>
        </div>