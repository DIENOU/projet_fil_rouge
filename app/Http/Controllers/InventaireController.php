<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInventaireRequest;
use App\Http\Requests\UpdateInventaireRequest;
use App\Repositories\InventaireRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class InventaireController extends AppBaseController
{
    /** @var InventaireRepository $inventaireRepository*/
    private $inventaireRepository;

    public function __construct(InventaireRepository $inventaireRepo)
    {
        $this->inventaireRepository = $inventaireRepo;
    }

    /**
     * Display a listing of the Inventaire.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $inventaires = $this->inventaireRepository->all();

        return view('inventaires.index')
            ->with('inventaires', $inventaires);
    }

    /**
     * Show the form for creating a new Inventaire.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventaires.create');
    }

    /**
     * Store a newly created Inventaire in storage.
     *
     * @param CreateInventaireRequest $request
     *
     * @return Response
     */
    public function store(CreateInventaireRequest $request)
    {
        $input = $request->all();

        $inventaire = $this->inventaireRepository->create($input);

        Flash::success('Inventaire saved successfully.');

        return redirect(route('inventaires.index'));
    }

    /**
     * Display the specified Inventaire.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inventaire = $this->inventaireRepository->find($id);

        if (empty($inventaire)) {
            Flash::error('Inventaire not found');

            return redirect(route('inventaires.index'));
        }

        return view('inventaires.show')->with('inventaire', $inventaire);
    }

    /**
     * Show the form for editing the specified Inventaire.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inventaire = $this->inventaireRepository->find($id);

        if (empty($inventaire)) {
            Flash::error('Inventaire not found');

            return redirect(route('inventaires.index'));
        }

        return view('inventaires.edit')->with('inventaire', $inventaire);
    }

    /**
     * Update the specified Inventaire in storage.
     *
     * @param int $id
     * @param UpdateInventaireRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInventaireRequest $request)
    {
        $inventaire = $this->inventaireRepository->find($id);

        if (empty($inventaire)) {
            Flash::error('Inventaire not found');

            return redirect(route('inventaires.index'));
        }

        $inventaire = $this->inventaireRepository->update($request->all(), $id);

        Flash::success('Inventaire updated successfully.');

        return redirect(route('inventaires.index'));
    }

    /**
     * Remove the specified Inventaire from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inventaire = $this->inventaireRepository->find($id);

        if (empty($inventaire)) {
            Flash::error('Inventaire not found');

            return redirect(route('inventaires.index'));
        }

        $this->inventaireRepository->delete($id);

        Flash::success('Inventaire deleted successfully.');

        return redirect(route('inventaires.index'));
    }
}
