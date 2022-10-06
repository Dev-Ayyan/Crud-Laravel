<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateFooterRequest;
use App\Http\Requests\UpdateFooterRequest;
use App\Repositories\FooterRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Footer;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Sentinel;

class FooterController extends InfyOmBaseController
{
    /** @var  FooterRepository */
    private $footerRepository;

    public function __construct(FooterRepository $footerRepo)
    {
        $this->footerRepository = $footerRepo;
    }

    /**
     * Display a listing of the Footer.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
         //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['footers']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }

        
        //return redirect(route('admin.footers.show',1));

        $this->footerRepository->pushCriteria(new RequestCriteria($request));
        $footers = $this->footerRepository->all();
        return view('admin.footers.index')
            ->with('footers', $footers);
    }

    /**
     * Show the form for creating a new Footer.
     *
     * @return Response
     */
    public function create()
    {
          //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['footers']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }
       
        return view('admin.footers.create');
    }

    /**
     * Store a newly created Footer in storage.
     *
     * @param CreateFooterRequest $request
     *
     * @return Response
     */
    public function store(CreateFooterRequest $request)
    {
          //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['footers']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }
        $input = $request->all();

        $footer = $this->footerRepository->create($input);

        Flash::success('Footer saved successfully.');

        return redirect(route('admin.footers.index'));
    }

    /**
     * Display the specified Footer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
          //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['footers']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }

        $footer = $this->footerRepository->findWithoutFail($id);

        if (empty($footer)) {
            Flash::error('Footer not found');

            return redirect(route('footers.index'));
        }

        return view('admin.footers.show')->with('footer', $footer);
    }

    /**
     * Show the form for editing the specified Footer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
          //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['footers']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }

        $footer = $this->footerRepository->findWithoutFail($id);

        if (empty($footer)) {
            Flash::error('Footer not found');

            return redirect(route('footers.index'));
        }

        return view('admin.footers.edit')->with('footer', $footer);
    }

    /**
     * Update the specified Footer in storage.
     *
     * @param  int              $id
     * @param UpdateFooterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFooterRequest $request)
    {
          //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['footers']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }

        $footer = $this->footerRepository->findWithoutFail($id);
        $input = $request->all();
        

        if (empty($footer)) {
            Flash::error('Footer not found');

            return redirect(route('footers.index'));
        }

        $six_digit_random_number = mt_rand(1000, 9999);
        if ($request->file('cta_form_bg')) {
            
            $file = $request->file('cta_form_bg');
            $file_name = $six_digit_random_number . str_replace(' ', '', $file->getClientOriginalName());
            $file_path = 'uploads/homecta';
            $file->move($file_path, $file_name);
            $input['cta_form_bg'] = $file_path.'/'.$file_name;
        }

        $footer = $this->footerRepository->update($input, $id);

        Flash::success('Footer updated successfully.');

        return redirect(route('admin.footers.index'));
    }

    /**
     * Remove the specified Footer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['footers']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }

          $error = '';
          $model = '';
          $confirm_route =  route('admin.footers.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
          //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['footers']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }
       
           $sample = Footer::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.footers.index'))->with('success', Lang::get('message.success.delete'));

       }

}
