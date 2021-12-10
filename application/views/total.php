<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Totals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1></h1>
    <div class="container-sm">
        <table class="table">
  <thead>
    <tr>
       
      <th scope="col">Produse</th>
      <th scope="col">Pret</th>
      <th scope="col">Cantitate</th>
      <th scope="col">total fara tva</th>
      <th scope="col">total cu tva</th>
    </tr>
  </thead>
  <tbody>

    <?php
	
      $json_data = $this->db->get('mytable');

      foreach($json_data->result() as $data)
      { 
         
          $total_price= $data->price;
          $total_qty = $data->qty;
          $vat= $data->vat_percentage;
          $total_fara_vat = $total_price *$total_qty;
          $total_cu_vat = $total_fara_vat + ($total_fara_vat*$vat);

    ?>
    <tr>
       
      <td><?= $data->description  ?></td> 
      <td><?= $data->price ?></td> 
      <td><?= $data->qty ?></td> 
      <td><?=   $total_fara_vat ?></td>
      <td><?=  $total_cu_vat  ?></td>
    </tr>

    <?php 
       }

	?>

    
  </tbody>
</table>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>