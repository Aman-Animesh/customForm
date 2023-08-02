<?php
include 'header.php'; ?>
<div class="container mt-4">
  <table class="table table-responsive-xl table-striped-columns">
    <thead>
      <th>Sl No</th>
      <th>Response</th>
    </thead>
    <tbody>

      <?php
      $k = 1;
      if (!empty($formData)) {
        foreach ($formData as $key => $form) { ?>
          <tr>
            <td><?= $k++; ?></td>
            <td>
              <?php
              for ($i = 0; $i < sizeof($form['response']) - 1; $i++) { ?>
                <?php echo $form['response'][$i][0] . " = " . $form['response'][$i][1];
                ?>
                <br>
              <?php }
              ?>
            </td>
          </tr>
      <?php }
      }
      ?>

    </tbody>
  </table>
</div>
<?php include 'footer.php' ?>