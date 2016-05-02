<?php


class HomeImageManagerModel extends Model{


    public function AddProfileImage($name){

        // Codi d'adició de la imatge:
        $image = $_FILES["$name"]["name"];
        $filetmp = $_FILES["$name"]["tmp_name"];
        $img_path = '../htdocs/img/profile_img/'.$image;
        move_uploaded_file($filetmp,$img_path);

        $this->ResizeImg($img_path, 200, 200);

    }

    public function AddProductImages($name){

        // Codi d'adició de la imatge:
        $image = $_FILES["$name"]["name"];
        $filetmp = $_FILES["$name"]["tmp_name"];
        $img_path_big = '../htdocs/img/product_img_big/'.$image;
        move_uploaded_file($filetmp,$img_path_big);

        $this->ResizeImg($img_path_big, 400, 300);

        // Codi de copia i adició de la imatge:
        $img_path_small = '../htdocs/img/product_img_tiny/'.$image;
        copy($img_path_big, $img_path_small);

        $this->ResizeImg($img_path_small, 100, 100);

    }

    private function ResizeImg($path, $rs_width, $rs_height) {

        $x = getimagesize($path);
        $width  = $x['0'];
        $height = $x['1'];

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