<?php
class Jobeet
{
  static public function slugify($text)
  {
    // replace non letter or digits by -
    $text = preg_replace('#[^\\pL\d]+#u', '-', $text);

    // trim
    $text = trim($text, '-');

    $text = str_replace(
      explode(' ', preg_replace('/ +/', ' ', 'č ć ž š đ  Č Ć Ž Š Đ  à á â ã ä ç è é ê ë ì í î ï ñ ò ó ô õ ö ù ú û ü ý ÿ À Á Â Ã Ä Ç È É Ê Ë Ì Í Î Ï Ñ Ò Ó Ô Õ Ö Ù Ú Û Ü Ý')),
      explode(' ', preg_replace('/ +/', ' ', 'c c z s dj C C Z S DJ a a a a a c e e e e i i i i n o o o o o u u u u y y A A A A A C E E E E I I I I N O O O O O U U U U Y')),
      $text);
    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('#[^-\w]+#', '', $text);

    if (empty($text)) {
      return 'n-a';
    }

    return $text;
  }
}
