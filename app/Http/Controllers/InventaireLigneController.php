<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInventaireLigneRequest;
use App\Http\Requests\UpdateInventaireLigneRequest;
use App\Repositories\InventaireLigneRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class InventaireLigneController extends AppBaseController
{
    /** @var InventaireLigneRepository $inventaireLigneRepository*/
    private $inventaireLigneRepository;

    public function __construct(InventaireLigneRepository $inventaireLigneRepo)
    {
        $this->inventaireLigneRepository = $inventaireLigneRepo;
    }

    /**
     * Display a listing of the InventaireLigne.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $inventaireLignes = $this->inventaireLigneRepository->all();

        return view('inventaire_lignes.index')
            ->with('inventaireLignes', $inventaireLignes);
    }

    /**
     * Show the form for creating a new InventaireLigne.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventaire_lignes.create');
    }

    /**
     * Store a newly created InventaireLigne in storage.
     *
     * @param CreateInventaireLigneRequest $request
     *
     * @return Response
     */
    public function store(CreateInventaireLigneRequest $request)
    {
        $input = $request->all();

        $inventaireLigne = $this->inventaireLigneRepository->create($input);

        Flash::success('Inventaire Ligne saved successfully.');

        return redirect(route('inventaireLignes.index'));
    }

    /**
     * Display the specified InventaireLigne.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inventaireLigne = $this->inventaireLigneRepository->find($id);

        if (empty($inventaireLigne)) {
            Flash::error('Inventaire Ligne not found');

            return redirect(route('inventaireLignes.index'));
        }

        return view('inventaire_lignes.show')->with('inventaireLigne', $inventaireLigne);
    }

    /**
     * Show the form for editing the specified InventaireLigne.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inventaireLigne = $this->inventaireLigneRepository->find($id);

        if (empty($inventaireLigne)) {
            Flash::error('Inventaire Ligne not found');

            return redirect(route('inventaireLignes.index'));
        }

        return view('inventaire_lignes.edit')->with('inventaireLigne', $inventaireLigne);
    }

    /**
     * Update the specified InventaireLigne in storage.
     *
     * @param int $id
     * @param UpdateInventaireLigneRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInventaireLigneRequest $request)
    {
        $inventaireLigne = $this->inventaireLigneRepository->find($id);

        if (empty($inventaireLigne)) {
            Flash::error('Inventaire Ligne not found');

            return redirect(route('inventaireLignes.index'));
        }

        $inventaireLigne = $this->inventaireLigneRepository->update($request->all(), $id);

        Flash::success('Inventaire Ligne updated successfully.');

        return redirect(route('inventaireLignes.index'));
    }

    /**
     * Remove the specified InventaireLigne from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inventaireLigne = $this->inventaireLigneRepository->find($id);

        if (empty($inventaireLigne)) {
            Flash::error('Inventaire Ligne not found');

            return redirect(route('inventaireLignes.index'));
        }

        $this->inventaireLigneRepository->delete($id);

        Flash::success('Inventaire Ligne deleted successfully.');

        return redirect(route('inventaireLignes.index'));
    }
}
