<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function inputEscape( $input )
	{
		$result = $input;

		$result = mb_ereg_replace("\r\n", "<#crlf#>", $result);
		$result = mb_ereg_replace("\r", "<#cr#>", $result);
		$result = mb_ereg_replace("\n", "<#lf#>", $result);
		$result = mb_ereg_replace(",", "<#cm#>", $result);
		$result = mb_ereg_replace("\"", "<#dq#>", $result);

		return $result;
	}

	public function selectEscape( $data )
	{
		$result = $data;

		$result = mb_ereg_replace("<#crlf#>", "\r\n", $result);
		$result = mb_ereg_replace("<#cr#>", "\r", $result);
		$result = mb_ereg_replace("<#lf#>", "\n", $result);
		$result = mb_ereg_replace("<#cm#>", ",", $result);
		$result = mb_ereg_replace("<#dq#>", "\"", $result);

		return $result;
	}

}
