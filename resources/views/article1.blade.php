@extends('layouts.home-layout')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <div class="blog-details-section spad">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-8 mt-5">
                    <div class="blog-details-text">
                        <div class="blog-details-title mt-5">
                            <h2 class="mt-5" style="color: white">Physical Fitness Can Help Prevent Depression and Anxiety
                            </h2>
                            <p class="mt-3">Published on {{ date('F j, Y') }}</p>
                            <p>By Fitness Center Team</p>
                        </div>



                        <div class="blog-details-desc">
                            <p>In today's fast-paced world, mental health issues like depression and anxiety are becoming
                                increasingly common. However, research continues to show that regular physical activity can
                                be a powerful tool in preventing and managing these conditions.</p>
                        </div>

                        <div class="blog-details-more-desc">
                            <h4>The Science Behind Exercise and Mental Health</h4>
                            <p>Multiple studies have demonstrated that regular exercise can be as effective as medication
                                for some individuals in treating mild to moderate depression. Physical activity triggers the
                                release of endorphins - the body's natural mood elevators - while also reducing levels of
                                stress hormones like cortisol.</p>

                            <p>Exercise also promotes neural growth in the brain, reduces inflammation, and creates new
                                activity patterns that promote feelings of calm and well-being. The benefits extend beyond
                                just the biological effects - achieving fitness goals can boost self-esteem and provide a
                                sense of accomplishment.</p>

                            <h4>How Much Exercise is Needed?</h4>
                            <p>You don't need to become a marathon runner to see mental health benefits. Research suggests
                                that:</p>
                            <ul style="color: white">
                                <li>30 minutes of moderate exercise 3-5 times per week can significantly improve depression
                                    and anxiety symptoms</li>
                                <li>Even short 10-15 minute bursts of activity can provide immediate mood-boosting effects
                                </li>
                                <li>Consistency is more important than intensity - regular movement is key</li>
                            </ul>

                            <h4>Best Exercises for Mental Health</h4>
                            <p>While any physical activity is beneficial, some exercises are particularly effective:</p>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="ci-text">
                                        <h5>Aerobic Exercise</h5>
                                        <p>Running, swimming, cycling - these activities increase heart rate and oxygen
                                            circulation, triggering endorphin release.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="ci-text">
                                        <h5>Yoga & Tai Chi</h5>
                                        <p>These mind-body practices combine physical movement with breath control and
                                            meditation, reducing stress hormones.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="ci-text">
                                        <h5>Strength Training</h5>
                                        <p>Building physical strength often translates to increased mental resilience and
                                            confidence.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="ci-text">
                                        <h5>Group Fitness</h5>
                                        <p>Social interaction combined with exercise provides dual benefits for mental
                                            health.</p>
                                    </div>
                                </div>
                            </div>

                            <h4>Getting Started</h4>
                            <p>If you're new to exercise or dealing with mental health challenges, start small:</p>
                            <ol style="color: white" class="mt-3">
                                <li>Choose activities you enjoy - you're more likely to stick with them</li>
                                <li>Set realistic, achievable goals</li>
                                <li>Establish a routine but remain flexible</li>
                                <li>Consider working with a trainer or joining a class for motivation</li>
                                <li>Be patient - mental health benefits often take 4-6 weeks of consistent exercise</li>
                            </ol>

                            <p class="mt-4">Remember that while exercise is a powerful tool for mental health, it's not a
                                replacement for professional treatment when needed. If you're experiencing severe depression
                                or anxiety, please consult with a healthcare provider.</p>
                        </div>

                        <div class="blog-details-tag-share">
                            <div class="tags">
                                <a>Mental Health</a>
                                <a>Fitness</a>
                                <a>Wellness</a>
                                <a>Prevention</a>
                            </div>
                            <div class="share">
                                <span>Share:</span>
                                {{-- Facebook Share --}}
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                    target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-facebook-f" style="color: #fafafa;"></i>
                                </a>

                                {{-- Twitter Share --}}
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title ?? 'Check out this great article') }}"
                                    target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-twitter" style="color: #ffffff;"></i>
                                </a>

                                {{-- LinkedIn Share --}}
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title ?? '') }}&summary={{ urlencode($post->excerpt ?? '') }}"
                                    target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-linkedin" style="color: #f7f7f8;"></i> </a>

                                {{-- WhatsApp Share --}}
                                <a href="https://wa.me/?text={{ urlencode(($post->title ?? 'Check this out') . ' ' . url()->current()) }}"
                                    target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-whatsapp" style="color: #ffffff;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar-option">
                        <div class="so-categories">
                            <div class="title">
                                <h5>Categories</h5>
                            </div>
                            <ul>
                                <li><a href="https://www.health.com/weight-loss/30-simple-diet-and-fitness-tips">Fitness
                                        Tips <span>></span></a></li>
                                <li><a
                                        href="https://www.helpguide.org/wellness/fitness/the-mental-health-benefits-of-exercise">Mental
                                        Health <span>></span></a></li>
                                <li><a href="https://www.maxhealthcare.in/blogs/women-health-nutrition">Nutrition
                                        <span>></span></a></li>
                                <li><a href="https://www.muscleandstrength.com/workouts/women">Workout Plans
                                        <span>></span></a></li>

                            </ul>
                        </div>

                        <div class="so-latest">
                            <div class="title">
                                <h5 style="color: white">Latest Posts</h5>
                                <div class="latest-large">

                                    <div class="ll-text">
                                        <h5><a href={{ 'article2' }}>Fitness: The best exercise to lose belly fat and
                                                tone up...</a></h5>
                                        <ul>
                                            <li>May 15, 2023</li>

                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="latest-item">
                                <div class="li-pic">

                                </div>

                            </div>
                            <div class="latest-item">
                                <div class="li-pic">

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
