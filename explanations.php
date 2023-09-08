<!DOCTYPE html>
<html>
    <head>
        <title>Explanations</title>

        <!-- Include Bootstrap CSS -->
        <?php include_once('bootstrap.php'); ?>
    </head>

    <!-- Include Navigation Bar -- connect.php has been included within. -->
    <?php include_once('navbar.php'); ?>
    <body>
        <div class="container">
            <?php
            // Check if the "PT" parameter exists in the URL
            if (isset($_GET['PT'])) {
                // Sanitize the input (optional but recommended)
                $id = filter_input(INPUT_GET, 'PT', FILTER_SANITIZE_NUMBER_INT);

                // Now you can use $id in your code
                // ...
                // Perform the database query and output the content
                $sql = "SELECT * FROM explanations";
                $stm = $pdo->query($sql);
                $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $row) {
                    if ($row['id'] == $id) {
                        echo "<h3>" . $row['question'] . "</h3>";

                        // Description
                        echo '<div class="accordion" id="accordionExample">';
                        echo '<div class="accordion-item">';
                        echo '<h2 class="accordion-header">';
                        echo '<button class="accordion-button collapsed" style="background-color: #DA70D6;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDescription" aria-expanded="false" aria-controls="collapseDescription">';
                        echo 'Description';
                        echo '</button>';
                        echo '</h2>';
                        echo '<div id="collapseDescription" class="accordion-collapse collapse" data-bs-parent="#accordionExample">';
                        echo '<div class="accordion-body">';
                        echo "<p>" . $row['description'] . "</p>";
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                        // Answer
                        echo '<div class="accordion" id="accordionAnswer">';
                        echo '<div class="accordion-item">';
                        echo '<h2 class="accordion-header">';
                        echo '<button class="accordion-button collapsed" style="background-color: #DA70D6;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAnswer" aria-expanded="false" aria-controls="collapseAnswer">';
                        echo 'Answer';
                        echo '</button>';
                        echo '</h2>';
                        echo '<div id="collapseAnswer" class="accordion-collapse collapse" data-bs-parent="#accordionAnswer">';
                        echo '<div class="accordion-body">';
                        echo "<p>" . $row['answer'] . "</p>";
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            } else {
                // Handle the case where "PT" is not present in the URL
                echo "PT parameter is missing.";
            }
            ?>
        </div>
    </body>
</html>