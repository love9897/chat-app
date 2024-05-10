<?php


function fileupload(){


    $unique_name = '';
    
    if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) {

        $fileName = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];

        $path_info = pathinfo($fileName);

        $extension = strtolower($path_info['extension']);
        $file_name = $path_info['filename'];
        $accepted_extensions = ['jpg', 'jpeg','png','svg'];

        if (in_array($extension, $accepted_extensions)) {
            $unique_name = time() . '.' . $extension;

            $destination = '../assest/upload/' . $unique_name;

            $is_uploaded = move_uploaded_file($tmp_name, $destination);

            if (!$is_uploaded) {

               $_SESSION['error'] = "file not moved";

            } else {

                $_SESSION['success'] = 'file uploaded successfully';

            }

        } else {

            $_SESSION['error'] = "extension doesn't match";

        }
    }

    return $unique_name;
}

?>