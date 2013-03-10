<h4>Welcome Admin</h4>
<div class ='pagination pagination-centered'>
<style>
.popup{
	padding: 3px 40px 17px 19px;
	background-color: #FAFAFA;
	background-image: -moz-linear-gradient(top, white, #F2F2F2);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(white), to(#F2F2F2));
	background-image: -webkit-linear-gradient(top, white, #F2F2F2);
	background-image: -o-linear-gradient(top, white, #F2F2F2);
	background-image: linear-gradient(to bottom, white, #F2F2F2);
	background-repeat: repeat-x;
	border: 1px solid #D4D4D4;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffffff', endColorstr='#fff2f2f2', GradientType=0);
	-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
	-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
}
#delete-topic-title {
	margin-bottom: 19px;
}
</style>
<script>
$(function(){
    $('.delete_employee').live('click',function(e){
        e.preventDefault();
        $('#confirm-delete-popup').lightbox_me({
            centered: true 
        });
        $('#delete-topic-title').html('<strong> Delete '+$(this).attr('id')+' ?? </strong>');
        link = $(this).attr('href');
        $('#btn-confirm-delete').on('click',function(e){
            deleteUser(link);
            $('.popup').trigger('close');
        });
    });
    
    $('.confirm-employee').live('click',function(e){
        e.preventDefault();
        $('#confirm-employee-popup').lightbox_me({
            centered: true 
        });
        $('#confirm-employee-title').html('<strong> Confirm '+$(this).attr('id')+' ?? </strong> <br/>');
        
        link1 = $(this).attr('href');
        $('#btn-confirm-employee').on('click',function(e){
            makeEmployee(link1,1);
            $('.popup').trigger('close'); 
        });
    });
    
    $('.remove-employee').live('click',function(e){
        e.preventDefault();
        $('#remove-employee-popup').lightbox_me({
            centered: true 
        });
        $('#remove-employee-title').html('<strong> Confirm '+$(this).attr('id')+' ?? </strong> <br/>');
        link2 = $(this).attr('href');
        $('#btn-remove-employee').live('click',function(e){
            makeEmployee(link2,0);
            $('.popup').trigger('close'); 
        });
    });
    
    $('.award-credits').live('click',function(e){
        e.preventDefault();
        $('#add-credits-popup').lightbox_me({
            centered: true 
        });
        link3 = $(this).attr('href');
        $('#btn-award-credits').live('click',function(){
            awardCredits(link3,$('.item_type').val());
//            $('.popup').trigger('close');
        });
    });
    
    $('.cancel').on('click',function(){
        $('.popup').trigger('close'); 
    });
    
    $('.search_form').on('submit',function(e){
        e.preventDefault();
        var destUrl = $(this).attr('action');
        $.ajax({
            url: destUrl,
            type: 'POST',
            data: $(this).serialize(),
            success:function(data){
                $('#table-container').html(data);
            }
        });
    })
});

function deleteUser(link){
    console.log(link);
}

function makeEmployee(link,isUser) {
    $.ajax({
        url: link+'/'+isUser,
        type: 'GET',
        success:function(data){
            location.reload();
        }
    });
}

function awardCredits(link,numCredits){
    $.ajax({
        url: link+'/'+numCredits,
        type: 'GET',
        success:function(data){
            location.reload();
        }
    });
}
</script>
<form class="form-inline search_form" action="search_user" method="POST">
    <select name="search_criteria">
        <option value="<?=SEARCH_BY_USERNAME?>">By Username</option>
        <option value="<?=SEARCH_BY_EMAIL?>">By Email</option>
    </select>
    <input type="text" placeholder="Email or Username" name="phrase" />
    <button type='submit' class="btn btn-inverse">Search</button>
</form>
<?php
if($record){
    echo "<div id='table-container'>";
    echo "<table class='table table-striped'>";
    echo "<th>First Name</th>
          <th>Last Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Credits</th>
          <th>Type</th>
          <th>Joined</th>
          <th>Admin</th>";
    foreach ($record as $h):
        echo "<tr id='$h->username'>
                    <td>$h->first_name</td>
                    <td>$h->last_name</td>
                    <td>$h->username</td>
                    <td>$h->email_address</td>
                    <td>$h->credits</td>
                    <td>";
                            if($h->user_type)
                                echo "Employee";
                            else
                                echo "End User";
              echo "</td>
                    <td>$h->date_joined</td>
                    <td>
                      <a href='delete_user?id=$h->username' class='delete_employee' id='$h->username'>Delete</a> | ";
                      if($h->user_type == END_USER_TYPE){
                        echo "<a href='make_employee/$h->username' class='confirm-employee' id='$h->username'>Make Employee</a> | ";
                      }
                      else {
                          echo "<a href='make_employee/$h->username' class='remove-employee' id='$h->username'>Make End User</a> | ";
                      }
                      echo "<a href='add_credits/$h->username' class='award-credits'>Credits</a>
                    </td>
               </tr>";
    endforeach;
    if(isset($this->pagination)) {
        echo $this->pagination->create_links();
    }
    echo "</div>";
}
else
{
	echo "No user to show";
}
?>
</div>

    <div id="confirm-delete-popup" class="popup" style="display: none;">
        <legend>Confirm Delete</legend>
        <div id="delete-topic-title"></div>
        <button class="btn btn-danger" id="btn-confirm-delete">Confirm</button>
        <button class="btn cancel" >Cancel</button>
    </div>

    <div id="confirm-employee-popup" class="popup" style="display: none;">
        <legend>Confirm Employee??</legend>
        <div id="confirm-employee-title"></div>
        <button class="btn btn-success" id="btn-confirm-employee">Confirm</button>
        <button class="btn cancel" >Cancel</button>
    </div>

    <div id="remove-employee-popup" class="popup" style="display: none;">
        <legend>Remove Employee??</legend>
        <div id="remove-employee-title"></div>
        <button class="btn btn-danger" id="btn-remove-employee">Confirm</button>
        <button class="btn cancel" >Cancel</button>
    </div>
    
    <div id="add-credits-popup" class="popup" style="display: none;">
        <legend>Add Credits</legend>
        <div id="add-credits-title"></div>
        <form class="form-inline">
            <select name="item_type" class="item_type">
                <option value="<?=ECAN500_PRODUCT_NAME?>"><?=ECAN500_PRODUCT_NAME?></option>
                <option value="<?=ECAN1500_PRODUCT_NAME?>"><?=ECAN1500_PRODUCT_NAME?></option>
                <option value="<?=ECAN2500_PRODUCT_NAME?>"><?=ECAN2500_PRODUCT_NAME?></option>
                <option value="<?=ECAN5000_PRODUCT_NAME?>"><?=ECAN5000_PRODUCT_NAME?></option>
                <option value="<?=ECAN10000_PRODUCT_NAME?>"><?=ECAN10000_PRODUCT_NAME?></option>
                <option value="<?=ECAN25000_PRODUCT_NAME?>"><?=ECAN25000_PRODUCT_NAME?></option>
                <option value="<?=ECAN50000_PRODUCT_NAME?>"><?=ECAN50000_PRODUCT_NAME?></option>
                <option value="<?=ECAN100000_PRODUCT_NAME?>"><?=ECAN100000_PRODUCT_NAME?></option>
            </select>
            
        </form>
        <button class="btn btn-primary" id="btn-award-credits"> Add Credits </button>
        <button class="btn cancel"> Cancel </button>
        
    </div>

                