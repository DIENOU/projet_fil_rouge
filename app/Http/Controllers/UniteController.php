<?php

namespace App\Http\Controllers;

use App\DataTables\UniteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUniteRequest;
use App\Http\Requests\UpdateUniteRequest;
use App\Repositories\UniteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Unite;

class UniteController extends AppBaseController
{
    /** @var UniteRepository $uniteRepository*/
    private $uniteRepository;

    public function __construct(UniteRepository $uniteRepo)
    {
        $this->uniteRepository = $uniteRepo;
    }

    /**
     * Display a listing of the Unite.
     *
     * @param UniteDataTable $uniteDataTable
     *
     * @return Response
     */
    public function index(UniteDataTable $uniteDataTable)
    {
        return $uniteDataTable->render('unites.index');
    }

    /**
     * Show the form for creating a new Unite.
     *
     * @return Response
     */
    public function create()
    {
        return view('unites.create');
    }

    /**
     * Store a newly created Unite in storage.
     *
     * @param CreateUniteRequest $request
     *
     * @return Response
     */
    public function store(CreateUniteRequest $request)
    {
        $input = $request->all();

 // Ajouter l'utilisateur qui a créé l'unite
        $input['cree_par'] = Auth()->id();

        $unite = $this->uniteRepository->create($input);

        Flash::success('Unite saved successfully.');

        return redirect(route('unites.index'));
    }

    /**
     * Display the specified Unite.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $unite = $this->uniteRepository->find($id);

        if (empty($unite)) {
            Flash::error('Unite not found');

            return redirect(route('unites.index'));
        }

        return view('unites.show')->with('unite', $unite);
    }

    /**
     * Show the form for editing the specified Unite.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $unite = $this->uniteRepository->find($id);

        if (empty($unite)) {
            Flash::error('Unite not found');

            return redirect(route('unites.index'));
        }

        return view('unites.edit')->with('unite', $unite);
    }

    /**
     * Update the specified Unite in storage.
     *
     * @param int $id
     * @param UpdateUniteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniteRequest $request)
    {
        $unite = $this->uniteRepository->find($id);

        if (empty($unite)) {
            Flash::error('Unite not found');

            return redirect(route('unites.index'));
        }

         // Enregistrer la personne qui a modifié l'unite
         $input = $request->all();
         $input['modifie_par'] = Auth()->id();

        $unite = $this->uniteRepository->update($input, $id);

        Flash::success('Unite updated successfully.');

        return redirect(route('unites.index'));
    }

    /**
     * Remove the specified Unite from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $unite = $this->uniteRepository->find($id);

        if (empty($unite)) {
            Flash::error('Unite not found');

            return redirect(route('unites.index'));
        }

        $this->uniteRepository->delete($id);

        Flash::success('Unite deleted successfully.');

        return redirect(route('unites.index'));
    }
}
