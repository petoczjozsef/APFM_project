<?php
/**
 * Created by PhpStorm.
 * User: petoc
 * Date: 2020. 06. 23.
 * Time: 14:33
 */

namespace App\Persistence\Repository;


use App\Persistence\Model\Building;

class BuildingRepository {

    private $model;

    public function __construct(Building $model) {

        $this->model = $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(){
        return $this->model::with('owner')->get();
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getById($id) {
        return $this->model::with('owner')->find($id);
    }

    /**
     * If stored an building have to save its relation in pivot too
     * @param $request
     * @return false|string
     */
    public function store($request){

        $request->validate([
            'building_name' => 'required|max:144',
            'building_address' => 'required|max:255',
            'owner_id' => 'required'
        ]);

        $owner_id = $request->get('owner_id');

        $this->model->building_name = $request->get('building_name');
        $this->model->building_address = $request->get('building_address');
        $this->model->save();
        $this->model->owner()->attach($owner_id);

        return json_encode(['response' => 'success']);
    }

    /**
     * If edited an building have to update all its relations from pivot too
     * @param $request
     * @return false|string
     */
    public function edit($request) {

        $request->validate([
            'building_name' => 'required|max:144',
            'building_address' => 'required|max:255',
            'owner_id' => 'required'
        ]);

        $building = $this->model::find($request->get('id'));

        $old_owner_id = $request->get('old_owner_id');
        $building->owner()->detach($old_owner_id);

        $owner_id = $request->get('owner_id');

        $building->building_name = $request->get('building_name');
        $building->building_address = $request->get('building_address');
        $building->save();
        $building->owner()->attach($owner_id);

        return json_encode(['response' => 'success']);
    }

    /**
     * If deleted an building have to delete all its relations from pivot too
     * @param $id
     * @return false|string
     */
    public function delete($id) {

        $building = $this->model->find($id);
        $building->delete();

        $building->owner()->detach();

        return json_encode(['response' => 'success']);
    }

}
