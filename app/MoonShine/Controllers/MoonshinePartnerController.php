<?php

declare(strict_types=1);

namespace App\MoonShine\Controllers;

use Illuminate\Support\Facades\Storage;
use MoonShine\Laravel\Http\Controllers\MoonShineController;
use MoonShine\Laravel\MoonShineRequest;
use Symfony\Component\HttpFoundation\Response;

class MoonshinePartnerController extends MoonShineController
{

    public function __invoke(MoonShineRequest $request): Response
    {
        $data = $request->all();
        Storage::disk('config')->put("moonshine/partner.php", "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();
    }
}
