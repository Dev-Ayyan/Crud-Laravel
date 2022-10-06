<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Repositories\PageRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Page;
use App\Models\Category;
use App\Models\Categoryname;
use Illuminate\Support\Str;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Sentinel;

class PageController extends InfyOmBaseController
{
    /** @var  PageRepository */
    private $pageRepository;

    public function __construct(PageRepository $pageRepo)
    {
        $this->pageRepository = $pageRepo;
    }

    /**
     * Display a listing of the Page.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['pages']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }

        $this->pageRepository->pushCriteria(new RequestCriteria($request));
        $pages = $this->pageRepository->orderby('id','asc')->all();
        return view('admin.pages.index')
            ->with('pages', $pages);
    }

    /**
     * Show the form for creating a new Page.
     *
     * @return Response
     */
    public function create()
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['pages']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }

        return view('admin.pages.create');
    }

    /**
     * Store a newly created Page in storage.
     *
     * @param CreatePageRequest $request
     *
     * @return Response
     */
    public function store(CreatePageRequest $request)
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['pages']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }

        $input = $request->all();
        $request->validate([
            'slug' => 'required|unique:pages,slug',
        ]);
        $input['slug'] = Str::slug($input['slug'], '-');

        $page = $this->pageRepository->create($input);

        Flash::success('Page saved successfully.');

        return redirect(route('admin.pages.index'));
    }
    public function storecategory(Request $request)
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['pages']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }

        $input = $request->all();
        
        $categoryname = Categoryname::whereId($input['title'])->first();
        if(!empty($categoryname)){
            $input['title'] = $categoryname->title;
        }else{
            $input['title'] = 'Other';
        }
        
        $six_digit_random_number = mt_rand(100000, 999999);
        // dd($input);

        $page = $this->pageRepository->findWithoutFail($input['page_id']);

        // dd($input);

        if (!empty($page)) {
            if($page->type == 'propertyreport'){

                if ($request->file('sample')) {
                    $file = $request->file('sample');
                    $file_name = $six_digit_random_number .  str_replace(' ', '', $file->getClientOriginalName());
                    $file_path = 'uploads/category-sample';
                    $file->move($file_path, $file_name);
                    $input['sample'] = $file_path.'/'.$file_name;
                }
    
            }

        
    
        }

        $lastOrder = Category::where('page_id',$input['page_id'])->orderby('order','desc')->first();
        if(!empty($lastOrder)){
            $orderCount = $lastOrder->order;
        }else{
            $orderCount = 0;
        }
        $input['order'] = $orderCount + 1;


        Category::create($input);
        

        Flash::success('Category added successfully.');

        return redirect(route('admin.pages.infobox',['pages'=>$input['page_id']]));
    }

    /**
     * Display the specified Page.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['pages']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        } 

        $page = $this->pageRepository->findWithoutFail($id);

        if (empty($page)) {
            Flash::error('Page not found');

            return redirect(route('pages.index'));
        }

        return view('admin.pages.show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified Page.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['pages']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }

        $page = $this->pageRepository->findWithoutFail($id);

        if (empty($page)) {
            Flash::error('Page not found');

            return redirect(route('pages.index'));
        }

        return view('admin.pages.edit')->with('page', $page);
    }
    public function infobox($id)
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['pages']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }

        $page = $this->pageRepository->findWithoutFail($id);

        $page = Page::whereId($id)->with('categories')->with('categories.infobox')->first();

        if (empty($page)) {
            Flash::error('Page not found');

            return redirect(route('pages.index'));
        }

        return view('admin.pages.infobox')->with('page', $page);
    }

    /**
     * Update the specified Page in storage.
     *
     * @param  int              $id
     * @param UpdatePageRequest $request
     *
     * @return Response
     */

    public function update($id, UpdatePageRequest $request)
    {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['pages']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }

        $page = $this->pageRepository->findWithoutFail($id);
        $input = $request->all();

 
        if ($page->type == 'default') {
            $request->validate([
                'slug' =>"required|unique:pages,slug, $id"
            ]);
            $input['slug'] = Str::slug($input['slug'], '-');
        }

        if (empty($page)) {
            Flash::error('Page not found');

            return redirect(route('pages.index'));
        }

        $page = $this->pageRepository->update($input, $id);

        Flash::success('Page updated successfully.');

        return redirect(route('admin.pages.index'));
    }

    /**
     * Remove the specified Page from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['pages']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }

          $error = '';
          $model = '';
          $confirm_route =  route('admin.pages.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['pages']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }

           $sample = Page::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.pages.index'))->with('success', Lang::get('message.success.delete'));

       }
       public function getCategoryDelete($id = null)
       {
        //check if user has permission
        if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['pages']))
        {
            return redirect()->route('admin.dashboard')->with('error','Do not Have access');
        }
        
           $sample = Category::destroy($id);

           // Redirect to the group management page
           return redirect()->back()->with('success', Lang::get('message.success.delete'));

       }
       public function getCategory(Request $request)
       {
           $category = Category::whereId($request->slug)->first();

           $page = $this->pageRepository->findWithoutFail($category['page_id']);

           return response()->json(['data' => $category ,'pageType'=>$page->type]);
        
       }
       public function updateReportPrice(Request $request){
        $input = $request->all();
    
        // $page = $this->pageRepository->findWithoutFail($input['page_id']);

        // if (!empty($page)) {
        //     if($page->type == 'propertyreport'){

        //         if ($request->file('sample')) {
        //             $file = $request->file('sample');
        //             $six_digit_random_number = mt_rand(100000, 999999);
        //             $file_name = $six_digit_random_number .  str_replace(' ', '', $file->getClientOriginalName());
        //             $file_path = 'uploads/category-sample';
        //             $file->move($file_path, $file_name);
        //             $input['sample'] = $file_path.'/'.$file_name;
        //         }
    
        //     }
        // }

        
        unset($input['_method'],$input['_token']);
       
        Category::whereId(0)->update($input);
        

        Flash::success('Category added successfully.');

        return redirect(route('admin.pages.infobox',['pages'=>$input['page_id']]));



       }
       public function updatecategory(Request $request){
       
        
        $input = $request->all();
        
        $categoryname = Categoryname::whereId($input['title'])->first();
        if(!empty($categoryname)){
            $input['title'] = $categoryname->title;
        }else{
            $input['title'] = 'Other';
        }
      
        $page = $this->pageRepository->findWithoutFail($input['page_id']);

        if (!empty($page)) {
            if($page->type == 'propertyreport'){

                if ($request->file('sample')) {
                    $file = $request->file('sample');
                    $six_digit_random_number = mt_rand(100000, 999999);
                    $file_name = $six_digit_random_number .  str_replace(' ', '', $file->getClientOriginalName());
                    $file_path = 'uploads/category-sample';
                    $file->move($file_path, $file_name);
                    $input['sample'] = $file_path.'/'.$file_name;
                }
    
            }

        
    
        }

        $category_id = $input['id'];
        unset($input['id'],$input['_method'],$input['_token']);
        // dd($input);
        Category::whereId($category_id)->update($input);
        

        Flash::success('Category added successfully.');

        return redirect(route('admin.pages.infobox',['pages'=>$input['page_id']]));
    }

}
