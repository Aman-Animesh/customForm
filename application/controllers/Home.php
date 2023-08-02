<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('FormModel');
	}

	public function index()
	{
		$forms = $this->FormModel->fetch_data('formdata', array());
		$this->load->view('index', compact('forms'));
	}
	public function formGenerate()
	{
		$this->load->view('formGenerate');
	}

	public function createForm()
	{
		$formData = $this->input->post();
		$formArray = array();
		$j = 0;
		for ($i = 0; $i < sizeof($formData['questionType']); $i++) {
			$formArray[$i] = $formData['questionType'][$i] . ";" . $formData['questionText'][$i] . ";" . $formData['options'][$i] . ";" . $formData['required'][$i];
		}
		$formId =  strtotime(date("Y-m-d H:i:s"));
		$forms = array(
			'formId' =>  $formId,
			'formTitle' => $formData['formTitle'],
			'formDescription' => $formData['formDescription'],
			'formData' => implode(":", $formArray),
			'formUrl' => ''
		);
		$success = $this->FormModel->insert('formdata', $forms);
		if ($success) {
			$formId = $this->FormModel->fetch_single_data('formdata', array('id' => $success));
			echo $url = 'form?id=' . base64_encode($formId['formId']);
			$updateUrl = $this->FormModel->update('formdata', array('formUrl' => $url), array('id' => $success));
			$this->session->set_flashdata('success', '<strong>Well done!</strong> You successfully create your form. 👍');
			return redirect('form-generate');
		} else {
			$this->session->set_flashdata('fail', '<strong>Oh snap!</strong>Something went wrong unable to create your form, Please try after sometime. 👎');
			return redirect('form-generate');
		}
	}

	public function forms()
	{
		$formId = base64_decode($this->input->get('id'));
		$formData = $this->FormModel->fetch_single_data('formdata', array('formId' => $formId));
		$questionArray = explode(":", $formData['formData']);
		foreach ($questionArray as $key => $value) {
			$question[$key] = explode(";", $value);
		}
		$formData['question'] = $question;
		foreach ($question as $key => $value) {
			$formData['question'][$key][4] = explode(',', $value[2]);
		}
		$this->load->view('forms', compact('formData'));
	}
	public function formSubmit()
	{
		$val = array();
		$post = $this->input->post();
		foreach ($post as $key => $value) {
			$val[$key] = $key . "," . $value;
		}
		$response = implode(";", $val);

		$formData = array(
			'formId' => $post['formId'],
			'formResponse'  => $response,
		);
		$success = $this->FormModel->insert('formresponse', $formData);
		if ($success) {
			$this->session->set_flashdata('success', '<strong>Well done!</strong> You successfully Submit Your Form. 👍');
			$this->load->view('success');
		}
	}

	public function formResponse()
	{
		$formId = base64_decode($this->input->get('id'));
		$formData = $this->FormModel->fetch_data('formresponse', array('formId' => $formId));

		foreach ($formData as $key => $value) {
			$response[$key] = explode(';', $value['formResponse']);
		}

		foreach ($response as $key => $val) {
			for ($i = 0; $i < sizeof($val); $i++) {
				$formData[$key]['response'][$i] = explode(",", $val[$i]);
			}
		}

		$this->load->view('formResponse', compact('formData'));
	}
}
