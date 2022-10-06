<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateCounterstatRequest;
use App\Http\Requests\UpdateCounterstatRequest;
use App\Repositories\CounterstatRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Counterstat;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CounterstatController extends InfyOmBaseController
{
    /** @var  CounterstatRepository */
    private $counterstatRepository;

    public function __construct(CounterstatRepository $counterstatRepo)
    {
        $this->counterstatRepository = $counterstatRepo;
    }

    /**
     * Display a listing of the Counterstat.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return redirect(route('admin.counterstats.show','1'));

        $this->counterstatRepository->pushCriteria(new RequestCriteria($request));
        $counterstats = $this->counterstatRepository->all();
        return view('admin.counterstats.index')
            ->with('counterstats', $counterstats);
    }

    /**
     * Show the form for creating a new Counterstat.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.counterstats.create');
    }

    /**
     * Store a newly created Counterstat in storage.
     *
     * @param CreateCounterstatRequest $request
     *
     * @return Response
     */
    public function store(CreateCounterstatRequest $request)
    {
        $input = $request->all();

        $counterstat = $this->counterstatRepository->create($input);

        Flash::success('Counterstat saved successfully.');

        return redirect(route('admin.counterstats.show','1'));
    }

    /**
     * Display the specified Counterstat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $counterstat = $this->counterstatRepository->findWithoutFail($id);

        if (empty($counterstat)) {
            Flash::error('Counterstat not found');

            return redirect(route('counterstats.index'));
        }

        return view('admin.counterstats.show')->with('counterstat', $counterstat);
    }

    /**
     * Show the form for editing the specified Counterstat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $counterstat = $this->counterstatRepository->findWithoutFail($id);

        if (empty($counterstat)) {
            Flash::error('Counterstat not found');

            return redirect(route('counterstats.index'));
        }

        return view('admin.counterstats.edit')->with('counterstat', $counterstat);
    }

    /**
     * Update the specified Counterstat in storage.
     *
     * @param  int              $id
     * @param UpdateCounterstatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCounterstatRequest $request)
    {
        $counterstat = $this->counterstatRepository->findWithoutFail($id);

        

        if (empty($counterstat)) {
            Flash::error('Counterstat not found');

            return redirect(route('counterstats.index'));
        }

        $counterstat = $this->counterstatRepository->update($request->all(), $id);

        Flash::success('Counterstat updated successfully.');

        return redirect(route('admin.counterstats.show','1'));
    }

    /**
     * Remove the specified Counterstat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.counterstats.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Counterstat::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.counterstats.index'))->with('success', Lang::get('message.success.delete'));

       }

}
