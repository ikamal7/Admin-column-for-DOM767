<?php

namespace DOM_COLUMN\Column\Pro;

use DOM_COLUMN;
use ACP;

class Called extends DOM_COLUMN\Column\Free\Called
	implements ACP\Editing\Editable {

	public function editing() {
		return new DOM_COLUMN\Editing\Called( $this );
	}

	

	

}