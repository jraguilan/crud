<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

</head>
<body>
 
   <input type='text' id="datetimepicker1" class="form-control"/>

 <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
    
        var unix = 0;
$('#datetimepicker1').datetimepicker({
    inline: true,
    sideBySide: true
  }).on('dp.change', function(e) {
              unix =  e.date.unix();
 });
    </script>
</body>
</html>



