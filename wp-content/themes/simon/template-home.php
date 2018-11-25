<?php
/*
Template Name: Home Page
*/
get_header();?>
<section id="content" role="main">

    <div class="row meSection">
        <div class="titleBar">
            <h1>Simon Li</h1>
        </div>
        <div class="column small-12 medium-6">
            <div class="row">
                <div class="column small-3"></div>
                <div class="column small-9">
                    <ul class="tabs vertical" data-tab>
                        <li class="tab-title active"><a href="#me01"><?php the_field('section1',16) ?></a></li>
                        <li class="tab-title"><a href="#me02"><?php the_field('section2',16) ?></a></li>
                        <li class="tab-title"><a href="#me03"><?php the_field('section3',16) ?></a></li>
                        <li class="tab-title"><a href="#me04"><?php the_field('section4',16) ?></a></li>
                        <li class="tab-title"><a href="#me05"><?php the_field('section5',16) ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="column small-12 medium-5 end">
            <div class="tabs-content meContent">
                <div class="content active" id="me01">
                  <p><?php the_field('copy1',16) ?></a></li></p>
                </div>
                <div class="content" id="me02">
                  <p><?php the_field('copy2',16) ?></p>
                </div>
                <div class="content" id="me03">
                  <p><?php the_field('copy3',16) ?></p>
                </div>
                <div class="content" id="m304">
                  <p><?php the_field('copy4',16) ?></p>
                </div>
                <div class="content" id="me05">
                  <p><?php the_field('copy5',16) ?></p>
                </div>
            </div>
        </div>
    </div>
    <!--        Temporarily skipping Skills section, seems redundant if I'm sending out resumes. Prioritizing Portfolio section
    <div class="row fullWidth skillsSection">
        <div class="skillTitle"><h2>Skillsets</h2></div>
        
        <div class="row skillTable">
            <div class="column small-2">
                <ul class="tabs vertical" data-tab>
                    <li class="tab-title active"><a href="skill01"><?php the_field('section1',16) ?></a></li>
                    <li class="tab-title"><a href="#skill02"><?php the_field('section2',16) ?></a></li>
                    <li class="tab-title"><a href="#skill03"><?php the_field('section3',16) ?></a></li>
                    <li class="tab-title"><a href="#skill04"><?php the_field('section4',16) ?></a></li>
                    <li class="tab-title"><a href="#skill05"><?php the_field('section5',16) ?></a></li>
                </ul>
            </div>
            
            <div class="column small-10">Skill Breakdown</div>
        </div>
    </div> -->
    
    <div class="row fullWidth workSection">
        <h2>Case Studies / Portfolio</h2>
        <div class="column slider">
            <div class="owl-portfolio">
                <?php
                $args = array( 'post_type' => 'caseStudy', 'posts_per_page' => -1);
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                ?>
                
                <div class="row">
                    <div class="column small-12 medium-6 caseScreen">
                        <?php
                        $image = get_field('screenshot');
                        if( !empty($image) ): 
                            $url = $image['url'];
                            $alt = $image['alt'];
                            endif; ?>
                            
                        <img src="<?php echo $url; ?>">
                    </div>
                    <div class="column small-12 medium-6 caseCopy">
                        <h3 class="caseTitle"><?php the_field('name')?></h3>
                        <p class="caseDescriptsion"><?php the_field('description')?></p>
                    </div>
                </div>     
                <?php
                endwhile;
                wp_reset_postdata(); ?>
                <br>
            </div>
        </div>
    </div>
    
    <div class="row portfolioSection">
        <div class="slidersheretoo">
            Sliders! Portfolio custom post type, hash out details and interaction... interior page? lightbox? hmm.
        </div>
    </div>
    
    <div class="row contactSection fullWidth">
        <div class="gMapsBackground">
            <h2 class="gmapsH2">Contact</h2>
        </div>
        
        <div class="row contactInfo">
            <div class="column small-12 medium-9">
                Contact things and form goes here
            </div>
            <div class="column small-12 medium-3 socialMedia">
                <h2>Social</h2>
                <div class="small-4 socialButton">Twitter</div>
                <div class="small-4 socialButton">LinkedIn</div>
                <div class="small-4 socialButton">Flickr</div>
            </div>
        </div>
        
        <div class="instagramContact">
            Instagram code here
        </div>
    </div>


</section>
<?php get_footer(); ?>