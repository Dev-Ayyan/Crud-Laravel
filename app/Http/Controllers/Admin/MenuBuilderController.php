<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreateMenuBuilderRequest;
use App\Http\Requests\UpdateMenuBuilderRequest;
use App\Http\Requests\CreateBuilderRequest;
use App\Http\Requests\UpdateBuilderRequest;
use App\Repositories\MenuBuilderRepository;
use App\Repositories\BuilderRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\MenuBuilder;
use App\Models\Builder;

use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MenuBuilderController extends InfyOmBaseController
{
    // public function index(){

    //     return view('admin.menuBuilder.index');
    // }

    
    /** @var  MenuBuilderRepository */
    private $menuBuilderRepository;
    private $builderRepository;

    public function __construct(MenuBuilderRepository $menuBuilderRepo, BuilderRepository $builderRepo)
    {
        $this->menuBuilderRepository = $menuBuilderRepo;
        $this->builderRepository = $builderRepo;
    }

    /**
     * Display a listing of the MenuBuilder.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->menuBuilderRepository->pushCriteria(new RequestCriteria($request));
        $menuBuilders = $this->menuBuilderRepository->where('id','!=','0')->get();
        return view('admin.menubuilders.index')
            ->with('menus', $menuBuilders);
    }

    /**
     * Show the form for creating a new menuBuilder.
     *
     * @return Response
     */
    public function create()
    {

        $all_menu = MenuBuilder::pluck('name', 'id')->toArray();
        $all_menu = array("Select Menu")+$all_menu;
        return view('admin.menubuilders.create',compact('all_menu'));
    }

    /**
     * Store a newly created menuBuilder in storage.
     *
     * @param CreateMenuBuilderRequest $request
     *
     * @return Response
     */
    public function store(CreateMenuBuilderRequest $request)
    {
        $input = $request->all();
// dd($input);
        if ($request->file('thumb')) {

            $file = $request->file('thumb');
            $file_name = time() . str_replace(' ', '', $file->getClientOriginalName());

            $file_path = 'uploads/menuBuilders';

            $file->move($file_path, $file_name);
            $input['thumb'] = $file_name;
        }

        $menuBuilder = $this->menuBuilderRepository->create($input);



        Flash::success('Menu saved successfully.');

        return redirect(route('admin.menubuilders.index'));
    }

    /**
     * Display the specified menuBuilder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $menuBuilder = $this->menuBuilderRepository->findWithoutFail($id);

        if (empty($menuBuilder)) {
            Flash::error('Menu not found');

            return redirect(route('menubuilders.index'));
        }

        return view('admin.menubuilders.show')->with('menu', $menuBuilder);
    }

    /**
     * Show the form for editing the specified menuBuilder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $menu = $this->menuBuilderRepository->findWithoutFail($id);
        $all_menu = MenuBuilder::where('id', '!=', $menu->id)->pluck('name', 'id')->toArray();
//        $all_menu[null] = "Select Parent";
        $all_menu = array("Select Menu")+$all_menu;
        if (empty($menu)) {
            Flash::error('Menu not found');
            return redirect(route('menubuilders.index'));
        }

        return view('admin.menubuilders.edit',compact('menu','all_menu'));
    }

    /**
     * Update the specified menuBuilder in storage.
     *
     * @param  int              $id
     * @param UpdatemenuBuilderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemenuBuilderRequest $request)
    {
        $menuBuilder = $this->menuBuilderRepository->findWithoutFail($id);

        if (empty($menuBuilder)) {
            Flash::error('Menu not found');

            return redirect(route('menubuilders.index'));
        }

        $input = $request->all();
        if ($request->file('thumb')) {

            $file = $request->file('thumb');
            $file_name = time() . str_replace(' ', '', $file->getClientOriginalName());

            $file_path = 'uploads/menubuilders';
            \File::delete($file_path . '/' . $menuBuilder->thumb);
            $file->move($file_path, $file_name);
            $input['thumb'] = $file_name;
        }
        $menuBuilder = $this->menuBuilderRepository->update($input, $id);

        Flash::success('Menu updated successfully.');

        return redirect(route('admin.menubuilders.index'));
    }

    /**
     * Remove the specified menuBuilder from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function getModalDelete($id = null)
    {
        $error = '';
        $model = '';
        $confirm_route =  route('admin.menubuilders.delete',['id'=>$id]);
        return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

    }

    public function getDelete($id = null)
    {
        $sample = MenuBuilder::destroy($id);

        // Redirect to the group management page
        return redirect(route('admin.menubuilders.index'))->with('success', Lang::get('message.success.delete'));

    }



    public function builder($id)
    {
        $builders = Builder::with('childs')->where('menu_id', $id)->whereNull('parent_id')->orderBy('order', 'asc')->get();
        return view('admin.menubuilders.builder.index')->with(['menus'=> $builders, 'menu_id' => $id]);
    }

     /**
     * Store a newly created menuBuilder in storage.
     *
     * @param CreateMenuBuilderRequest $request
     *
     * @return Response
     */
    public function builderStore(CreateBuilderRequest $request)
    {
        $input = $request->all();
//        dd($input);


        if($input['id'])
        {
            $id = $input['id'];
            unset($input['id']);
            $builder = $this->builderRepository->update($input, $id);
        }
        else
        {
            $builder = $this->builderRepository->create($input);
        }
//        dd($builder);

        Flash::success('Menu saved successfully.');

        return redirect(route('admin.menubuilders.builder', ['builders' => $request->menu_id]));
    }



    public function builderUpdate($id, UpdateBuilderRequest $request)
    {
        $builder = $this->builderRepository->findWithoutFail($id);

        if (empty($builder)) {
            Flash::error('Menu not found');

            return redirect(route('menubuilders.index'));
        }

        $input = $request->all();
        $builder = $this->builderRepository->update($input, $id);

        Flash::success('Menu updated successfully.');

        if($request->ajax()){

            return 'update sucessfully';
        }
        else{

            return redirect(route('admin.menubuilders.builder', ['builders' => $request->menu_id]));
        }
    }
    
    public function builderOrder($id, UpdateBuilderRequest $request)
    {
        $builder = $this->builderRepository->findWithoutFail($id);

        if (empty($builder)) {
            Flash::error('Menu not found');

            return redirect(route('menubuilders.index'));
        }

        $input = $request->all();
        $this->setOrder(Null, json_decode($input['order']));

        Flash::success('Menu updated successfully.');

        if($request->ajax()){

            return 'update sucessfully';
        }
        else{

            return redirect(route('admin.menubuilders.builder', ['builders' => $request->menu_id]));
        }
    }

    public function setOrder($parent_id, $data){
        foreach($data as $key => $menu){
            if(isset($menu->children) && !empty($menu->children)){
                $this->setOrder($menu->id, $menu->children);
            }
            $menu_data = ['parent_id' => $parent_id, 'order' => $key+1];

            $builder = $this->builderRepository->update($menu_data, $menu->id);
        }
    }

        /**
     * Show the form for editing the specified menuBuilder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function editBuilder($id)
    {
        $menu = $this->builderRepository->findWithoutFail($id);
        
        return response()->json($menu->toArray());
    }


    /**
     * Remove the specified menuBuilder from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function getBuilderModalDelete($id = null)
    {
        $error = '';
        $model = '';
        $confirm_route =  route('admin.builders.delete',['id'=>$id]);
        return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));
    }

    public function getBuilderDelete($id = null)
    {
        $sample = Builder::destroy($id);

        // Redirect to the group management page
        return redirect(route('admin.menubuilders.index'))->with('success', Lang::get('message.success.delete'));

    }
}
