<?php
    get_header();
    $options = get_option('simple_wp');
?>
    <div class="clear"></div>
    
    <!-- PAGE : STARTS -->
    <section class="page-section">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="container">
                        <div class="row">
                          <article class="span12 text-center">
                            <h1 class="main-heading  fx fx-fadeInLeftBig"><?php echo $options['err_title']; ?></h1>
                            <h2 class="sub-heading highlight fx fx-fadeInRightBig"><span><?php echo $options['err_sub_title']; ?></span></h2>
                          </article>
                        </div>

                        <div class="row add-top add-bottom fx fx-fadeInLeftBig">
                          <article class="span10 offset1 text-center">
                              <p class="promo-text dark-txt"><?php echo $options['err_promo_txt']; ?></p>
                          </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PAGE : ENDS -->
    <div class="clear"></div>
    

<?php
  get_footer();
?>