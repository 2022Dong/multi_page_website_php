<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg" style="background-color: #DA70D6;" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- home page-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <!-- questions pages-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Questions
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <!-- Query the database for questions and generate dropdown items -->
                        <?php
                        include_once('connect.php');
                        $sql = "SELECT * FROM explanations";
                        $stm = $pdo->query($sql);
                        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($rows as $row) {
                            echo '<li><a class="dropdown-item" href="explanations.php?PT=' . $row['id'] . '">' . $row['id'] . ': ' . $row['question'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <!-- contact page -->
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
