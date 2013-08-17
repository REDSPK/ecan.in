<!DOCTYPE html>
<html lang="en">
<head>
    <script src="<?=base_url('/assets/js/jquery.js')?>"></script>
    <script>
    $(document).ready(function(){
       $('form').submit(function(e){
          e.preventDefault(); 
          var link = $(this).attr('action') ;
          var formData = $(this).serialize();
          $.ajax({
                url:link,
                type:'POST',
                data:formData,
                success: function(result){
                    alert(result.data);
                }
            });
       }); 
    });
    </script>
</head>
<body>
    
<div id="container">
	<div class="row"><h4>Welcome to Mortgage Calculator</h4>
        
	<div id="body">
          <form method="POST" action="index.php/loan/calculateMonthlyPayment" class=".form-horizontal">
                Amount : <input name="loan-amount" type="text" /><br/>
                Duration : <input name="loan-duration" type="text" /> (years)<br/>
                Interest Rate : <input name="interest-rate" type="text" /><br/>
                HOA/Assessment : <input name="assesment" type="text" /><br/>
                Property Taxes : <input name="property-tax" type="text" /><br/>
                Home Insurance : <input name="home-insurance" type="text" /><br/>
                <input type="submit" name="submit" 
                class="btnGreen" value="calculate" />
            </form>
	</div>
</div>

</body>
</html>