<?php

namespace App\Http\Controllers;

use App\DataTables\ProduitDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\Repositories\ProduitRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Produit;
use App\Models\Unite;
use Illuminate\Support\Facades\Gate;

class ProduitController extends AppBaseController
{
    /** @var ProduitRepository $produitRepository*/
    private $produitRepository;

    public function __construct(ProduitRepository $produitRepo)
    {
        $this->produitRepository = $produitRepo;
    }

    /**
     * Display a listing of the Produit.
     *
     * @param ProduitDataTable $produitDataTable
     *
     * @return Response
     */
    public function index(ProduitDataTable $produitDataTable)
    {
        // Si l'utilisateur n'a pas cette permissions, on l'interdit l'accès
        abort_if(!Gate::allows('afficher produits'), 403, "Vous n'avez pas la permission d'accéder à cette fonctionnalité");

        return $produitDataTable->render('produits.index');
    }

    /**
     * Show the form for creating a new Produit.
     *
     * @return Response
     */
    public function create()
    {
        // Si l'utilisateur n'a pas cette permissions, on l'interdit l'accès
        abort_if(!Gate::allows('ajouter produits'), 403, "Vous n'avez pas la permission d'accéder à cette fonctionnalité");

        $unites = Unite::pluck('nom', 'id');

        return view('produits.create', compact('unites'));
    }

    /**
     * Store a newly created Produit in storage.
     *
     * @param CreateProduitRequest $request
     *
     * @return Response
     */
    public function store(CreateProduitRequest $request)
    {
        // Si l'utilisateur n'a pas cette permissions, on l'interdit l'accès
        abort_if(!Gate::allows('ajouter produits'), 403, "Vous n'avez pas la permission d'accéder à cette fonctionnalité");

        $input = $request->all();
        // Ajouter l'utilisateur qui a créé le produit
        $input['cree_par'] = Auth()->id();

        $produit = $this->produitRepository->create($input);

        Flash::success('Produit saved successfully.');

        return redirect(route('produits.index'));
    }

    /**
     * Display the specified Produit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // Si l'utilisateur n'a pas cette permissions, on l'interdit l'accès
        abort_if(!Gate::allows('afficher produits'), 403, "Vous n'avez pas la permission d'accéder à cette fonctionnalité");

        $produit = $this->produitRepository->find($id);

        if (empty($produit)) {
            Flash::error('Produit not found');

            return redirect(route('produits.index'));
        }

        return view('produits.show')->with('produit', $produit);
    }

    /**
     * Show the form for editing the specified Produit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // Si l'utilisateur n'a pas cette permissions, on l'interdit l'accès
        abort_if(!Gate::allows('modifier produits'), 403, "Vous n'avez pas la permission d'accéder à cette fonctionnalité");

        $produit = $this->produitRepository->find($id);

        if (empty($produit)) {
            Flash::error('Produit not found');

            return redirect(route('produits.index'));
        }

        $unites = Unite::pluck('nom', 'id');

        return view('produits.edit', compact('unites'))->with('produit', $produit);
    }

    /**
     * Update the specified Produit in storage.
     *
     * @param int $id
     * @param UpdateProduitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProduitRequest $request)
    {
        // Si l'utilisateur n'a pas cette permissions, on l'interdit l'accès
        abort_if(!Gate::allows('modifier produits'), 403, "Vous n'avez pas la permission d'accéder à cette fonctionnalité");

        $produit = $this->produitRepository->find($id);

        if (empty($produit)) {
            Flash::error('Produit not found');

            return redirect(route('produits.index'));
        }

        // Enregistrer la personne qui a modifie le produit
        $input = $request->all();
        $input['modifie_par'] = Auth()->id();

        $produit = $this->produitRepository->update($input, $id);

        Flash::success('Produit updated successfully.');

        return redirect(route('produits.index'));
    }

    /**
     * Remove the specified Produit from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        // Si l'utilisateur n'a pas cette permissions, on l'interdit l'accès
        abort_if(!Gate::allows('supprimer produits'), 403, "Vous n'avez pas la permission d'accéder à cette fonctionnalité");

        $produit = $this->produitRepository->find($id);

        if (empty($produit)) {
            Flash::error('Produit not found');

            return redirect(route('produits.index'));
        }

        $this->produitRepository->delete($id);

        Flash::success('Produit deleted successfully.');

        return redirect(route('produits.index'));
    }
}
