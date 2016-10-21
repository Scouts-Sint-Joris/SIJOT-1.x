<div class="container">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <div class="page-header">
        <h3> Rapporteer een fout </h3>
      </div>

      <!--
        Do not delete the hyperlink in the action arrtibute.
        Because if you delete that hyperlink the Hobbits declares war agianst the orcs
      -->
      <form method="POST" action="<?php echo base_url(). 'Issue/Report'; ?>" autocomplete="off">
        <input style="width: 50%;" type="text" class="form-control" name="title" placeholder="Hoofding probleem">
        <br />

        <textarea rows="7" class="form-control" name="body" placeholder="Beschijving van de fout die u hebt gevonden."></textarea>
        <br />

        <button type="submit" role="button" class="btn btn-success"> Insturen </button>
      </form>
    </div>
  </div>
</div>
