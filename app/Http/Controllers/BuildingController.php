<?php

namespace App\Http\Controllers;

use App\Persistence\Model\Building;
use App\Persistence\Model\Owner;
use App\Persistence\Repository\BuildingRepository;
use Illuminate\Http\Request;


class BuildingController extends Controller
{
    private $repository;

    public function __construct() {
        $this->repository = new BuildingRepository(new Building());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(Request $request){

        $buildings = $this->repository->getAll();
        $num = 1;

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json($buildings);
        } else {
            return view('buildings', ['buildings' => $buildings, 'num' => $num]);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function details(Request $request, $id){

        $building = $this->repository->getById($id);
        $owners = Owner::all();

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json($building);
        } else {
            return view('building_details', ['building' => $building, 'owners' => $owners]);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new(){

        $owners = Owner::all();
        return view('building_new', ['owners' => $owners]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request){

        $response = json_decode($this->repository->store($request));
        if($response->response == "success"){
            return redirect('building/new')->with('response', 'Success');
        }else{
            return redirect('building/new')->with('response', 'Error');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request){

        $response = json_decode($this->repository->edit($request));
        if($response->response == "success"){
            return redirect('building/details/'.$request->get('id').'')->with('response', 'Success');
        }else{
            return redirect('building/details/'.$request->get('id').'')->with('response', 'Error');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Request $request){

        $response = json_decode($this->repository->delete($request->get('id')));
        if($response->response == "success"){
            return redirect('buildings')->with('response', 'Success');
        }else{
            return redirect('buildings')->with('response', 'Error');
        }
    }
}
