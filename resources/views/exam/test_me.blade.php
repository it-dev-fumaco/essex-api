<html lang="en">
<head>
  <meta charset="utf-8">
  <title>change demo</title>
  <style>
  div {
    color: red;
    font-size: 50px;
    font-family: 'century gothic';
  }
  .haha {
    font-size: 50px;
    font-family: 'century gothic';    
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
<select class="haha" name="sweets" multiple>
  <option>Chocolate</option>
  <option>Candy</option>
  <option>Taffy</option>
  <option>Caramel</option>
  <option>Fudge</option>
  <option>Cookie</option>
</select>
<div></div>
 
<script>
$( "select" )
  .change(function () {
    var str = "";
    $( "select option:selected" ).each(function() {
      str += $( this ).text() + " ";
    });
    $( "div" ).text( str );
  })
  .change();
</script>
 
</body>
</html>