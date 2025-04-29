@extends('layouts.home-layout')
@section('content')
    <div class="blog-details-section spad">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8 mt-5">
                    <div class="blog-details-text">
                        <div class="blog-details-title mt-5">
                            <h2 style="color: white">Fitness: The Best Exercises to Lose Belly Fat and Tone Up</h2>
                            <p class="mt-4">Published on {{ date('F j, Y') }}</p>
                            <p>By Fitness Center Team</p>
                        </div>



                        <div class="blog-details-desc mt-5">
                            <p>Struggling with stubborn belly fat? You're not alone. While spot reduction isn't possible,
                                certain exercises combined with proper nutrition can help you burn fat overall and tone your
                                abdominal muscles. Here's your ultimate guide to the most effective exercises for losing
                                belly fat and achieving a toned midsection.</p>
                        </div>

                        <div class="blog-details-more-desc">
                            <h4>The Truth About Belly Fat</h4>
                            <p>Before we dive into exercises, it's important to understand that belly fat comes in two
                                types:</p>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="ci-text" style="background: #0a0a0a; padding: 20px; margin-bottom: 20px;">
                                        <h5>Subcutaneous Fat</h5>
                                        <p>The fat you can pinch - located just under the skin. While it may be frustrating,
                                            it's less dangerous than visceral fat.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="ci-text" style="background: #0a0a0a; padding: 20px; margin-bottom: 20px;">
                                        <h5>Visceral Fat</h5>
                                        <p>Deep abdominal fat that surrounds your organs. This type is metabolically active
                                            and linked to health risks.</p>
                                    </div>
                                </div>
                            </div>

                            <p>To effectively reduce belly fat, you need a combination of cardiovascular exercise, strength
                                training, and core work - along with a healthy diet.</p>

                            <h4>The Best Fat-Burning Exercises</h4>
                            <p>These exercises maximize calorie burn to help reduce overall body fat:</p>

                            <div class="class-item">
                                <div class="ci-text">
                                    <span>HIGH INTENSITY</span>
                                    <h4>HIIT Workouts</h4>
                                    <p>High Intensity Interval Training alternates between intense bursts of activity and
                                        fixed periods of less-intense activity or rest. Studies show HIIT can burn more fat
                                        in less time than steady-state cardio.</p>
                                    <a target="_blank"
                                        href="https://www.youtube.com/watch?v=zr08J6wB53Y&ab_channel=PamelaReif"><i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="class-item">
                                <div class="ci-text">
                                    <span>CARDIO</span>
                                    <h4>Rowing</h4>
                                    <p>A full-body workout that engages 85% of your muscles while being low-impact.
                                        Excellent for burning calories and strengthening your core.</p>
                                    <a target="_blank"
                                        href="https://www.youtube.com/watch?v=uqs9A0B6s9U&ab_channel=SunnyHealth%26Fitness"><i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="class-item">
                                <div class="ci-text">
                                    <span>STRENGTH</span>
                                    <h4>Compound Lifts</h4>
                                    <p>Exercises like squats, deadlifts, and overhead presses work multiple muscle groups
                                        simultaneously, boosting metabolism and fat burning.</p>
                                    <a target="_blank"
                                        href="https://www.youtube.com/watch?v=hKzhEM_Y1Q0&ab_channel=KrissyCela"><i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>

                            <h4>Core-Specific Exercises for Toning</h4>
                            <p>While you can't spot-reduce fat, these exercises will strengthen and define your abdominal
                                muscles as you lose fat:</p>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="cs-item">
                                        <span><i class="fa fa-heartbeat"></i></span>
                                        <h4>Plank Variations</h4>
                                        <p>Standard planks, side planks, and plank with shoulder taps engage your entire
                                            core while improving posture.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cs-item">
                                        <span><i class="fa fa-fire"></i></span>
                                        <h4>Hanging Leg Raises</h4>
                                        <p>Advanced move that targets lower abs. Start with knee raises if you're a
                                            beginner.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cs-item">
                                        <span><i class="fa fa-bolt"></i></span>
                                        <h4>Russian Twists</h4>
                                        <p>Works obliques and entire core. Add weight for increased intensity.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cs-item">
                                        <span><i class="fa fa-star"></i></span>
                                        <h4>Ab Wheel Rollouts</h4>
                                        <p>One of the most effective core exercises when performed correctly.</p>
                                    </div>
                                </div>
                            </div>

                            <h4>Sample Weekly Workout Plan</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered" style="background: #0a0a0a; color: #fff;">
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th>Workout</th>
                                            <th>Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Monday</td>
                                            <td>HIIT + Core</td>
                                            <td>30-40 min</td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday</td>
                                            <td>Strength Training (Full Body)</td>
                                            <td>45 min</td>
                                        </tr>
                                        <tr>
                                            <td>Wednesday</td>
                                            <td>Active Recovery (Yoga/Walk)</td>
                                            <td>30 min</td>
                                        </tr>
                                        <tr>
                                            <td>Thursday</td>
                                            <td>Rowing + Core</td>
                                            <td>40 min</td>
                                        </tr>
                                        <tr>
                                            <td>Friday</td>
                                            <td>Strength Training (Lower Focus)</td>
                                            <td>45 min</td>
                                        </tr>
                                        <tr>
                                            <td>Saturday</td>
                                            <td>Circuit Training</td>
                                            <td>30 min</td>
                                        </tr>
                                        <tr>
                                            <td>Sunday</td>
                                            <td>Rest</td>
                                            <td>-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h4>Nutrition Tips for Losing Belly Fat</h4>
                            <p>Exercise alone won't reveal your toned abs. Follow these nutrition guidelines:</p>
                            <ul style="color: white">
                                <li>Focus on whole, unprocessed foods</li>
                                <li>Increase protein intake to preserve muscle</li>
                                <li>Reduce refined carbs and added sugars</li>
                                <li>Stay hydrated - drink plenty of water</li>
                                <li>Manage portion sizes</li>
                                <li>Get enough fiber to stay full</li>
                            </ul>

                            <div class="alert alert-dark mt-5" role="alert"
                                style="background: #7d276d; color: #fff; padding: 15px; border-radius: 0;">
                                <h5>Important Note:</h5>
                                <p>While these exercises will help strengthen your core and burn fat, remember that visible
                                    abs are made in the kitchen. A proper diet is essential for reducing body fat percentage
                                    to reveal toned muscles.</p>
                            </div>
                        </div>

                        <div class="blog-details-tag-share">
                            <div class="tags">
                                <a>Weight Loss</a>
                                <a>Core Workout</a>
                                <a>Fitness</a>
                                <a>Nutrition</a>
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
                                    <i class="fa-brands fa-twitter" style="color: #ffffff;"></i> </a>

                                {{-- LinkedIn Share --}}
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title ?? '') }}&summary={{ urlencode($post->excerpt ?? '') }}"
                                    target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-linkedin" style="color: #f7f7f8;"></i> </a>

                                {{-- WhatsApp Share --}}
                                <a href="https://wa.me/?text={{ urlencode(($post->title ?? 'Check this out') . ' ' . url()->current()) }}"
                                    target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-whatsapp" style="color: #ffffff;"></i> </a>
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
                                <h5 style="color: white">Related Posts</h5>
                            </div>


                            <div class="latest-item">
                                <div class="li-pic">
                                    <img src="{{ asset('img/blog/related-3.jpg') }}" alt="">
                                </div>
                                <div class="li-text">
                                    <h6><a href={{ 'article1' }}>Physical fitness can help prevent depression,
                                            anxiety</a></h6>
                                    <span class="li-time">May 28, 2023</span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
