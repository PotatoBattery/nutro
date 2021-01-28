<?php
    include 'db.php';
    /** @var  $db_link */
    $query = mysqli_query($db_link, "SELECT `count_of_meditation`, `time_of_meditation`, `day` FROM statistic_of_meditaion");
    if( mysqli_num_rows($query) > 0 ){
        $data = array();
        while($row = mysqli_fetch_assoc($query)){
            $tmp = explode('.', $row['time_of_meditation']);
            $data['z'] = $row['count_of_meditation'];
            $data['y'] = $tmp[0];
            $data['x'] = $row['day'];

            $output[] = $data;
        }
        die(json_encode($output));
    }