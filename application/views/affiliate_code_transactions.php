<h4>Transactions for code</h4>
<link href="<?php echo base_url().'../assets/css/jquery.jqplot.min.css' ?>" rel="stylesheet">
<script src="<?php echo base_url().'../assets/js/jquery.jqplot.js' ?>"></script>
<script src="<?php echo base_url().'../assets/js/jqplot.dateAxisRenderer.min.js' ?>"></script>
<script>
$(function()
{
    $.ajax({
         url : 'get_specific_code_graph?code_id='+<?=$_GET['code_id']?>,
         type:'GET',
         success:function(data)
         {
//             console.log(data);
             var line1 = [['2008-09-30 4:00PM',4], ['2008-10-30 4:00PM',6.5], ['2008-11-30 4:00PM',5.7], ['2008-12-30 4:00PM',9], ['2009-01-30 4:00PM',8.2]];
             console.log(line1);
             console.log(data);
             var plot2 = $.jqplot('chartdiv', [data], {
                axes:{
                    xaxis:{renderer:$.jqplot.DateAxisRenderer},
                    yaxis: {tickOptions:{prefix: '$'}}
                },
                series:[{lineWidth:3, markerOptions:{style:'circle'}}] 
             });
         }
      });
});
</script>





<div id="chartdiv" style="height:250px;width:100%; "> </div>

<div id="table-container">
    <table width="100%" border="0" cellpadding="5" cellspacing="5" class='table table-striped'>
        <th width="7%" align="center" bgcolor="#39396C"><p>User Id</p></th>
        <th width="7%" align="center" bgcolor="#39396C"><p>Product</p></th>
        <th width="7%" align="center" bgcolor="#39396C"><p>Your Cut</p></th>
    <?
    foreach($transactions as $transaction)
    {
    ?>
    <tr>
        <td><?=$transaction->user_id?></td>
        <td><?=$transaction->product_id?></td>
        <td><?=$transaction->affiliate_percentage_from_transaction?></td>
        
    </tr>
    <?
    }
    ?>
    </table>
</div>