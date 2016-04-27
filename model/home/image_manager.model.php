<?php


class HomeImageManagerModel extends Model{


    public function AddImage($name){

        // Codi d'adició de la imatge:
        $image = $_FILES["inputFile"]["name"];
        $filetmp = $_FILES["$name"]["tmp_name"];
        $img_path = '../htdocs/img/profile_img/'.$image;
        move_uploaded_file($filetmp,$img_path);

    }

    public function ResizeImage($path) {

        $x = getimagesize($path);
        $width  = $x['0'];
        $height = $x['1'];

        $rs_width  = 200;	//resize to half of the original width.
        $rs_height = 200;	//resize to half of the original height.

        switch ($x['mime']) {
            case "image/gif":
                $img = imagecreatefromgif($path);
                break;
            case "image/jpeg":
                $img = imagecreatefromjpeg($path);
                break;
            case "image/png":
                $img = imagecreatefrompng($path);
                break;
        }

        $img_base = imagecreatetruecolor($rs_width, $rs_height);

        imagecopyresized($img_base, $img, 0, 0, 0, 0, $rs_width, $rs_height, $width, $height);

        $path_info = pathinfo($path);

        switch ($path_info['extension']) {
            case "gif":
                imagegif($img_base, $path);
                break;
            case "jpg":
                imagejpeg($img_base, $path);
                break;
            case "png":
                imagepng($img_base, $path);
                break;
        }

    }

}