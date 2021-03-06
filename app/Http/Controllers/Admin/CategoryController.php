<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Category;
use Illuminate\Http\Request;
use DB;
//use Illuminate\Database\Eloquent\Collection::truncate();

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        //$this->middleware('admin', ['except' => 'logout']);
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $category = Category::where('category', 'LIKE', "%$keyword%")
            ->orWhere('detall', 'LIKE', "%$keyword%")
            ->orWhere('gerente', 'LIKE', "%$keyword%")
            ->orWhere('activo', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $category = Category::paginate($perPage);
        }

        $category_deleted = DB::table('categories')->whereNotNull('deleted_at')->get();

        return view('admin.category.index', compact('category','category_deleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function restore($id){
        try {
            $category = Category::withTrashed()
            ->where('id', $id)
            ->restore();
            Session::flash('flash_message', 'Restaurado correctamente');
        } catch (\Exception $e) {
            Session::flash('danger', 'Error al restaurar dato id=>'.$id);
            
        }
        return redirect('admin/category');        
    }

    public function allrestore(){
        try {
            $category = Category::withTrashed()->restore();
            Session::flash('flash_message', 'Restaurado correctamente');
        } catch (\Exception $e) {
            Session::flash('danger', 'Error al restaurar');
            
        }
        return redirect('admin/category'); 
    }

    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'category' => 'required|unique:categories|max:75',
       ]);

        $requestData = $request->all();
        
        Category::create($requestData);

        return redirect('admin/category')->with('flash_message', 'Category added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'category' => 'required|unique:categories|max:75',
        ]);

        $requestData = $request->all();
        
        $category = Category::findOrFail($id);
        $category->update($requestData);

        return redirect('admin/category')->with('flash_message', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {

            Category::destroy($id);
            Session::flash('flash_message', 'Eliminado correctamente');
            
        } catch (\Exception $e) {

            Session::flash('danger', '!!!Error al eliminar');
            
        }

        return redirect('admin/category');
    }

    public function trash(){
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('categories')->truncate();
            //DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            Session::flash('flash_message', 'Vaciado correctamente');
        } catch (\Exception $e) {
            Session::flash('danger', 'Error al vaciar categorías');
        }
        return redirect('admin/category');
    }

    public function trash_sofdelete(){
        try {
            $subcategory_deleted = DB::table('categories')->whereNotNull('deleted_at')->delete();            
            Session::flash('flash_message', 'Vaciado correctamente');
        } catch (\Exception $e) {
            Session::flash('danger', 'Error al vaciar categorías');
        }
        return redirect('admin/category');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
