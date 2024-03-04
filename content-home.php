<?php
/**
 * Template Name: Home Page Template
 */

get_header(); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="introduction">
                <?php
                ?>
                <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/akwanza_header_image.png"
                    class="img-fluid" 
                    alt="Wildlife Image"
                    height="400px"
                    width="100%"
                />

                <h2 class="text-center">Wildlife Protection Overview</h2> <!-- Add Bootstrap class to center the heading -->
                <p class="text-center"> <!-- Add Bootstrap class to center the paragraph -->
                    Big Life strives to prevent the poaching of all wildlife within our area
                    of operation. We track and apprehend poachers and collaborate with local
                    prosecutors to ensure that they are punished to the fullest extent of
                    the law. One of the largest employers of local Maasai in the ecosystem,
                    Big Life's community rangers are expertly trained and well-equipped to
                    tackle a variety of wildlife crimes. Since our inception, poaching of
                    all animals has dramatically declined in our area of operation.
                </p>
                <h3 class="text-center">Overview</h3> <!-- Add Bootstrap class to center the heading -->
                <p class="text-center"> <!-- Add Bootstrap class to center the paragraph -->
                    Big Life employs Maasai rangers from local communities who work
                    collaboratively with a vast informer network and a number of tools to
                    undertake a variety of activities including anti-poaching and
                    trafficking, conflict mitigation, community support and much more. The
                    2023 ranger activity in Kenya and Tanzania is summarized below:
                </p>
            </div>
            <div id="chart" class="svg-container"></div>
            
        </div>
    </div>
  
</div>

<?php
