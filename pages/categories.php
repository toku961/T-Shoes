<?php
session_start();
require_once("../classes/Category.php");

//create an object
$category = new category;
?>

<!doctype php>
<php lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <?php
                    if(isset($_SESSION['message'])){
                        echo "<div class='alert alert-success'>" . $_SESSION['message']."</div>";
                        unset($_SESSION['message']);
                    }
                ?>
                <table class="table table-striped">
                <thead>
                <th>ID</th>
                <th>name</th>
                </thead>
                <tbody>
                 <?php
                 $result = $category->getCategory();

                 if($result === FALSE){
                     echo "td colspan='1'>No Data found.</td>";
                 }else{
                        foreach($result as $key => $row){
                            $category_id = $row['category_id'];
                            echo "<ul>";
                            echo "<li>" . $row['category_name'] . "</li>";
                            echo "</ul>";
                        }
                 }
                 ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</php>