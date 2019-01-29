<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()	{
		$data['countries'] = $this->welcome_model->fetch_country();
		//echo '<pre>'; print_r($data['country']);die;
		$this->load->view('welcome_message', $data);
	}

	public function states() {
		$states = $this->welcome_model->fetch_state($this->input->post('id'));
		?>
			<?php foreach($states as $state): ?>
              <option value="<?php echo $state->id; ?>"><?php echo $state->name; ?></option>
            <?php endforeach; ?>
		<?php
	}

	public function city() {
		$cities = $this->welcome_model->fetch_city($this->input->post('id'));
		?>
			<?php foreach($cities as $city): ?>
              <option value="<?php echo $city->id; ?>"><?php echo $city->name; ?></option>
            <?php endforeach; ?>
		<?php
	}
}
