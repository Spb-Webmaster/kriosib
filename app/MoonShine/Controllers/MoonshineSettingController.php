<?php

declare(strict_types=1);

namespace App\MoonShine\Controllers;

use Illuminate\Support\Facades\Storage;
use MoonShine\Laravel\MoonShineRequest;
use MoonShine\Laravel\Http\Controllers\MoonShineController;
use Symfony\Component\HttpFoundation\Response;

final class MoonshineSettingController extends MoonShineController
{
    public function __invoke(MoonShineRequest $request): Response
    {
        $data = $request->all();
        Storage::disk('config')->put("moonshine/setting.php", "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();
    }
}
