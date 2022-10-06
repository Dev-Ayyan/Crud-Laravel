<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Http\Requests\CreateBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Sentinel;

class BannerController extends InfyOmBaseController
{
    /** @var  BannerRepository */
    private $bannerRepository;

    public function __construct(BannerRepository $bannerRepo)
    {
        $this->bannerRepository = $bannerRepo;
    }

    /**
     * Display a listing of the Banner.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['banners']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }

        $this->bannerRepository->pushCriteria(new RequestCriteria($request));
        $banners = $this->bannerRepository->all();
        return view('admin.banners.index')
            ->with('banners', $banners);
    }

    /**
     * Show the form for creating a new Banner.
     *
     * @return Response
     */
    public function create()
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['banners']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }
        return view('admin.banners.create');
    }

    /**
     * Store a newly created Banner in storage.
     *
     * @param CreateBannerRequest $request
     *
     * @return Response
     */
    public function store(CreateBannerRequest $request)
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['banners']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }

        $input = $request->all();

        $six_digit_random_number = mt_rand(100000, 999999);

        if ($request->file('source')) {
            $file = $request->file('source');
            $file_name = $six_digit_random_number .  str_replace(' ', '', $file->getClientOriginalName());
            $file_path = 'uploads/banners';
            $file->move($file_path, $file_name);
            $input['source'] = $file_path.'/'.$file_name;
        }
        //img tablet

        $banner = $this->bannerRepository->create($input);

        Flash::success('Banner saved successfully.');

        return redirect(route('admin.banners.index'));
    }

    /**
     * Display the specified Banner.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['banners']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }

        $banner = $this->bannerRepository->findWithoutFail($id);

        if (empty($banner)) {
            Flash::error('Banner not found');

            return redirect(route('banners.index'));
        }

        return view('admin.banners.show')->with('banner', $banner);
    }

    /**
     * Show the form for editing the specified Banner.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['banners']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }

        $banner = $this->bannerRepository->findWithoutFail($id);

        if (empty($banner)) {
            Flash::error('Banner not found');

            return redirect(route('banners.index'));
        }

        return view('admin.banners.edit')->with('banner', $banner);
    }

    /**
     * Update the specified Banner in storage.
     *
     * @param  int              $id
     * @param UpdateBannerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBannerRequest $request)
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['banners']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }

        $banner = $this->bannerRepository->findWithoutFail($id);
        $input = $request->all();

        if (empty($banner)) {
            Flash::error('Banner not found');

            return redirect(route('banners.index'));
        }
        $six_digit_random_number = mt_rand(1000, 9999);
        
        if ($request->file('source')) {
            // dd($input);
            $file = $request->file('source');
            $file_name = $six_digit_random_number . str_replace(' ', '', $file->getClientOriginalName());
            $file_path = 'uploads/banners';
            $file->move($file_path, $file_name);
            $input['source'] = $file_path.'/'.$file_name;
        }
        $banner = $this->bannerRepository->update($input, $id);

        Flash::success('Banner updated successfully.');

        return redirect(route('admin.banners.index'));
    }

    /**
     * Remove the specified Banner from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function getModalDelete($id = null)
    {
        $error = '';
        $model = '';
        $confirm_route = route('admin.banners.delete', ['id' => $id]);
        return View('admin.layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));

    }

    public function getDelete($id = null)
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['banners']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }
        
        $sample = Banner::destroy($id);

        // Redirect to the group management page
        return redirect(route('admin.banners.index'))->with('success', Lang::get('message.success.delete'));

    }

}
