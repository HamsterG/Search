
<?php

    $conn = mysqli_connect("localhost", "root", "root", "tutorial");

    if(mysqli_connect_errno()){
        echo "Failed to connect: " . mysqli_connect_error();
    }

    error_reporting(0);

    $output = '';

    if(isset($_GET['q']) && $_GET['q'] !== ' '){
        $searchq = $_GET['q'];

        $q = mysqli_query($conn, "SELECT * FROM search WHERE keywords LIKE '%$searchq%' OR title LIKE '%$searchq%'") or die(mysqli_error());
        $c = mysqli_num_rows($q);
        if($c == 0){
            $output = 'No search results for <b>"' . $searchq . '"</b>';
        } else {
            while($row = mysqli_fetch_array($q)){
                $id = $row['id'];
                $title = $row['title'];
                $desc = $row['discription'];
                //$keywords = ['keywords'];
                $link = $row['link'];

                $output .= '<a href="' . $link . '">
                            <h3>' . $title . '</h3>
                                <p>' . $desc . '</p>
                            </a>';
            }
        }
    } else {
        header("location: ./");
    }
    print("$output");
    mysqli_close($conn);

?>
