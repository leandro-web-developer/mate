<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    /**
     * 
     */
    public static function elPais()
    {
        // EL PAIS -----------

        $url = 'https://www.elpais.com.uy';
        $html = Self::curl($url);

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
                $elpais = Self::html('EL PAÍS', $arr_elpais, 'noticas-el-pais');
                // $ourFileName = "/var/www/lea/mate/resources/views/diarios/elpais.blade.php";
                $ourFileName = "/workspace/resources/views/diarios/elpais.blade.php";
                $ourFileHandle = fopen($ourFileName, 'w');
                fwrite($ourFileHandle, $elpais);
                fclose($ourFileHandle);
            }
        }
    }

    /**
     * 
     */
    public static function elObservador()
    {
        // EL OBSERVADOR -----------
        $url = 'https://www.elobservador.com.uy';
        $html = Self::curl($url);

        // BUSCO ARTICULOS -----
        if (preg_match_all('!<div class="\s*linea[^>]>\s*<a href="([^"]+)">\s*<div class="imagen.*?">\s*<figure class="figure">.*?<img .*?data-src="([^"]+)".*?</a>.*?<h3 class="volanta .*?">.*?title="([^"]+)">.*?</a>\s*</h3>\s*<h2.*?>.*?>([^<]+)</a>!iu', $html, $m)) {
            $arr_elobservador = [];
            for ($i = 0; $i < count($m[0]); $i++) {
                // EN CADA ARTICULO BUSCO URL Y TITULO -----
                preg_match('!<div class="\s*linea[^>]>\s*<a href="([^"]+)">\s*<div class="imagen.*?">\s*<figure class="figure">.*?<img .*?data-src="([^"]+)".*?</a>.*?<h3 class="volanta .*?">.*?title="([^"]+)">.*?</a>\s*</h3>\s*<h2.*?>.*?>([^<]+)</a>!iu', $m[0][$i], $u);
                $x = [];
                $x['u'] = $url . $u[1];
                $x['i'] = $u[2];
                $x['t'] = $u[3] . ' - ' . $u[4];
                $arr_elobservador[] = $x;
            }

            if (count($arr_elobservador) > 0) {
                $elobservador = Self::html('EL OBSERVADOR', $arr_elobservador, 'noticas-el-observador');
                // $ourFileName = "/var/www/lea/mate/resources/views/diarios/elobservador.blade.php";
                $ourFileName = "/workspace/resources/views/diarios/elobservador.blade.php";
                $ourFileHandle = fopen($ourFileName, 'w');
                fwrite($ourFileHandle, $elobservador);
                fclose($ourFileHandle);
                return 200;
            }else{
                return 401;
            }
        }else{
            return 400;
        }
    }

    // ----------------------------------------------------

    private static function curl($url)
    {
        header('content-type:text/plain');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $html = curl_exec($ch);
        $html = preg_replace('!\n!', '', $html);
        curl_close($ch);
        return $html;
    }

    /**
     * 
     */
    private static function html($nombre, $arr, $ancla)
    {
        $diario = "<H1 class='pb-3' id='{$ancla}'>NOTICIAS DE DIARIO {$nombre}</H1>";
        $diario .= "<div class='row'>";
        $diario .= "  <div class='col-12 py-2'>";
        $diario .= "      <div class='row'>";
        foreach ($arr as $i) {
            if (array_key_exists('u', $i)) {
                $diario .= "       <div class='col-6 col-sm-4 col-md-3 py-2 noticia' data-text='{$i['t']}'>";
                $diario .= "          <div class='card-sl noticia'>";
                $diario .= "              <div class='card-image'>";
                if (array_key_exists('i', $i)) {
                    $diario .= "              <img src='{$i['i']}' alt='{$i['t']}' />";
                } else {
                    $diario .= "              <img src='" . asset('img/no-image.svg') . "' alt='Mate.uy - Sin foto' />";
                }
                $diario .= '              </div>';
                $diario .= "              <div class='card-text'>{$i['t']}</div>";
                $diario .= "              <a href='{$i['u']}' class='card-button'>Ver en El País</a>";
                $diario .= '          </div>';
                $diario .= '       </div>';
            }
        }
        $diario .= '      </div>';
        $diario .= '  </div>';
        $diario .= '</div>';
        return $diario;
    }
}
