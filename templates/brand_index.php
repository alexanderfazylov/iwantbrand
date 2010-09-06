<html>
<head>
  <title>Brands</title>
</head>
<body>
  <a href="/brands/create">Создать</a>
  
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Date changed</th>
      <th>Date created</th>
    </tr>
    <?php
      foreach($brands as $brand) {
        echo '
          <tr>
            <td>' . $brand['id'] . '</td>
            <td>' . $brand['name'] . '</td>
            <td>' . $brand['created'] . '</td>
            <td>' . $brand['changed'] . '</td>
          </tr>
        ';
      }
    ?>
  </table>
</body>
</html>