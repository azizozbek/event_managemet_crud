<?php

namespace eventify;

class sessionHandler
{
	public function sessionStatus($id) {
		if(!empty($id)) {
			return true;
		} else {
			return false;
		}
	}
}