<!DOCTYPE html>
<html>
<head>
  <title>Disable Input Field on Size Limit</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // create input field with size attribute of 3
      const input = $('<input>', { type: 'text', size: 3 });

      // attach event listener to input field for double click
      input.dblclick(function() {
        // remove disabled attribute
        $(this).prop('disabled', false);
      });

      // attach event listener to input field for text input
      input.on('input', function() {
        // disable input field if it reaches size limit
        if ($(this).val().length >= $(this).attr('size')) {
          $(this).prop('disabled', true);
        }
      });

      // add input field to HTML body
      $('body').append(input);
    });
  </script>
</head>
<body>
</body>
</html>