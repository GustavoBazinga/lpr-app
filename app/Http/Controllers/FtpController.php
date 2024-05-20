<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class FtpController extends Controller
{

    public static function ftpTest()
    {
        try {
            $contents = Storage::disk('ftp')->allFiles('/'); // Lista o conteúdo do diretório raiz
            return($contents); // Retorna o conteúdo do diretório
        } catch (\Exception $e) {
            return false; // Falha na conexão
        }
    }

    public static function getImage($imageName)
    {
        try {
            $stream = Storage::disk('ftp')->getDriver()->readStream($imageName);
            $tempPath = $imageName; // Caminho temporário
            Storage::disk('local')->put("public/" . $tempPath, stream_get_contents($stream)); // Salva localmente
            
            return $tempPath; // Retorna o caminho temporário
        } catch (\Exception $e) {
            return false; // Falha na conexão
        }

    }
}
