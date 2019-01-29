<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <div class="container"><br><br>
        <div class="form-group">
          <label for="country">Country</label>
          <select class="form-control" id="country">
            <option>--select--</option>
            <?php foreach($countries as $country): ?>
              <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="state">State</label>
            <select class="form-control" id="state">
              <option>--select--</option>
            </select>
        </div>

        <div class="form-group">
          <label for="city">City</label>
            <select class="form-control" id="city">
              <option>--select--</option>
            </select>
        </div>

      </div><!-- container close -->

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
        $(document).ready(function(){

            // Fetching states
            $("#country").change(function(){
                var id = $("#country").val();
                $.ajax({
                    url: "<?php echo base_url('welcome/states'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    cache: false,
                    success: function(data) {
                        $("#state").append(data);
                    }
                });
            });

            // Fetching cities
            $("#state").change(function(){
                var id = $("#state").val();
                $.ajax({
                    url: "<?php echo base_url('welcome/city'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    cache: false,
                    success: function(data) {
                        $("#city").append(data);
                    }
                });
            });
        });
      </script>
  </body>
</html>