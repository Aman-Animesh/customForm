var attr_count = 1;
function add_more_attr() {
	attr_count++;

	var html = ` <div id="duplicatedForms" >
	<!-- Initial form element -->

	<div class="question-form" id="attr_${attr_count}">

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
			<input type="text" class="form-control" placeholder="Enter question text" name="questionText[]">
		</div>

		<!-- Custom field for options -->
		<div class="form-group options-field">
			<label for="options">Options:</label>
			<input type="text" class="form-control" placeholder="Option 1, Option 2, Option 3" name="options[]">
		</div>
		<div class="form-group">
        <label for="questionType">Required:</label>
        <select class="form-control" name="required[]">
          <option value="1">Yes</option>
          <option value="0">No</option>
        </select>
      </div>
	</div>
</div>`;
	jQuery("#duplicatedForms").append(html);
}
