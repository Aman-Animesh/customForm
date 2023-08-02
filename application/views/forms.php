<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $formData['formTitle'];  ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
  body {
    background-color: #f5e8e1;
  }

  .container {
    display: flex;
    justify-content: center;
  }
</style>

<body>

  <div class="container mt-5">
    <div class="card w-50">
      <div class="card-header">
        <h5><?php echo $formData['formTitle'];  ?></h5>
        <p><?php echo $formData['formDescription'];  ?></p>
      </div>
      <div class="card-body">
        <?php echo form_open('form-Action');

        $form = "";
        foreach ($formData['question'] as $key => $value) {
          switch ($value[0]) {
            case 'short':
              $form .= '<div class="form-group mb-3">
              <label for="questionText" class ="mb-2">' . $value[1] . '</label>
              <input type="text" name="' . $value[1] . '" class="form-control" placeholder ="Enter your ' . $value[1] . '" ' . $value[3] . ' />
</div>';
              break;
            case 'dropdown':
              $option = "";
              foreach ($value[4] as $key => $opt) {
                $option .=  '<option value="' . $opt . '">' . $opt . '</option>';
              }
              $form .= '<div class="form-group mb-3">
<label for="questionType" class ="mb-2">' . $value[1] . '</label>
<select class="form-control" name="' . $value[1] . '">
' . $option . '
</select>
</div>';
              break;
            case 'check':
              $option = '<label for="questionType" class ="mb-2">' . $value[1] . '</label>';
              foreach ($value[4] as $key => $opt) {
                $option .=  '<div class="input-group mb-3"><div class="input-group-text"><input class="form-check-input mt-0" type="checkbox" value ="' . $opt . '"  name="' . $value[1] . '" id="" /></div> &nbsp;<label for="questionType">' . $opt . '</label></div>';
              }
              $form .= $option;
              break;
            case 'radio':
              $option = '<label for="questionType" class ="mb-2">' . $value[1] . '</label>';
              foreach ($value[4] as $key => $opt) {
                $option .=  '<div class="input-group mb-3"><div class="input-group-text"><input class="form-check-input mt-0" type="radio" value ="' . $opt . '" name="' . $value[1] . '" id="" /></div> &nbsp;<label for="questionType">' . $opt . '</label></div>';
              }
              $form .= $option;
              break;
          }
        }
        echo $form;


        ?>
        <input type="hidden" name="formId" value="<?= $formData['formId'] ?>">
        <button type="submit" class=" btn btn-success">Submit</button>
        <button type="reset" class=" btn btn-danger">Clear</button>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</body>

</html>