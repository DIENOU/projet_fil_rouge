<?php

namespace App\Http\Controllers;

use App\DataTables\InventaireLigneDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInventaireLigneRequest;
use App\Http\Requests\UpdateInventaireLigneRequest;
use App\Repositories\InventaireLigneRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\InventaireLigne;
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
     * @param InventaireLigneDataTable $inventaireLigneDataTable
     *
     * @return Response
     */
    public function index(InventaireLigneDataTable $inventaireLigneDataTable)
    {
        return $inventaireLigneDataTable->render('inventaire_lignes.index');
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
         // Ajouter l'utilisateur qui a créé l'inventaireligne
     $input['cree_par'] = Auth()->id();
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
// Enregistrer la personne qui a modifié l'inventaireligne
          $input = $request->all();
         $input['modifie_par'] = Auth()->id();
        $inventaireLigne = $this->inventaireLigneRepository->update($input, $id);

        Flash::success('Inventaire Ligne updated successfully.');

        return redirect(route('inventaireLignes.index'));
    }

    /**
     * Remove the specified InventaireLigne from storage.
     *
     * @param int $id
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
