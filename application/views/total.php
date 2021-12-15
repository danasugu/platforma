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
       
      <th scope="col">Invoice number</th>
      <th scope="col">Invoice prefix</th>
      <th scope="col" colspan="3">Line 1</th>
      <th scope="col" colspan="3">Line 2</th>
      <th scope="col" colspan="3">Line 3</th>
      <th scope="col">VAT</th>
 
    </tr>
    <tr>
      <td width="61">&nbsp;</td>
      <td width="56">&nbsp;</td>
      <td width="81">
      <p>Description</p>
      </td>
      <td width="43">
      <p>price</p>
      </td>
      <td width="33">
      <p>qty</p>
      </td>
      <td width="81">
      <p>Description</p>
      </td>
      <td width="43">
      <p>price</p>
      </td>
      <td width="33">
      <p>qty</p>
      </td>
      <td width="81">
      <p>Description</p>
      </td>
      <td width="43">
      <p>price</p>
      </td>
      <td width="33">
      <p>qty</p>
      </td>
      <td width="53">&nbsp;</td>
      </tr>
  </thead>
  <tbody>

    <?php
    

      $this->db->join('invoices_lines', 'invoices.id = invoices_lines.invoice_id');       
      $result = $this->db->get('invoices')->result_array();
      return $result;
      
      // $json_data = $this->db->get('invoices');

      foreach($result->result() as $invoice)
      { 
         
          $total_price= $invoice->price;
          $total_qty = $result->qty;
          $vat= $result->vat_percentage;
          $total_fara_vat = $total_price *$total_qty;
          $total_cu_vat = $total_fara_vat + ($total_fara_vat*$vat);

    ?>
    <tr>
       
      <td><?= $invoice->description  ?></td> 
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