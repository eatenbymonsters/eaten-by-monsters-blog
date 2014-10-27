<?php 

function getPostTaxData($inputs)
{
	if (!empty($inputs) && !is_wp_error($inputs)) {

		$inputList = array();
		foreach ($inputs as $input) {
			$row = array();
			$row['slug'] = $input->slug;
			$row['name'] = $input->name;
			if ($input->count > 1) {
				$row['link'] = true;
			} else {
				$row['link'] = false;
			}
			$inputList[] = $row;
    }
    return $inputList;
  } else {
  	//return false;
  }
}

?>
