<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChartGPT table</title>
<style>
  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
  }

  th,
  td {
    padding: 8px;
    text-align: left;
  }

  thead {
    background-color: #f2f2f2;
  }

  @media screen and (max-width: 600px) {
    /* 画面幅が600px以下の場合 */
    table,
    thead,
    tbody,
    th,
    td,
    tr {
      display: block;
    }
    th {
      display: none;
    }
    td {
      border: none;
      position: relative;
      padding-left: 50%;
    }
    td:before {
      position: absolute;
      top: 6px;
      left: 6px;
      width: 45%;
      padding-right: 10px;
      white-space: nowrap;
      content: attr(data-title);
      font-weight: bold;
    }
  }
</style>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>Header 1</th>
        <th>Header 2</th>
        <th>Header 3</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Cell 1-1</td>
        <td>Cell 1-2</td>
        <td>Cell 1-3</td>
      </tr>
      <tr>
        <td>Cell 2-1</td>
        <td>Cell 2-2</td>
        <td>Cell 2-3</td>
      </tr>
      <tr>
        <td>Cell 3-1</td>
        <td>Cell 3-2</td>
        <td>Cell 3-3</td>
      </tr>
    </tbody>
  </table>
</body>
</html>