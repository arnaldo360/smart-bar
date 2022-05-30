<?php include_once("../backend/customerController.php"); ?>

<?php include("include/title.php"); ?>

<?php include("include/header.php"); ?>

<?php include("include/sidebar.php"); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Products</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item active">Create Product</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Product</h5>

                        <!-- Floating Labels Form -->
                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="Product Name" required>
                                    <label for="floatingName">Product Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingPtype" placeholder="Product Type" required>
                                    <label for="floatingPtype">Product Type</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingCat" placeholder="Product Category" required>
                                    <label for="floatingCat">Product Category</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Product Description" id="floatingTextarea" style="height: 100px;"></textarea>
                                    <label for="floatingTextarea">Description</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Upload Image</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="floatingAcl" placeholder="Alcohol" required>
                                    <label for="floatingAcl">Alcohol</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="floatingName" placeholder="Volume" required>
                                    <label for="floatingName">Volume</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="Unit" required>
                                    <label for="floatingName">Unit</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="Quanity" required>
                                    <label for="floatingName">Quanity</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" placeholder="Price" required>
                                    <label for="floatingName">Price</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="State" required>
                                        <option selected>Select Bar</option>
                                        <option value="1">Buga</option>
                                        <option value="2">Kwalaah</option>
                                    </select>
                                    <label for="floatingSelect">Bar</label>
                                </div>
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->


<?php include_once("include/footer.php"); ?>