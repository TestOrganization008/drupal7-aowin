<?php

class es_image {//类定义开始

    /**
      +----------------------------------------------------------
     * 生成图像验证码
      +----------------------------------------------------------
     * @static
     * @access public
      +----------------------------------------------------------
     * @param string $length  位数
     * @param string $mode  类型
     * @param string $type 图像格式
     * @param string $width  宽度
     * @param string $height  高度
      +----------------------------------------------------------
     * @return string
      +----------------------------------------------------------
     */

    static function buildImageVerify($length = 4, $mode = 1, $type = 'gif', $width = 48, $height = 22) {
        require_once drupal_get_path('module', 'aowin_admin') . "/utils/es_string.php";
        $randval = es_string::rand_string($length, $mode);
        $_SESSION['verify'] = md5($randval);
        $width = ($length * 10 + 10) > $width ? $length * 10 + 10 : $width;
        if ($type != 'gif' && function_exists('imagecreatetruecolor')) {
            $im = @imagecreatetruecolor($width, $height);
        } else {
            $im = @imagecreate($width, $height);
        }
        $r = Array(225, 255, 255, 223);
        $g = Array(225, 236, 237, 255);
        $b = Array(225, 236, 166, 125);
        $key = mt_rand(0, 3);

        $backColor = imagecolorallocate($im, $r[$key], $g[$key], $b[$key]);    //背景色（随机）
        $borderColor = imagecolorallocate($im, 100, 100, 100);                    //边框色
        $pointColor = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));                 //点颜色

        @imagefilledrectangle($im, 0, 0, $width - 1, $height - 1, $backColor);
        @imagerectangle($im, 0, 0, $width - 1, $height - 1, $borderColor);
        $stringColor = imagecolorallocate($im, mt_rand(0, 200), mt_rand(0, 120), mt_rand(0, 120));
        // 干扰
        for ($i = 0; $i < 10; $i++) {
            $fontcolor = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
            imagearc($im, mt_rand(-10, $width), mt_rand(-10, $height), mt_rand(30, 300), mt_rand(20, 200), 55, 44, $fontcolor);
        }
        for ($i = 0; $i < 25; $i++) {
            $fontcolor = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
            imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $pointColor);
        }
        for ($i = 0; $i < $length; $i++) {
            imagestring($im, 5, $i * 10 + 5, mt_rand(1, 8), $randval{$i}, $stringColor);
        }
        es_image::output($im, $type);
    }

    static function output($im, $type = 'gif', $filename = '') {
        ob_clean();
        header("Content-type: image/" . $type);
        $ImageFun = 'image' . $type;
        if (empty($filename)) {
            if (!$ImageFun($im)) {
                ob_clean();
                header("Content-type: image/jpeg");
                if (!imagejpeg($im)) {
                    ob_clean();
                    header("Content-type: image/png");
                    if (!imagepng($im)) {
//                        unset($_SEunsetSSION['verify']);
                    }
                }
            }
        } else {
            $ImageFun($im, $filename);
        }
        imagedestroy($im);
    }

}

//类定义结束
?>