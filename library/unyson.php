<?php

//add admin css
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
		.fw-options-modal.fw-options-modal-small > .media-modal {
			top: 5%;
			bottom: 5%;
			left: 5%;
			right: 5%;
		}
		div.fw-inner {
			width: 100% !important;
		}
  </style>';
}

?>