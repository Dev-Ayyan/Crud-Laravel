<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateDeveloperRequest;
use App\Http\Requests\UpdateDeveloperRequest;
use App\Repositories\DeveloperRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Developer;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DeveloperController extends InfyOmBaseController
{
    /** @var  DeveloperRepository */
    private $developerRepository;

    public function __construct(DeveloperRepository $developerRepo)
    {
        $this->developerRepository = $developerRepo;
    }

    /**
     * Display a listing of the Developer.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->developerRepository->pushCriteria(new RequestCriteria($request));
        $developers = $this->developerRepository->all();
        return view('admin.developers.index')
            ->with('developers', $developers);
    }

    /**
     * Show the form for creating a new Developer.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.developers.create');
    }

    /**
     * Store a newly created Developer in storage.
     *
     * @param CreateDeveloperRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $developer = $this->developerRepository->create($input);

        Flash::success('Developer saved successfully.');

        return redirect(route('get-home'))->with('success', Lang::get('message.success.create'));
    }

    /**
     * Display the specified Developer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $developer = $this->developerRepository->findWithoutFail($id);

        if (empty($developer)) {
            Flash::error('Developer not found');

            return redirect(route('developers.index'));
        }

        return view('home')->with('developer', $developer);
    }

    /**
     * Show the form for editing the specified Developer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $developer = $this->developerRepository->findWithoutFail($id);

        if (empty($developer)) {
            Flash::error('Developer not found');

            return redirect(route('get-home'));
        }

        return view('edit', compact('developer'));
    }

    /**
     * Update the specified Developer in storage.
     *
     * @param  int              $id
     * @param UpdateDeveloperRequest $request
     *
     * @return Response
     */

    public function update($id, UpdateDeveloperRequest $request)
    {
        $developer = $this->developerRepository->findWithoutFail($id);
        if (empty($developer)) {
            Flash::error('Developer not found');
            return redirect(route('get-home'));
        }
        $developer = $this->developerRepository->update($request->all(), $id);
        Flash::success('Developer updated successfully.');
        return redirect(route('get-home'))->with('success', Lang::get('message.success.update'));
    }

    /**
     * Remove the specified Developer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function getModalDelete($id = null)
    {
        $error = '';
        $model = '';
        $confirm_route =  route('admin.developers.delete', ['id' => $id]);
        return View('admin.layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
    }

    public function destroy($id = null)
    {
        $sample = Developer::destroy($id);

        // Redirect to the group management page
        return redirect(route('get-home'))->with('success', Lang::get('message.success.delete'));
    }

    public function editDeveloperInfo($id)
    {
        $developer = Developer::find($id);
        return view('edit');
    }
}
