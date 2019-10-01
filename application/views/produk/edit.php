<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">    
            
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title"></div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"></div>
            </div>  
            <div class="panel-body" >
              <?php echo form_open_multipart('produk/edit_action/');?>
                <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />   

                    <form  class="form-horizontal" method="post" >
                        <input type='hidden' name='id' value='<?=$key->product->id ?>' />
                  
                        <div id="div_id_username" class="form-group required">
                            <label for="id_username" class="control-label col-md-4  requiredField"> Judul<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="title" placeholder="judul produk" style="margin-bottom: 10px" type="text" value="<?=$key->product->title?>" />
                            </div>
                        </div>
                        <div id="div_id_email" class="form-group required">
                            <label for="id_email" class="control-label col-md-4  requiredField"> Deskripsi<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <textarea class="input-md emailinput form-control" id="id_email" name="body-html" placeholder="deskripsi" style="margin-bottom: 10px" type="email"><?=$key->product->body_html?></textarea>
                            </div>     
                        </div>
                        
                        <div id="div_id_name" class="form-group required"> 
                            <label for="id_name" class="control-label col-md-4  requiredField"> img<span class="asteriskField">*</span> </label> 
                            <div class="controls col-md-8 "> 
                                <img src="<?=$key->product->image->src?>" width="150px;">
                                <input type="text" class="input-md textinput textInput form-control" id="id_name" name="img" placeholder="https://example.jpg" style="margin-bottom: 10px" type="text"  value="<?=$key->product->image->src?>" />
                            </div>
                        </div>
                        <div id="div_id_company" class="form-group required"> 
                            <label for="id_company" class="control-label col-md-4  requiredField"> Harga<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "> 
                                 <input class="input-md textinput textInput form-control" id="id_company" name="price" placeholder="harga" style="margin-bottom: 10px" type="text" value="<?=number_format($key->product->variants[0]->price)?>"/>
                            </div>
                        </div> 
                        <div id="div_id_catagory" class="form-group required">
                            <label for="id_catagory" class="control-label col-md-4  requiredField"> Stok<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "> 
                                 <input class="input-md textinput textInput form-control" id="id_catagory" name="stok" placeholder="stok" style="margin-bottom: 10px" type="text" value="<?=$key->product->variants[0]->inventory_quantity?>" />
                            </div>
                        </div> 
                       
                        <div class="form-group"> 
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="hidden" class="input-md textinput textInput form-control" id="id_catagory"  placeholder="stok" style="margin-bottom: 10px" type="text" />
                                <input type="submit" name="Signup" value="Post" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                                
                            </div>
                        </div> 
                            
                    </form>

                </form>
            </div>
        </div>
    </div> 
</div>
    





</div>            