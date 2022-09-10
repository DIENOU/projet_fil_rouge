<?php

namespace App\Http\Controllers;

use App\DataTables\BonLivraisonDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBonLivraisonRequest;
use App\Http\Requests\UpdateBonLivraisonRequest;
use App\Repositories\BonLivraisonRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Bonlivraison;

class BonLivraisonController extends AppBaseController
{
    /** @var BonLivraisonRepository $bonLivraisonRepository*/
    private $bonLivraisonRepository;

    public function __construct(BonLivraisonRepository $bonLivraisonRepo)
    {
        $this->bonLivraisonRepository = $bonLivraisonRepo;
    }

    /**
     * Display a listing of the BonLivraison.
     *
     * @param BonLivraisonDataTable $bonLivraisonDataTable
     *
     * @return Response
     */
    public function index(BonLivraisonDataTable $bonLivraisonDataTable)
    {
        return $bonLivraisonDataTable->render('bon_livraisons.index');
    }

    /**
     * Show the form for creating a new BonLivraison.
     *
     * @return Response
     */
    public function create()
    {
        return view('bon_livraisons.create');
    }

    /**
     * Store a newly created BonLivraison in storage.
     *
     * @param CreateBonLivraisonRequest $request
     *
     * @return Response
     */
    public function store(CreateBonLivraisonRequest $request)
    {
        $input = $request->all();
        // Ajouter l'utilisateur qui a créé le bonlivraison
        $input['cree_par'] = Auth()->id();

        $bonLivraison = $this->bonLivraisonRepository->create($input);

        Flash::success('Bon Livraison saved successfully.');

        return redirect(route('bonLivraisons.index'));
    }

    /**
     * Display the specified BonLivraison.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bonLivraison = $this->bonLivraisonRepository->find($id);

        if (empty($bonLivraison)) {
            Flash::error('Bon Livraison not found');

            return redirect(route('bonLivraisons.index'));
        }

        return view('bon_livraisons.show')->with('bonLivraison', $bonLivraison);
    }

    /**
     * Show the form for editing the specified BonLivraison.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bonLivraison = $this->bonLivraisonRepository->find($id);

        if (empty($bonLivraison)) {
            Flash::error('Bon Livraison not found');

            return redirect(route('bonLivraisons.index'));
        }

        return view('bon_livraisons.edit')->with('bonLivraison', $bonLivraison);
    }

    /**
     * Update the specified BonLivraison in storage.
     *
     * @param int $id
     * @param UpdateBonLivraisonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBonLivraisonRequest $request)
    {
        $bonLivraison = $this->bonLivraisonRepository->find($id);

        if (empty($bonLivraison)) {
            Flash::error('Bon Livraison not found');

            return redirect(route('bonLivraisons.index'));
        }
        // Enregistrer la personne qui a modifié le bonlivraison
        $input = $request->all();
        $input['modifie_par'] = Auth()->id();
        $bonLivraison = $this->bonLivraisonRepository->update($input, $id);

        Flash::success('Bon Livraison updated successfully.');

        return redirect(route('bonLivraisons.index'));
    }

    /**
     * Remove the specified BonLivraison from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bonLivraison = $this->bonLivraisonRepository->find($id);

        if (empty($bonLivraison)) {
            Flash::error('Bon Livraison not found');

            return redirect(route('bonLivraisons.index'));
        }

        $this->bonLivraisonRepository->delete($id);

        Flash::success('Bon Livraison deleted successfully.');

        return redirect(route('bonLivraisons.index'));
    }
}
