<?php

namespace App\Http\Controllers;

use App\Persistence\Model\Owner;
use App\Persistence\Repository\OwnerRepository;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    private $repository;

    public function __construct() {
        $this->repository = new OwnerRepository(new Owner());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(Request $request){

        $owners = $this->repository->getAll();
        $num = 1;

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json($owners);
        } else {
            return view('owners', ['owners' => $owners, 'num' => $num]);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function details(Request $request, $id){

        $owner = $this->repository->getById($id);
        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json($owner);
        } else {
            return view('owner_details', ['owner' => $owner]);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new(){
        return view('owner_new');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request){

        $response = json_decode($this->repository->store($request));
        if($response->response == "success"){
            return redirect('owner/new')->with('response', 'Success');
        }else{
            return redirect('owner/new')->with('response', 'Error');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request){

        $response = json_decode($this->repository->edit($request));
        if($response->response == "success"){
            return redirect('owner/details/'.$request->get('id').'')->with('response', 'Success');
        }else{
            return redirect('owner/details/'.$request->get('id').'')->with('response', 'Error');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete(Request $request){

        $response = json_decode($this->repository->delete($request->get('id')));
        if($response->response == "success"){
            return redirect('owners')->with('response', 'Success');
        }else{
            return redirect('owners')->with('response', 'Error');
        }
    }
}
