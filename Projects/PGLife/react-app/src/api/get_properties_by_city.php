<?php
    //starting session
    session_start();
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');
    //connecting database
    require "../includes/database_connect.php";

    //storing userid from session,if it has
    $user_id= isset($_SESSION['user_id'])?$_SESSION['user_id']:null;
    //storing city searched on home search
    $city_name = $_GET["city"];

    // query to retrive all the properties data located in the $city_name
    $sql = " SELECT * FROM cities WHERE name = '$city_name'";  
    
    // retriving and storing data
    $result = mysqli_query($conn,$sql);

    if (!$result) {
        echo "something went wrong ". mysqli_query();
    }
    $city = mysqli_fetch_assoc($result);
    if (!$city) {
        echo "Sorry! We do not have any PG listed in this city.";
        return;
    }
    $city_id=$city['id'];    
    //query to retrieve detail of properties in city_id
    $sql_1="SELECT * from properties where city_id = $city_id";
    $result_1=mysqli_query($conn,$sql_1);
    if (!$result_1) {
        echo "somthing went wrong";
    }
    //fetching all the rows and storing in $properties as an associative array
    $properties = mysqli_fetch_all($result_1,MYSQLI_ASSOC);
    
    //query to fetch interested users in properties
    $sql_2="SELECT * from interested_users_properties iup 
            INNER JOIN properties p on iup.property_id = p.id
            where p.city_id = $city_id ";
    $result_2 = mysqli_query($conn,$sql_2);
    if (!$result_2) {
        echo "something went wrong";
    }
    $interested_users_properties = mysqli_fetch_all($result_2,MYSQLI_ASSOC);

    $new_properties = array();
    foreach ($properties as $property) {
        $property_images = glob("img/properties/" . $property['id'] . "/*"); // selecting array of images
        $property_image = "img/properties/" . $property['id'] . "/" . basename($property_images[0]); // selecting a perticular image from an array of images

        $interested_users_count = 0;
        $is_interested = false;
        foreach ($interested_users_properties as $interested_user_property) {
            if ($interested_user_property['property_id'] == $property['id']) {
                $interested_users_count++;

                if ($interested_user_property['user_id'] == $user_id) {
                    $is_interested = true;
                }
            }
        }
        $property['image'] = $property_image;
        $property['is_interested'] = $is_interested;
        $property['interested_users_count'] = $interested_users_count;
        $new_properties[] = $property;
    }
    echo json_encode($new_properties);
?>
