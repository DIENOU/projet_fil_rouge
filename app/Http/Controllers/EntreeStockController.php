<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\Models\Produit;
use App\Models\EntreeStock;
use App\DataTables\EntreeStockDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EntreeStockRepository;
use App\Http\Requests\CreateEntreeStockRequest;
use App\Http\Requests\UpdateEntreeStockRequest;
use App\Models\Fournisseur;

class EntreeStockController extends AppBaseController
{
    /** @var EntreeStockRepository $entreeStockRepository*/
    private $entreeStockRepository;

    public function __construct(EntreeStockRepository $entreeStockRepo)
    {
        $this->entreeStockRepository = $entreeStockRepo;
    }

    /**
     * Display a listing of the EntreeStock.
     *
     * @param EntreeStockDataTable $entreeStockDataTable
     *
     * @return Response
     */
    public function index(EntreeStockDataTable $entreeStockDataTable)
    {
        return $entreeStockDataTable->render('entree_stocks.index');
    }

    /**
     * Show the form for creating a new EntreeStock.
     *
     * @return Response
     */
    public function create()
    {
        $produits = Produit::select('id', 'code_produit', 'designation', 'quantite')->get();
        $fournisseurs = Fournisseur::all();

        return view('entree_stocks.create', compact('produits', 'fournisseurs'));
    }

    /**
     * Store a newly created EntreeStock in storage.
     *
     * @param CreateEntreeStockRequest $request
     *
     * @return Response
     */
    public function store(CreateEntreeStockRequest $request)
    {
        $input = $request->all();
        // Ajouter l'utilisateur qui a créé l'entreestock
        $input['cree_par'] = Auth()->id();

        $entreeStock = $this->entreeStockRepository->create($input);

        $produit = Produit::findOrFail($entreeStock->produit_id);
        $produit->quantite = $produit->quantite + $entreeStock->quantite;
        $produit->save();

        Flash::success('Entree Stock saved successfully.');

        return redirect(route('entreeStocks.index'));
    }

    /**
     * Display the specified EntreeStock.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $entreeStock = $this->entreeStockRepository->find($id);

        if (empty($entreeStock)) {
            Flash::error('Entree Stock not found');

            return redirect(route('entreeStocks.index'));
        }

        return view('entree_stocks.show')->with('entreeStock', $entreeStock);
    }

    /**
     * Show the form for editing the specified EntreeStock.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $entreeStock = $this->entreeStockRepository->find($id);

        if (empty($entreeStock)) {
            Flash::error('Entree Stock not found');

            return redirect(route('entreeStocks.index'));
        }

        $produits = Produit::select('id', 'code_produit', 'designation', 'quantite')->get();
        $fournisseurs = Fournisseur::all();

        return view('entree_stocks.edit')
            ->with('entreeStock', $entreeStock)
            ->with('produits', $produits)
            ->with('fournisseurs', $fournisseurs);
    }

    /**
     * Update the specified EntreeStock in storage.
     *
     * @param int $id
     * @param UpdateEntreeStockRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEntreeStockRequest $request)
    {
        $entreeStock = $this->entreeStockRepository->find($id);

        $quantiteAncien = $entreeStock->quantite;
        $produitAncien = Produit::findOrFail($entreeStock->produit_id);

        if (empty($entreeStock)) {
            Flash::error('Entree Stock not found');

            return redirect(route('entreeStocks.index'));
        }
        // Enregistrer la personne qui a modifié l'entreesttock
        $input = $request->all();
        $input['modifie_par'] = Auth()->id();

        $produitNouveau = Produit::findOrFail($input['produit_id']);

        $entreeStock = $this->entreeStockRepository->update($input, $id);

        // Gestion des quantités du produit
        $produitAncien->quantite  = $produitAncien->quantite - $quantiteAncien;
        $produitAncien->save();
        $produitNouveau->quantite  = $produitNouveau->quantite + $entreeStock->quantite;
        $produitNouveau->save();

        Flash::success('Entree Stock updated successfully.');

        return redirect(route('entreeStocks.index'));
    }

    /**
     * Remove the specified EntreeStock from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $entreeStock = $this->entreeStockRepository->find($id);

        if (empty($entreeStock)) {
            Flash::error('Entree Stock not found');

            return redirect(route('entreeStocks.index'));
        }

        $this->entreeStockRepository->delete($id);

        Flash::success('Entree Stock deleted successfully.');

        return redirect(route('entreeStocks.index'));
    }
}
