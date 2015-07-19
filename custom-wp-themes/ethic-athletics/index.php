<?php get_header(); ?>
     

    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <div class="intro-message">
                        <h1>Ethic Athletics </h1>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                        <li>
                                <a href="<?php bloginfo('url');?>/blog" class="btn btn-default btn-lg"><i class="fa fa-comment-o"></i> <span class="network-name">&nbsp;Blog</span></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                            </li>
                            <li>
                                <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-instagram fa-fw"></i> <span class="network-name">Instagram</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                   <?php include('inc/page-form.php'); ?>
                </div>
            </div>

        </div>
        <!-- /.intro-header -->
    </div>


    <!-- Button trigger modal -->
    <button class="btn btn-primary btn-lg share"  title="Share this content" data-toggle="modal" data-target="#myModal">
      <i class="fa fa-share-alt"></i> Share
  </button>

  <!-- Page Content -->





<a  name="services"></a>
<div class="content-section-a">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">EDUCATION</h2>
                <p class="lead">We are passionate about learning and passing on what we know, to improve your performance. Not to mention, we also have some seriously smart friends who are amped to share what they know, with you. Come to one of our events and see for yourself! 
                    Furthermore, if you’re passionate about passing on your expertise and super keen to be one of our seriously smart friends, we’d love to work together, so get in touch.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src=" <?php echo get_template_directory_uri() ?>/img/education.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">PROMOTION</h2>
                    <p class="lead">Do you have an amazing product, service or just keen to host a fitness orientated event? Well, we know a guy, who knows a guy that’s sure to be amped to get your word out there! So, let’s talk about how we can help, to get more fans to your doorstep.</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src=" <?php echo get_template_directory_uri() ?>/img/promotion.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">EQUIPMENT</h2>
                    <p class="lead">Need new gym equipment?  Whether you’re dying  for something state-of-the-art or just looking to modify your current setup, we’ve got the connections.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src=" <?php echo get_template_directory_uri() ?>/img/equipment.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Connect to Ethic Athletics:</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-envelope-o"></i> <span class="network-name">&nbsp; Email</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <div class="container">
        <div class="row">


            <!-- share Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-alt"></i> Share</h4>
                </div>
                <div class="modal-body">
                    <p><a title="Facebook" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x"></i></span></a> <a title="Twitter" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x"></i></span></a> </p>

                    <h2><i class="fa fa-envelope"></i> Newsletter</h2>

                    <p>Subscribe to our Newsletter and stay tuned.</p>

                    <form action="" method="post">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" class="form-control" placeholder="your@email.com">
                      </div>
                      <br />
                      <button type="submit" value="sub" name="sub" class="btn btn-primary"><i class="fa fa-share"></i> Subscribe Now!</button>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php get_footer( );?>