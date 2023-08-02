<?php
include 'header.php'; ?>

<div class="container mt-3">
  <?php if ($error = $this->session->flashdata('success')) { ?>
    <div class="alert alert-success border-0" role="alert">
      <?php echo $error; ?>
    </div>
  <?php }
  if ($error = $this->session->flashdata('fail')) { ?>
    <div class="alert alert-danger border-0" role="alert">
      <?php echo $error; ?>
    </div>
  <?php } ?>
  <h1>Custom Form</h1>
  <?= form_open('Create-Form') ?>
  <div class="form-group">
    <label for="questionText">Form Title</label>
    <input type="text" class="form-control" placeholder="Enter Form Title" name="formTitle" require>
  </div>
  <div class="form-group">
    <label for="questionText">Form Description</label>
    <textarea name="formDescription" class="form-control" placeholder="Enter Form Description" id=""></textarea>
  </div>

  <!-- Container for duplicated forms -->
  <div id="duplicatedForms">
    <!-- Initial form element -->

    <div class="question-form" id="attr_1">

      <div class="form-group">
        <label for="questionType">Select Question Type:</label>
        <select class="form-control" name="questionType[]">
          <option value="short">Short Answer</option>
          <option value="dropdown">Dropdown</option>
          <option value="check">Checkbox</option>
          <option value="radio">Radio</option>
        </select>
      </div>
      <div class="form-group">
        <label for="questionText">Question Text:</label>
        <input type="text" class="form-control" placeholder="Enter question text" name="questionText[]" require>
      </div>

      <!-- Custom field for options -->
      <div class="form-group options-field">
        <label for="options">Options:</label>
        <input type="text" class="form-control" placeholder="Option 1, Option 2, Option 3" name="options[]" require>
      </div>
      <div class="form-group">
        <label for="questionType">Required:</label>
        <select class="form-control" name="required[]">
          <option value="required">Yes</option>
          <option value="">No</option>
        </select>
      </div>
    </div>
  </div>
  <div class="bottomButton">
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php echo form_close();  ?>
    <button type="button" class="btn btn-primary" id="addQuestion" onclick="add_more_attr()">Add Question</button>
  </div>
</div>

<?php
include 'footer.php'
?>