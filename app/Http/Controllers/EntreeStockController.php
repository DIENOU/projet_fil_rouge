<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEntreeStockRequest;
use App\Http\Requests\UpdateEntreeStockRequest;
use App\Repositories\EntreeStockRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

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
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $entreeStocks = $this->entreeStockRepository->all();

        return view('entree_stocks.index')
            ->with('entreeStocks', $entreeStocks);
    }

    /**
     * Show the form for creating a new EntreeStock.
     *
     * @return Response
     */
    public function create()
    {
        return view('entree_stocks.create');
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

        $entreeStock = $this->entreeStockRepository->create($input);

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

        return view('entree_stocks.edit')->with('entreeStock', $entreeStock);
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

        if (empty($entreeStock)) {
            Flash::error('Entree Stock not found');

            return redirect(route('entreeStocks.index'));
        }

        $entreeStock = $this->entreeStockRepository->update($request->all(), $id);

        Flash::success('Entree Stock updated successfully.');

        return redirect(route('entreeStocks.index'));
    }

    /**
     * Remove the specified EntreeStock from storage.
     *
     * @param int $id
     *
     * @throws \Exception
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
