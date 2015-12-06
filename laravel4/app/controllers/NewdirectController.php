<?php


class NewdirectController extends BaseController
{
	/**
	 * 編集画面アクセスしたときのアクション
	 *
	 */
	public function edit($id)
	{
		$data;
		if ($id == 0) {
			$data = [
				'id' => '',
				'order_day' => date('Y-m-d'),
				'order_contact' => '',
				'hall' => '',
				'legal' => '',
				'machine' => '',
				'app' => 1,
				'new' => '',
				'unit' => '',
				'deli_oneday' => date('Y-m-d'),
				'open_oneday' => date('Y-m-d'),
				'collect_oneday' => date('Y-m-d'),
				'bill_money' => '',
				'user' => '',
				'method' => 1,
				'collect' => '',
				'collect_day' => '',
				'note' => '',
			];
		} else {
			$data = TblNewdirect::whereId($id)->first();
			$data['note'] = $this->selectEscape( $data['note'] );
			$data['order_day'] = ($data['order_day'] == "0000-00-00") ? '' : $data['order_day'];
			$data['deli_oneday'] = ($data['deli_oneday'] == "0000-00-00") ? '' : $data['deli_oneday'];
			$data['open_oneday'] = ($data['open_oneday'] == "0000-00-00") ? '' : $data['open_oneday'];
			$data['collect_oneday'] = ($data['collect_oneday'] == "0000-00-00") ? '' : $data['collect_oneday'];
			$data['collect_day'] = ($data['collect_day'] == "0000-00-00") ? '' : $data['collect_day'];
		}
		Log::debug(print_r($data, true));
		return View::make('main.edit.newdirect', compact('data'))
						->with('message', Session::pull('message', false));
	}

	/**
	 * 新規作成
	 *
	 */
	public function create()
	{
		$input = Input::all();
		$id = TblNewdirect::max('id') + 1;

		$input['id'] = $id;
		unset($input['_token']);
		$input['note'] = $this->inputEscape( $input['note'] );
		Log::debug(print_r($input, true));

		TblNewdirect::insert($input);

		return Redirect::route('newdirect.edit', ['id' => $id])->with('message', '正常に登録しました。');
	}

	/**
	 * 更新
	 *
	 */
	public function update($id) {
		$befor = TblNewdirect::whereId($id)->first();
		$input = Input::all();
		unset($input['_token']);
		$input['note'] = $this->inputEscape( $input['note'] );
		Log::debug(print_r($input, true));

		TblNewdirect::find($id)->fill($input)->save();

		return Redirect::route('newdirect.edit', ['id' => $id])->with('message', '正常に登録しました。');
	}

	/**
	 * 削除
	 *
	 */
	public function delete($id) {
		TblNewdirect::find($id)->fill(['del'=>1])->save();

		return Redirect::route('newdirect.edit', ['id' => 0])->with('message', '削除しました。');
	}

}