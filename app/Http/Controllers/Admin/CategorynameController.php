<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateCategorynameRequest;
use App\Http\Requests\UpdateCategorynameRequest;
use App\Repositories\CategorynameRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Categoryname;
use App\Models\Category;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CategorynameController extends InfyOmBaseController
{
    /** @var  CategorynameRepository */
    private $categorynameRepository;

    public function __construct(CategorynameRepository $categorynameRepo)
    {
        $this->categorynameRepository = $categorynameRepo;
    }

    /**
     * Display a listing of the Categoryname.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->categorynameRepository->pushCriteria(new RequestCriteria($request));
        $categorynames = $this->categorynameRepository->all();
        return view('admin.categorynames.index')
            ->with('categorynames', $categorynames);
    }

    /**
     * Show the form for creating a new Categoryname.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categorynames.create');
    }

    /**
     * Store a newly created Categoryname in storage.
     *
     * @param CreateCategorynameRequest $request
     *
     * @return Response
     */
    public function store(CreateCategorynameRequest $request)
    {
        $input = $request->all();

        $categoryname = $this->categorynameRepository->create($input);

        Flash::success('Categoryname saved successfully.');

        return redirect(route('admin.categorynames.index'));
    }

    /**
     * Display the specified Categoryname.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoryname = $this->categorynameRepository->findWithoutFail($id);

        if (empty($categoryname)) {
            Flash::error('Categoryname not found');

            return redirect(route('categorynames.index'));
        }

        return view('admin.categorynames.show')->with('categoryname', $categoryname);
    }

    /**
     * Show the form for editing the specified Categoryname.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categoryname = $this->categorynameRepository->findWithoutFail($id);

        if (empty($categoryname)) {
            Flash::error('Categoryname not found');

            return redirect(route('categorynames.index'));
        }

        return view('admin.categorynames.edit')->with('categoryname', $categoryname);
    }

    /**
     * Update the specified Categoryname in storage.
     *
     * @param  int              $id
     * @param UpdateCategorynameRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategorynameRequest $request)
    {
        $categoryname = $this->categorynameRepository->findWithoutFail($id);

        

        if (empty($categoryname)) {
            Flash::error('Categoryname not found');

            return redirect(route('categorynames.index'));
        }
        Category::where('title',$categoryname->title )
        ->update(['title' => $request->title]);
        
        $categoryname = $this->categorynameRepository->update($request->all(), $id);

        Flash::success('Categoryname updated successfully.');

        return redirect(route('admin.categorynames.index'));
    }

    /**
     * Remove the specified Categoryname from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.categorynames.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Categoryname::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.categorynames.index'))->with('success', Lang::get('message.success.delete'));

       }

}
