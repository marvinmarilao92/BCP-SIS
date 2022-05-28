<?php

/**
 * QR_BarCode - Barcode QR Code Image Generator
 * 
 * 
 */
class QRBarCode
{

  /* Google Chart API URL */
  private $googleChartAPI = 'https://chart.apis.google.com/chart';
  /* Code data */
  private $codeData;

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function url($url)
  {
    $this->codeData = preg_match("#^https?\:\/\/#", $url) ? $url : "http://{$url}";
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function text($text)
  {
    $this->codeData = $text;
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function qrCode($size, $filename = null)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->googleChartAPI);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "chs={$size}x{$size}&cht=qr&chl=" . urlencode($this->codeData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $img = curl_exec($ch);
    curl_close($ch);

    if ($img) {
      if ($filename) {
        if (!preg_match("#\.png$#i", $filename)) {
          $newfile = $filename .= ".png"; //Andres-Reniel-2022-05-29:3:36AM.png
          $target_dir = "QRcode/";
          $target_file = $target_dir . $newfile;
          return file_put_contents($target_file, $img);
        }
      } else {
        header("Content-type: image/png");
        print $img;
        return true;
      }
    }
    return false;
  }
}