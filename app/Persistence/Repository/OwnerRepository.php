<?php
/**
 * Created by PhpStorm.
 * User: petoc
 * Date: 2020. 06. 23.
 * Time: 14:34
 */

namespace App\Persistence\Repository;

use App\Persistence\Model\Building;
use App\Persistence\Model\Owner;
use Illuminate\Http\Request;

class OwnerRepository {

    private $model;

    public function __construct(Owner $model) {

        $this->model = $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll() {

        return $this->model::with('buildings')->get();
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getById($id) {

        return $this->model::with('buildings')->find($id);
    }

    /**
     * @param $request
     * @return false|string
     */
    public function store($request) {

        $request->validate([
            'name' => 'required|max:144',
            'contact_email' => 'required|email|unique:owners|max:255'
        ]);

        $this->model->name = $request->get('name');
        $this->model->contact_email = $request->get('contact_email');
        $this->model->save();

        return json_encode(['response' => 'success']);
    }

    /**
     * @param $request
     * @return false|string
     */
    public function edit($request) {

        $request->validate([
            'name' => 'required|max:144',
            'contact_email' => 'required|email|max:255'
        ]);

        $this->model::where('id', $request->get('id'))
            ->update([
                'name' => $request->get('name'),
                'contact_email' => $request->get('contact_email')
            ]);

        return json_encode(['response' => 'success']);
    }

    /**
     * If deleted an owner have to delete all its buildings too
     * @param $id
     * @return false|string
     * @throws \Exception
     */
    public function delete($id) {

        $owner = $this->model::with('buildings')->find($id);
        $owner->delete();
        foreach ($owner->buildings as $building){

            Building::find($building->id)->delete();
        }
        $owner->buildings()->detach();

        return json_encode(['response' => 'success']);
    }
}
