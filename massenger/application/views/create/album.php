<div class="container">
    <section class="row">

    <?php 
    if (isset($albums) && !empty($albums)) {
        foreach($albums as $key => $value) { ?>

            <article class="col-xs-12 col-sm-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="<?php echo base_url().'album/'.$value->id?>"style="color:#781f1d;" title="<?php echo $value->title?>" class="zoom">
                            <img class="thumb" src="<?php echo base_url().'uploads/gallery/'.$value->featured?>" alt="<?php echo $value->title?>" />
                            <span class="overlay">
                                    <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </div>
                    <div class="panel-footer">
                        <h4><a href="<?php echo base_url().'album/'.$value->id?>" style="color:#781f1d;" title="<?php echo $value->title?>"></h4>
                        <span style="float: right">
                           
                            
                            </a>
                        </span>
                    </div>
                </div>
            </article>
        <?php } 
    } else { ?>   
        <h2 class="page-title">No Albums Found!</h2>
    <?php }?>                                         

</section>
</div>


<script>
// maintain height == width of thumbnail
    var imgWidth = $('.panel-body').width();
    $('.thumb').css({'height':imgWidth+'px'});
</script>
