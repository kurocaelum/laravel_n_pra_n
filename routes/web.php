<?php

use Illuminate\Support\Facades\Route;

use App\Models\Projeto;
use App\Models\Desenvolvedor;
use App\Models\Alocacao;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dev-pj', function () {
    $desenvolvedores = Desenvolvedor::with('projetos')->get();
    // return $desenvolvedores->toJson();

    foreach ($desenvolvedores as $d) {
        echo "<p>Desenvolvedor: " . $d->nome . "</p>";
        echo "<p>Cargo: " . $d->campo . "</p>";

        if(count($d->projetos)>0) {
            echo "Projetos: <br>";
            
            echo "<ul>";
            foreach($d->projetos as $p) {
                echo "<li>";
                echo "Nome: " . $p->nome . " | ";
                echo $p->estimativa_horas . "h estimadas | ";
                echo $p->pivot->horas_semanais . "h semanais";
                echo "</li>";
            }
            echo "</ul>";
        }

        echo "<hr>";
    }
});

Route::get('/pj-dev', function () {
    $projetos = Projeto::with('desenvolvedores')->get();
    // return $projetos->toJson();

    foreach($projetos as $p) {
        echo "<p>Projeto: " . $p->nome . "</p>";
        echo "<p>Horas estimadas: " . $p->estimativa_horas . "</p>";

        if(count($p->desenvolvedores)>0) {
            echo "Desenvolvedores: <br>";

            echo "<ul>";
            foreach($p->desenvolvedores as $dev) {
                echo "<li>";
                echo "Nome: " . $dev->nome . " | ";
                echo "Cargo: " . $dev->campo . " | ";
                echo $dev->pivot->horas_semanais . "h semanais";
                echo "</li>";
            }
            echo "</ul>";
        }
        
        echo "<hr>";
    }

});

Route::get('/alocar', function () {
    $proj = Projeto::find(4);
    
    if(isset($proj)){
        // $proj->desenvolvedores()->attach(1, ['horas_semanais'=>50]);
        
        $proj->desenvolvedores()->attach([
            2 => ['horas_semanais'=>20],
            3 => ['horas_semanais'=>30]
        ]);
    }
});

Route::get('/desalocar', function () {
    $proj = Projeto::find(4);
    if(isset($proj)) {
        $proj->desenvolvedores()->detach([1,2,3]);
    }
});