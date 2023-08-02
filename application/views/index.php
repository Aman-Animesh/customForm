<?php
include 'header.php'; ?>
<div class="container-fluid mt-4">
  <table class="table table-responsive-xl table-striped-columns">
    <thead>
      <th>Sl No</th>
      <th>Form No</th>
      <th>Form Title</th>
      <th>Form Description</th>
      <th>Form Url</th>
      <th>Action</th>
    </thead>
    <tbody>

      <?php
      $i = 1;
      if (!empty($forms)) {
        foreach ($forms as $form) { ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $form['formId'] != "" ? "<a href='" . base_url("form-response?id=") . base64_encode($form['formId']) . "'>" . $form['formId'] . "</a>"  : ""; ?></td>
            <td><?= $form['formTitle'] != "" ? $form['formTitle']  : ""; ?></td>
            <td><?= $form['formDescription'] != "" ? $form['formDescription']  : ""; ?></td>
            <td><?= $form['formUrl'] != "" ? "<a href='" . base_url() . $form['formUrl'] . "'>Link</a>" : ""; ?></td>
            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
          </tr>
      <?php }
      }
      ?>

    </tbody>
  </table>
</div>
<?php include 'footer.php' ?>