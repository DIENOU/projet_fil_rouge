<?php

namespace App\Http\Controllers;

use App\DataTables\FournisseurDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFournisseurRequest;
use App\Http\Requests\UpdateFournisseurRequest;
use App\Repositories\FournisseurRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Fournisseur;

class FournisseurController extends AppBaseController
{
    /** @var FournisseurRepository $fournisseurRepository*/
    private $fournisseurRepository;

    public function __construct(FournisseurRepository $fournisseurRepo)
    {
        $this->fournisseurRepository = $fournisseurRepo;
    }

    /**
     * Display a listing of the Fournisseur.
     *
     * @param FournisseurDataTable $fournisseurDataTable
     *
     * @return Response
     */
    public function index(FournisseurDataTable $fournisseurDataTable)
    {
        return $fournisseurDataTable->render('fournisseurs.index');
    }

    /**
     * Show the form for creating a new Fournisseur.
     *
     * @return Response
     */
    public function create()
    {
        return view('fournisseurs.create');
    }

    /**
     * Store a newly created Fournisseur in storage.
     *
     * @param CreateFournisseurRequest $request
     *
     * @return Response
     * 
     */
    
    public function store(CreateFournisseurRequest $request)
    {
        $input = $request->all();

        // Ajouter l'utilisateur qui a créé le fournisseur
        $input['cree_par'] = Auth()->id();

        $fournisseur = $this->fournisseurRepository->create($input);

        Flash::success('Fournisseur saved successfully.');

        return redirect(route('fournisseurs.index'));
    }

    /**
     * Display the specified Fournisseur.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fournisseur = $this->fournisseurRepository->find($id);

        if (empty($fournisseur)) {
            Flash::error('Fournisseur not found');

            return redirect(route('fournisseurs.index'));
        }

        return view('fournisseurs.show')->with('fournisseur', $fournisseur);
    }

    /**
     * Show the form for editing the specified Fournisseur.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fournisseur = $this->fournisseurRepository->find($id);

        if (empty($fournisseur)) {
            Flash::error('Fournisseur not found');

            return redirect(route('fournisseurs.index'));
        }

        return view('fournisseurs.edit')->with('fournisseur', $fournisseur);
    }

    /**
     * Update the specified Fournisseur in storage.
     *
     * @param int $id
     * @param UpdateFournisseurRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFournisseurRequest $request)
    {
        $fournisseur = $this->fournisseurRepository->find($id);

        if (empty($fournisseur)) {
            Flash::error('Fournisseur not found');

            return redirect(route('fournisseurs.index'));
        }
           // Enregistrer la personne qui a modifié le  fournisseur
           $input = $request->all();
           $input['modifie_par'] = Auth()->id();
   

        $fournisseur = $this->fournisseurRepository->update($input, $id);

        Flash::success('Fournisseur updated successfully.');

        return redirect(route('fournisseurs.index'));
    }

    /**
     * Remove the specified Fournisseur from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fournisseur = $this->fournisseurRepository->find($id);

        if (empty($fournisseur)) {
            Flash::error('Fournisseur not found');

            return redirect(route('fournisseurs.index'));
        }

        $this->fournisseurRepository->delete($id);

        Flash::success('Fournisseur deleted successfully.');

        return redirect(route('fournisseurs.index'));
    }
}
