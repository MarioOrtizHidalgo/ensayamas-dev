<?php

namespace Src\admin\band\infrastructure\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Src\admin\band\application\SaveBandCaseUse;
use Src\admin\band\domain\entities\Band;
use Src\admin\Band\infrastructure\repositories\EloquentBandRepository;
use Src\admin\band\infrastructure\validators\CreateBandRequest;

final class BandController extends Controller
{

    public function __construct(private EloquentBandRepository $bandRepository) {}

    public function index() {}

    public function create()
    {
        if (Auth::user()->band_id) {
            return redirect()->route('dashboard');
        }

        return view('auth.register-band');
    }

    public function store(CreateBandRequest $request)
    {
        $bandEntity = new Band(
            null,
            $request->name,
            $request->location,
            Str::upper($request->inviteCode)
        );

        $useCase = new SaveBandCaseUse($this->bandRepository);
        $band = $useCase->execute($bandEntity);

        $user = Auth::user();
        $user->update([
            'band_id' => $band->getId(),
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Banda creada correctamente.');
    }

}