<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBonLivraisonRequest;
use App\Http\Requests\UpdateBonLivraisonRequest;
use App\Repositories\BonLivraisonRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

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
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bonLivraisons = $this->bonLivraisonRepository->all();

        return view('bon_livraisons.index')
            ->with('bonLivraisons', $bonLivraisons);
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

        $bonLivraison = $this->bonLivraisonRepository->update($request->all(), $id);

        Flash::success('Bon Livraison updated successfully.');

        return redirect(route('bonLivraisons.index'));
    }

    /**
     * Remove the specified BonLivraison from storage.
     *
     * @param int $id
     *
     * @throws \Exception
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
