<?php

namespace App\MoonShine\Controllers;

use Illuminate\Support\Facades\Storage;
use MoonShine\Laravel\Http\Controllers\MoonShineController;
use MoonShine\Laravel\MoonShineRequest;
use Symfony\Component\HttpFoundation\Response;

class MoonshineCatalogController extends MoonShineController
{

    public function __invoke(MoonShineRequest $request): Response
    {
        $data = $request->all();
        Storage::disk('config')->put("moonshine/catalog.php", "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();
    }
}
