<?php

namespace App\Http\Controllers;

use App\DataTables\ClientDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Repositories\ClientRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Client;

class ClientController extends AppBaseController
{
    /** @var ClientRepository $clientRepository*/
    private $clientRepository;

    public function __construct(ClientRepository $clientRepo)
    {
        $this->clientRepository = $clientRepo;
    }

    /**
     * Display a listing of the Client.
     *
     * @param ClientDataTable $clientDataTable
     *
     * @return Response
     */
    public function index(ClientDataTable $clientDataTable)
    {
        return $clientDataTable->render('clients.index');
    }

    /**
     * Show the form for creating a new Client.
     *
     * @return Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created Client in storage.
     *
     * @param CreateClientRequest $request
     *
     * @return Response
     */
    public function store(CreateClientRequest $request)
    {
        $input = $request->all();

        // Ajouter l'utilisateur qui a créé le client
        $input['cree_par'] = Auth()->id();

        $client = $this->clientRepository->create($input);

        Flash::success('Client saved successfully.');

        return redirect(route('clients.index'));
    }

    /**
     * Display the specified Client.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $client = $this->clientRepository->find($id);

        //dd($client->creepar);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        return view('clients.show')->with('client', $client);
    }

    /**
     * Show the form for editing the specified Client.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $client = $this->clientRepository->find($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        return view('clients.edit')->with('client', $client);
    }

    /**
     * Update the specified Client in storage.
     *
     * @param int $id
     * @param UpdateClientRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientRequest $request)
    {
        $client = $this->clientRepository->find($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        // Enregistrer la personne qui a modifié le client
        $input = $request->all();
        $input['modifie_par'] = Auth()->id();

        $client = $this->clientRepository->update($input, $id);

        Flash::success('Client updated successfully.');

        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified Client from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $client = $this->clientRepository->find($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        $this->clientRepository->delete($id);

        Flash::success('Client deleted successfully.');

        return redirect(route('clients.index'));
    }
}
