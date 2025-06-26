<?php

namespace Src\admin\instrument\infrastructure\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Instrument as ModelsInstrument;
use Src\admin\instrument\application\DeleteInstrumentCaseUse;
use Src\admin\instrument\application\GetAllInstrumentUseCase;
use Src\admin\instrument\application\GetByIdInstrumentCaseUse;
use Src\admin\instrument\application\SaveInstrumentCaseUse;
use Src\admin\instrument\domain\entities\Instrument;
use Src\admin\instrument\infrastructure\repositories\EloquentInstrumentRepository;
use Src\admin\instrument\infrastructure\validators\CreateInstrumentRequest;

final class InstrumentController extends Controller
{

    public function __construct(private EloquentInstrumentRepository $instrumentRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getAllUseCase = new GetAllInstrumentUseCase($this->instrumentRepository);
        $instruments = $getAllUseCase->execute();

        return view('admin.instruments.index', [
            'instruments' => $instruments,
            'routePrefix' => 'instrument',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fields = [
            'name' => 'text',
        ];

        return view('admin.instruments.form', [
            'instrument' => new ModelsInstrument(),
            'fields' => $fields,
            'isEdit' => false,
            'routePrefix' => 'instrument'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateInstrumentRequest $request)
    {
        $saveCaseUse = new SaveInstrumentCaseUse($this->instrumentRepository);
        $saveCaseUse->execute(
            new Instrument(
                null,
                $request->name
            )
        );

        return redirect()->route('instrument.index')->with('success', 'Instrument created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fields = [
            'name' => 'text',
        ];

        $useCase = new GetByIdInstrumentCaseUse($this->instrumentRepository);
        $instrument = $useCase->execute($id);

        return view('admin.instruments.form', [
            'instrument' => $instrument,
            'fields' => $fields,
            'isEdit' => true,
            'routePrefix' => 'instrument'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateInstrumentRequest $request, string $id)
    {
        $useCase = new SaveInstrumentCaseUse($this->instrumentRepository);
        $useCase->execute(
            new Instrument(
                $id,
                $request->name
            )
        );

        return redirect()->route('instrument.index')->with('success', 'Instrument updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $useCase = new DeleteInstrumentCaseUse($this->instrumentRepository);
        $useCase->execute($id);
        
        return redirect()->route('instrument.index')->with('success', 'Instrument deleted successfully.');
    }
}
