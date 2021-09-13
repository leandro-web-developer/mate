<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public static function elPais()
    {
        // EL PAIS -----------
        header('content-type:text/plain');
        $url = 'https://www.elpais.com.uy';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $html = curl_exec($ch);
        $html = preg_replace('!\n!', '', $html);
        curl_close($ch);

        // BUSCO ARTICULOS -----
        if (preg_match_all('!<article[^>]*>(.*?)</article>!iu', $html, $m)) {
            $arr_elpais = [];
            for ($i = 0; $i < count($m[0]); $i++) {
                // EN CADA ARTICULO BUSCO URL Y TITULO -----
                if (preg_match('!<h2 class="title">\s*<a [^>]*href="([^"]+)"[^>]*>([^<]+)</a>!iu', $m[0][$i], $h) || preg_match('!<h1 class="title">\s*<a [^>]*href="([^"]+)"[^>]*>([^<]+)</a>!iu', $m[0][$i], $h)) {
                    $uri = $url . $h[1];
                    // SOLO AGREGO AL ARRAY GENERAL SI NO EXISTE YA EN EL MISMO -----
                    if (!array_search($uri, array_column($arr_elpais, 'u'))) {
                        $x = [];
                        $x['u'] = $uri;
                        $x['t'] = $h[2];

                        // SI ENCONTRE LO DEMAS ENTONCES BUSCO LA IMAGEN -----
                        if (preg_match('!<img[^>]*src="([^"]+)"!iu', $m[0][$i], $img)) {
                            $x['i'] = $img[1];
                        }
                        $arr_elpais[] = $x;
                    }
                }
            }

            if (count($arr_elpais) > 0) {
                $elpais = "<H1 class='py-4' id='noticas-el-pais'>NOTICIAS DE DIARIO EL PAÍS</H1>";
                $elpais .= "<div class='row'>";
                $elpais .= "  <div class='col-12 py-2'>";
                $elpais .= "      <div class='row'>";
                foreach ($arr_elpais as $i) {
                    if (array_key_exists('u', $i)) {
                        $elpais .= "       <div class='col-6 col-sm-4 col-md-3 py-2'>";
                        $elpais .= "          <div class='card-sl noticia'>";
                        $elpais .= "              <div class='card-image'>";
                        if (array_key_exists('i', $i)) {
                            $elpais .= "              <img src='{$i['i']}' alt='{$i['t']}' />";
                        } else {
                            $elpais .= "              <img src='" . asset('img/no-image.svg') . "' alt='Mate.uy - Sin foto' />";
                        }
                        $elpais .= '              </div>';
                        $elpais .= "              <div class='card-text'>{$i['t']}</div>";
                        $elpais .= "              <a href='{$i['u']}' class='card-button'>Ver en El País</a>";
                        $elpais .= '          </div>';
                        $elpais .= '       </div>';
                    }
                }
                $elpais .= '      </div>';
                $elpais .= '  </div>';
                $elpais .= '</div>';


                $ourFileName = "/var/www/lea/mate/resources/views/diarios/elpais.blade.php";
                $ourFileHandle = fopen($ourFileName, 'w');

                fwrite($ourFileHandle, $elpais);

                fclose($ourFileHandle);
            }
        }
    }


    public static function elObservador()
    {
        // EL OBSERVADOR -----------
        header('content-type:text/plain');
        $url = 'https://www.elobservador.com.uy';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $html = curl_exec($ch);
        $html = preg_replace('!\n!', '', $html);
        curl_close($ch);

        // BUSCO ARTICULOS -----
        if (preg_match_all('!<article[^>]*>(.*?)</article>!iu', $html, $m)) {
            $arr_elpais = [];
            for ($i = 0; $i < count($m[0]); $i++) {
                // EN CADA ARTICULO BUSCO URL Y TITULO -----
                if (preg_match('!<div class="\s*linea[^>]>\s*<a href="([^"]+)">\s*<div class="imagen.*?">\s*<figure class="figure">.*?<img .*?data-src="([^"]+)".*?</a>.*?<h3 class="volanta .*?">.*?title="([^"]+)">.*?</a>\s*</h3>\s*<h2.*?>.*?>([^<]+)</a>>!iu', $m[0][$i], $h)) {
                    return $h;
                    // $uri = $url . $h[1];
                    // // SOLO AGREGO AL ARRAY GENERAL SI NO EXISTE YA EN EL MISMO -----
                    // if (!array_search($uri, array_column($arr_elpais, 'u'))) {
                    //     $x = [];
                    //     $x['u'] = $uri;
                    //     $x['t'] = $h[2];

                    //     // SI ENCONTRE LO DEMAS ENTONCES BUSCO LA IMAGEN -----
                    //     if (preg_match('!<img[^>]*src="([^"]+)"!iu', $m[0][$i], $img)) {
                    //         $x['i'] = $img[1];
                    //     }
                    //     $arr_elpais[] = $x;
                    // }
                }
            }

            // if (count($arr_elpais) > 0) {
            //     $elpais = "<H1 class='py-4' id='noticas-el-pais'>NOTICIAS DE DIARIO EL PAÍS</H1>";
            //     $elpais .= "<div class='row'>";
            //     $elpais .= "  <div class='col-12 py-2'>";
            //     $elpais .= "      <div class='row'>";
            //     foreach ($arr_elpais as $i) {
            //         if (array_key_exists('u', $i)) {
            //             $elpais .= "       <div class='col-6 col-sm-4 col-md-3 py-2'>";
            //             $elpais .= "          <div class='card-sl noticia'>";
            //             $elpais .= "              <div class='card-image'>";
            //             if (array_key_exists('i', $i)) {
            //                 $elpais .= "              <img src='{$i['i']}' alt='{$i['t']}' />";
            //             } else {
            //                 $elpais .= "              <img src='" . asset('img/no-image.svg') . "' alt='Mate.uy - Sin foto' />";
            //             }
            //             $elpais .= '              </div>';
            //             $elpais .= "              <div class='card-text'>{$i['t']}</div>";
            //             $elpais .= "              <a href='{$i['u']}' class='card-button'>Ver en El País</a>";
            //             $elpais .= '          </div>';
            //             $elpais .= '       </div>';
            //         }
            //     }
            //     $elpais .= '      </div>';
            //     $elpais .= '  </div>';
            //     $elpais .= '</div>';


            //     $ourFileName = "/var/www/lea/mate/resources/views/diarios/elpais.blade.php";
            //     $ourFileHandle = fopen($ourFileName, 'w');

            //     fwrite($ourFileHandle, $elpais);

                // fclose($ourFileHandle);
            // }
        }
    }
}
