<script>
    $(document).on('click', '.number-spinner button', function () {    
         var btn = $(this),
             oldValue = btn.closest('.number-spinner').find('input').val().trim(),
             newVal = 1;
         
         if (btn.attr('data-dir') == 'up') {
             newVal = parseFloat(oldValue) + 0.1;
             newVal = newVal.toFixed(2);
         } else {
             if (oldValue > 1) {
                 newVal = parseFloat(oldValue) - 0.1;
                 newVal = newVal.toFixed(2);
                 
             } else {
                 newVal = 0;
             }
         }
         btn.closest('.number-spinner').find('input').val(newVal);
     });
 
 </script>
  
 