<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSortieStockRequest;
use App\Http\Requests\UpdateSortieStockRequest;
use App\Repositories\SortieStockRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

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
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sortieStocks = $this->sortieStockRepository->all();

        return view('sortie_stocks.index')
            ->with('sortieStocks', $sortieStocks);
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

        $sortieStock = $this->sortieStockRepository->update($request->all(), $id);

        Flash::success('Sortie Stock updated successfully.');

        return redirect(route('sortieStocks.index'));
    }

    /**
     * Remove the specified SortieStock from storage.
     *
     * @param int $id
     *
     * @throws \Exception
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
