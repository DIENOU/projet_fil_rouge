<?php

namespace App\Http\Controllers;

use App\DataTables\InventaireDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInventaireRequest;
use App\Http\Requests\UpdateInventaireRequest;
use App\Repositories\InventaireRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Inventaire;

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
     * @param InventaireDataTable $inventaireDataTable
     *
     * @return Response
     */
    public function index(InventaireDataTable $inventaireDataTable)
    {
        return $inventaireDataTable->render('inventaires.index');
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

        // Ajouter l'utilisateur qui a créé l'inventaire
        $input['cree_par'] = Auth()->id();

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
        // Enregistrer la personne qui a modifié l'inventaire
        $input = $request->all();
        $input['modifie_par'] = Auth()->id();

        $inventaire = $this->inventaireRepository->update($input, $id);

        Flash::success('Inventaire updated successfully.');

        return redirect(route('inventaires.index'));
    }

    /**
     * Remove the specified Inventaire from storage.
     *
     * @param int $id
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
