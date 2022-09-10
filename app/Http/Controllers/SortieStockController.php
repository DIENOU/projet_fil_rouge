<?php

namespace App\Http\Controllers;

use App\DataTables\SortieStockDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSortieStockRequest;
use App\Http\Requests\UpdateSortieStockRequest;
use App\Repositories\SortieStockRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\SortieStock;

class SortieStockController extends AppBaseController
{
    /** @var SortieStockRepository $sortieStockRepository*/
    private $sortieStockRepository;

    public function __construct(SortieStockRepository $sortieStockRepo)
    {
        $this->sortieStockRepository = $sortieStockRepo;
    }

    /**
     * Display a listing of the SortieStock.
     *
     * @param SortieStockDataTable $sortieStockDataTable
     *
     * @return Response
     */
    public function index(SortieStockDataTable $sortieStockDataTable)
    {
        return $sortieStockDataTable->render('sortie_stocks.index');
    }

    /**
     * Show the form for creating a new SortieStock.
     *
     * @return Response
     */
    public function create()
    {
        return view('sortie_stocks.create');
    }

    /**
     * Store a newly created SortieStock in storage.
     *
     * @param CreateSortieStockRequest $request
     *
     * @return Response
     */
    public function store(CreateSortieStockRequest $request)
    {
        $input = $request->all();
        // Ajouter l'utilisateur qui a créé la sortiestock
        $input['cree_par'] = Auth()->id();

        $sortieStock = $this->sortieStockRepository->create($input);

        Flash::success('Sortie Stock saved successfully.');

        return redirect(route('sortieStocks.index'));
    }

    /**
     * Display the specified SortieStock.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sortieStock = $this->sortieStockRepository->find($id);

        if (empty($sortieStock)) {
            Flash::error('Sortie Stock not found');

            return redirect(route('sortieStocks.index'));
        }

        return view('sortie_stocks.show')->with('sortieStock', $sortieStock);
    }

    /**
     * Show the form for editing the specified SortieStock.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sortieStock = $this->sortieStockRepository->find($id);

        if (empty($sortieStock)) {
            Flash::error('Sortie Stock not found');

            return redirect(route('sortieStocks.index'));
        }

        return view('sortie_stocks.edit')->with('sortieStock', $sortieStock);
    }

    /**
     * Update the specified SortieStock in storage.
     *
     * @param int $id
     * @param UpdateSortieStockRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSortieStockRequest $request)
    {
        $sortieStock = $this->sortieStockRepository->find($id);

        if (empty($sortieStock)) {
            Flash::error('Sortie Stock not found');

            return redirect(route('sortieStocks.index'));
        }
        // Enregistrer la personne qui a modifie la sortiestock
        $input = $request->all();
        $input['modifie_par'] = Auth()->id();

        $sortieStock = $this->sortieStockRepository->update($input, $id);

        Flash::success('Sortie Stock updated successfully.');

        return redirect(route('sortieStocks.index'));
    }

    /**
     * Remove the specified SortieStock from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sortieStock = $this->sortieStockRepository->find($id);

        if (empty($sortieStock)) {
            Flash::error('Sortie Stock not found');

            return redirect(route('sortieStocks.index'));
        }

        $this->sortieStockRepository->delete($id);

        Flash::success('Sortie Stock deleted successfully.');

        return redirect(route('sortieStocks.index'));
    }
}
