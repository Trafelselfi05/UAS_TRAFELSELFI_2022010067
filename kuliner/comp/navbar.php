<div class="container-fluid fixed-top">
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="index.php" class="navbar-brand">
                <h1 class="text-primary display-6">JOY BAKERY</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="catalog.php" class="nav-item nav-link">Catalog</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="cart.html" class="dropdown-item">Cart</a>
                                    <a href="chackout.html" class="dropdown-item">Chackout</a>
                                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                    <a href="404.html" class="dropdown-item">404 Page</a>
                                </div>
                            </div> -->
                </div>
                <div class="d-flex m-3 me-0">
                    <!-- Include this modified HTML code -->
                    <a href="cart.php" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        <span
                            class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                            style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                            <?= isset($_SESSION['pesanan']) ? count($_SESSION['pesanan']) : 0; ?>
                        </span>
                    </a>

                    <div class="nav-item dropdown">
                        <a href="#" class="my-auto nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <?php if (isset($_SESSION['login'])): ?>
                                <a href="cart.php" class="dropdown-item text-primary disabled">
                                    <?= $_SESSION['login']; ?>
                                </a>
                                <div id="logoutButton" class="dropdown-item" style="cursor:pointer;">Log Out</div>
                            <?php else: ?>
                                <a href="login.php" class="dropdown-item" style="cursor:pointer;">Login</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
 
<script>


    $("#logoutButton").click(function () {
        Swal.fire({
            title: "Apakah anda ingin logout?",
            text: "tekan iya untuk logout",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#dc3545",
            cancelButtonColor: "#81c408",
            confirmButtonText: "Iya",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Logout berhasil",
                    text: "Terima kasih telah berbelanja",
                    icon: "success"
                }).then(function () {
                    $.ajax({
                        type: "POST",
                        url: "method/logout.php",
                        data: {},
                        dataType: "json",
                        cache: false,
                        success: function (data) { }
                    });
                    location.reload();
                });
            }
        });
    });
</script>
