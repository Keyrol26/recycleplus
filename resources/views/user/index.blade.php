@extends('user.master')

@section('content')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
                data-aos="zoom-out">
                <img src="../landing-assets/img/19452.jpg" class="img-fluid animated" alt="">
                <h1>Welcome to <span>RecycePlus</span> : Transforming Waste into Opportunity</h1>
                <p>At RecyclePlus, we’re on a mission to make recycling accessible, impactful, and rewarding. Dive into our
                    comprehensive waste management services and learn how you can contribute to a cleaner environment!</p>
                <div class="d-flex">
                    <a href="#about" class="btn-get-started scrollto">Get Started</a>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-recycle"></i></div>
                            <h4><a href="" class="stretched-link">Sustainable Recycling</a></h4>
                            <p>We ensure responsible recycling of your waste, reducing landfill usage and promoting eco-friendly practices.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                            <h4><a href="" class="stretched-link">Seamless Booking</a></h4>
                            <p>Schedule waste pickups at your convenience through our user-friendly booking platform.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-map"></i></div>
                            <h4><a href="" class="stretched-link">Locate Nearby Centers</a></h4>
                            <p>Discover certified recycling centers near you for quick and responsible waste disposal.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-book"></i></div>
                            <h4><a href="" class="stretched-link">Learn About Recycling</a></h4>
                            <p>Access guides and tips on sustainable waste management to help make greener choices.</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Featured Services Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Learn it!</h2>
                <p>Embrace a Greener Future with 3R: Reuse, Reduce, Recycle</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up">

                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-5">
                        <div class="about-img">
                            <img src="../landing-assets/img/6356816.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <h3 class="pt-0 pt-lg-5">A Cleaner Planet Starts with You: Reuse, Reduce, Recycle for a
                            Sustainable Future</h3>

                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li><a class="nav-link active" data-bs-toggle="pill" href="#about-tab1">Reuse</a>
                            </li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#about-tab2">Reduce</a></li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#about-tab3">Recycle</a></li>
                        </ul><!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="about-tab1">

                                <p class="fst-italic">By reusing products, we can extend their lifecycle and reduce the
                                    need for new resources. From repurposing household items to donating clothes and
                                    electronics, reusing is an easy way to contribute to a sustainable future.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Repurpose Jars and Containers for Storage</h4>
                                </div>
                                <p>Instead of throwing away glass jars and plastic containers, clean them and use them
                                    for storage in the kitchen, office, or even for DIY projects. It reduces the need
                                    for buying new containers and limits waste.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Donate Clothes, Books, and Furniture</h4>
                                </div>
                                <p>Donating old items helps someone in need and keeps perfectly usable items from going
                                    to the landfill. Organizations and thrift shops can give these items a second life.
                                </p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Use Cloth Bags Instead of Plastic Bags</h4>
                                </div>
                                <p>Plastic bags are harmful to the environment. Switching to reusable cloth bags cuts
                                    down on the millions of plastic bags that end up in landfills or polluting oceans
                                    each year.</p>

                            </div><!-- End Tab 1 Content -->

                            <div class="tab-pane fade" id="about-tab2">

                                <p class="fst-italic">Reducing waste means making mindful choices about what we buy and
                                    use. It’s about consuming less, choosing quality over quantity, and being conscious
                                    of packaging and energy consumption.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Choose Products with Minimal Packaging</h4>
                                </div>
                                <p>Products with excessive packaging contribute to waste. Opt for items that use
                                    biodegradable, recyclable, or no packaging to reduce the waste stream. </p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Switch to Energy-Efficient Appliances</h4>
                                </div>
                                <p>Energy-efficient appliances consume less electricity, helping you save on energy
                                    bills while reducing greenhouse gas emissions. It's an investment that benefits both
                                    you and the environment.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Reduce Water Consumption by Taking Shorter Showers</h4>
                                </div>
                                <p>Water conservation is crucial in fighting climate change. Reducing the time spent in
                                    the shower can save thousands of liters of water per year, contributing to resource
                                    conservation.</p>

                            </div><!-- End Tab 2 Content -->

                            <div class="tab-pane fade" id="about-tab3">

                                <p class="fst-italic">Recycling helps turn waste into valuable resources. It reduces
                                    the strain on natural resources and energy needed to produce new materials. Proper
                                    recycling keeps reusable materials out of landfills and in the production cycle.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Separate Recyclables like Paper, Plastic, and Glass
                                    </h4>
                                </div>
                                <p>Properly sorting recyclables ensures they can be processed efficiently. Recycling
                                    centers can transform these materials into new products, reducing the need for raw
                                    materials.
                                </p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Drop Off Electronic Waste at Certified Recycling Centers
                                    </h4>
                                </div>
                                <p>Electronics contain harmful chemicals that should not end up in landfills. Certified
                                    recycling centers can safely dispose of and recycle components, reducing pollution.
                                </p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Ensure Items are Clean and Free from Food Residue Before Recycling
                                    </h4>
                                </div>
                                <p>Recycling items that are dirty or contaminated can ruin batches of recyclable
                                    materials. Clean and properly prepared recyclables increase the likelihood of them
                                    being processed into new products.</p>

                            </div><!-- End Tab 3 Content -->

                        </div>

                    </div>

                </div>

            </div>

        </section><!-- /About Section -->

        {{-- <!-- Clients Section -->
        <section id="clients" class="clients section">

            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="../landing-assets/img/clients/client-1.png" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="../landing-assets/img/clients/client-2.png" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="../landing-assets/img/clients/client-3.png" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="../landing-assets/img/clients/client-4.png" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="../landing-assets/img/clients/client-5.png" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="../landing-assets/img/clients/client-6.png" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                </div>

            </div>

        </section><!-- /Clients Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section">

            <div class="container" data-aos="zoom-out">

                <div class="row g-5">

                    <div
                        class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                        <h3>Alias sunt quas <em>Cupiditate</em> oluptas hic minima</h3>
                        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
                        <a class="cta-btn align-self-start" href="#">Call To Action</a>
                    </div>

                    <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
                        <div class="img">
                            <img src="../landing-assets/img/cta.jpg" alt="" class="img-fluid">
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Call To Action Section -->

        <!-- Onfocus Section -->
        <section id="onfocus" class="onfocus section dark-background">

            <div class="container-fluid p-0" data-aos="fade-up">

                <div class="row g-0">
                    <div class="col-lg-6 video-play position-relative">
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
                    </div>
                    <div class="col-lg-6">
                        <div class="content d-flex flex-column justify-content-center h-100">
                            <h3>Voluptatem dignissimos provident quasi corporis</h3>
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore
                                magna aliqua.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</li>
                                <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in
                                    voluptate velit.</li>
                                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                    storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                            </ul>
                            <a href="#" class="read-more align-self-start"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Onfocus Section --> --}}

        <!-- Features Section -->
        <section id="features" class="features section">

            <div class="container" data-aos="fade-up">

                <ul class="nav nav-tabs row gy-4 d-flex">

                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                            <i class="bi bi-binoculars" style="color: #0dcaf0;"></i>
                            <h4>Why</h4>
                        </a>
                    </li><!-- End Tab 1 Nav -->

                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                            <i class="bi bi-box-seam" style="color: #6610f2;"></i>
                            <h4>How</h4>
                        </a>
                    </li><!-- End Tab 2 Nav -->

                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                            <i class="bi bi-brightness-high" style="color: #20c997;"></i>
                            <h4>Awareness</h4>
                        </a>
                    </li><!-- End Tab 3 Nav -->

                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
                            <i class="bi bi-command" style="color: #df1529;"></i>
                            <h4>Creative Ways</h4>
                        </a>
                    </li><!-- End Tab 4 Nav -->

                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-5">
                            <i class="bi bi-easel" style="color: #0d6efd;"></i>
                            <h4>Impact</h4>
                        </a>
                    </li><!-- End Tab 5 Nav -->

                </ul>

                <div class="tab-content">

                    <div class="tab-pane fade active show" id="features-tab-1">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                                <h3>Overview</h3>
                                <p class="fst-italic">
                                    Recycling plays a vital role in protecting our planet by reducing waste, conserving
                                    resources, and lowering pollution. By understanding its importance, we can make informed
                                    decisions that positively impact the environment.
                                </p>
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> Reduces landfill waste, which takes years
                                        to decompose.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Conserves natural resources like trees,
                                        water, and minerals.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Saves energy: Producing items from recycled
                                        materials uses less energy than from raw materials.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Prevents environmental pollution caused by
                                        improper waste disposal.</li>
                                </ul>
                                <p>
                                    Engaging Fact: “Recycling one aluminum can saves enough energy to power a TV for 3
                                    hours!”
                                </p>
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                <img src="../landing-assets/img/features-1.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 1 -->

                    <div class="tab-pane fade" id="features-tab-2">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>Step-by-Step Process of Recycling</h3>
                                <br>
                                <ul>
                                    <li><i class="bi bi-1-circle-fill"></i> <strong> Collection :</strong> Waste is
                                        collected
                                        from homes, offices, and public spaces.</li>
                                    <li><i class="bi bi-2-circle-fill"></i> <strong>Sorting: </strong>Materials are
                                        separated into
                                        categories (plastics, metals, paper, etc.).</li>
                                    <li><i class="bi bi-3-circle-fill"></i> <strong>Cleaning: </strong>Recyclables are
                                        cleaned to
                                        remove contaminants.</li>
                                    <li><i class="bi bi-4-circle-fill"></i> <strong>Processing: </strong>Items are broken
                                        down into
                                        raw materials (e.g., plastic pellets, paper pulp).</li>
                                    <li><i class="bi bi-4-circle-fill"></i> <strong>Remanufacturing: </strong>These raw
                                        materials are used to create new products.
                                        .</li>
                                </ul>
                                <p>
                                    <strong>Did You Know? </strong> Recycling just 1 ton of paper saves 17 trees and 7,000
                                    gallons of water.
                                </p>
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="../landing-assets/img/features-2.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 2 -->

                    <div class="tab-pane fade" id="features-tab-3">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>Top Mistakes People Make When Recycling:</h3>
                                <br>
                                <ul>
                                    <li><i class="bi bi-1-circle-fill"></i> Throwing dirty containers (e.g., pizza boxes or
                                        food-stained items) into recycling bins.</li>
                                    <li><i class="bi bi-2-circle-fill"></i> Recycling non-recyclables like plastic bags
                                        (take these to special drop-off locations).</li>
                                    <li><i class="bi bi-3-circle-fill"></i> Mixing glass types: Broken glass, mirrors, or
                                        ceramics aren’t recyclable with bottles.</li>
                                    <li><i class="bi bi-3-circle-fill"></i> Forgetting to remove lids from bottles or jars.
                                    </li>
                                </ul>
                                <h3>How to Avoid These Mistakes:</h3>
                                <br>
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> Always rinse containers before recycling.
                                    </li>
                                    <li><i class="bi bi-check-circle-fill"></i> Check local guidelines for specific
                                        recyclable materials.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Use separate bins for different types of
                                        recyclables.</li>
                                </ul>
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="../landing-assets/img/features-3.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 3 -->

                    <div class="tab-pane fade" id="features-tab-4">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>Upcycling Ideas:</h3>
                                <br>
                                <ul>
                                    <li><i class="bi bi-1-circle-fill"></i> <strong> Glass Jars: </strong>Use them as
                                        storage containers or planters.</li>
                                    <li><i class="bi bi-2-circle-fill"></i> <strong>Old Clothes: </strong>Transform them
                                        into cleaning rags or tote bags.</li>
                                    <li><i class="bi bi-3-circle-fill"></i><strong>Plastic </strong>Bottles: Create bird
                                        feeders or garden watering systems.</li>
                                    <li><i class="bi bi-4-circle-fill"></i><strong>Paper: </strong>Turn old newspapers into
                                        wrapping paper or compost.</li>
                                </ul>
                                <h4>Composting Tips:</h4>
                                <p>
                                    Compost organic waste like fruit peels, eggshells, and coffee grounds. This reduces
                                    waste and enriches soil for gardening.
                                </p>
                                <p class="fst-italic">
                                    <strong>Fun Fact:</strong> “Upcycling saves energy by giving old items a new purpose
                                    without breaking them down.”
                                </p>
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="../landing-assets/img/features-4.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 4 -->

                    <div class="tab-pane fade" id="features-tab-5">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h4>Global Recycling Statistics:</h4>
                                <br>
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> Over 300 million tons of plastic waste are
                                        produced annually, yet only 9% is recycled.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Recycling aluminum saves 95% of the energy
                                        compared to producing new aluminum..</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Glass can be recycled endlessly without
                                        losing quality.</li>
                                </ul>
                                <h4>Countries Leading the Way in Recycling:</h4>
                                <br>
                                <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> Germany: Has the highest recycling rate at
                                        66%.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Sweden: Converts 99% of its waste into
                                        energy or recycled materials.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> South Korea: Encourages mandatory food
                                        waste recycling.</li>
                                </ul>
                                <p class="fst-italic"><strong>Call to Action: </strong> “By recycling at home, you join a
                                    global movement toward sustainability!”</p>
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="../landing-assets/img/features-5.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 5 -->

                </div>

            </div>

        </section><!-- /Features Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Process Overview</h2>
                <p>Unforgettable Recycle Getaways Routine</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-5">

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item">
                            <div class="img">
                                <img src="../landing-assets/img/book.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-activity"></i>
                                </div>
                                <a href="" class="stretched-link">
                                    <h3>Schedule a pickup</h3>
                                </a>
                                <p>Select your preferred date and time to home services pickup.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="service-item">
                            <div class="img">
                                <img src="../landing-assets/img/pack.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-broadcast"></i>
                                </div>
                                <a href="" class="stretched-link">
                                    <h3>Pack your bags</h3>
                                </a>
                                <p>Put your hard-to-recycle things into any regular shopping bag.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="service-item">
                            <div class="img">
                                <img src="../landing-assets/img/leave-outside.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-easel"></i>
                                </div>
                                <a href="" class="stretched-link">
                                    <h3>Leave them outside</h3>
                                </a>
                                <p>Leave the bag/s outside your house for us to collect on pickup day.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->
                </div>
            </div>

        </section><!-- /Services Section -->

        <!-- Testimonials Section -->
        <section id="bookingform" class="testimonials section" style="fade">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Booking Form</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            {{-- <img src="../assets/images-bg/form-bg.jpg" class="testimonials-bg" alt=""> --}}

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="card-body">
                    <link rel="stylesheet" href="../../assets/css/hope-ui-edit.min.css" />
                    <form method="POST" action="{{ route('storebooking') }}" enctype="multipart/form-data"
                        id="form-wizard1" class="mt-3 text-center">
                        @csrf
                        @method('POST')
                        <ul id="top-tab-list" class="p-0 row list-inline">
                            <li class="mb-2 col-lg-3 col-md-6 text-start active" id="account">
                                <a href="javascript:void();">
                                    <div class="iq-icon me-3">
                                        <svg class="svg-icon icon-20" xmlns="http://www.w3.org/2000/svg" width="20"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <span class="dark-wizard">Details</span>
                                </a>
                            </li>
                            <li id="personal" class="mb-2 col-lg-3 col-md-6 text-start ">
                                <a href="javascript:void();">
                                    <div class="iq-icon me-3">
                                        <i class="bi bi-calendar-plus"></i>
                                    </div>
                                    <span class="dark-wizard">Date and Time</span>
                                </a>
                            </li>
                            <li id="payment" class="mb-2 col-lg-3 col-md-6 text-start">
                                <a href="javascript:void();">
                                    <div class="iq-icon me-3">
                                        <i class="bi bi-recycle"></i>
                                    </div>
                                    <span class="dark-wizard">Waste Information</span>
                                </a>
                            </li>
                            <li id="confirm" class="mb-2 col-lg-3 col-md-6 text-start">
                                <a href="javascript:void();">
                                    <div class="iq-icon me-3">
                                        <svg class="svg-icon icon-20" xmlns="http://www.w3.org/2000/svg" width="20"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span class="dark-wizard">Confirm</span>
                                </a>
                            </li>
                        </ul>
                        <fieldset>
                            <div class="form-card text-start">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Personal Information:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 1 - 4</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Full Name: *</label>
                                            <input type="text"
                                                class="form-control my-input @error('name') is-invalid @enderror"
                                                name="name" placeholder="Full Name" id="name"
                                                value="{{ Auth::user()->name }}" style="color: black;" />
                                            <span id="nameError" class="text-danger"></span>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Contact No.: *</label>
                                            <input type="text"
                                                class="form-control @error('phoneno') is-invalid @enderror" name="phoneno"
                                                placeholder="eg. 012-3456789" id="phoneno" style="color: black;"
                                                value="{{ Auth::user()->userprofile->phoneno }}" />
                                            <span id="phonenoError" class="text-danger"></span>
                                            @error('phoneno')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Alternate Contact No. : *</label>
                                            <input type="text"
                                                class="form-control @error('altphoneno') is-invalid @enderror"
                                                name="altphoneno" placeholder="eg. 012-3456789" id="altphoneno"
                                                style="color: black;" value="{{ old('altphoneno') }}" />
                                            <span id="altphonenoError" class="text-danger"></span>
                                            @error('altphoneno')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css"
                                        rel="stylesheet" />
                                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Address</label>
                                            <select id="address" name="address_id" class="form-control"
                                                style="white-space: pre-wrap; color: black;" required>
                                                <option value="">
                                                    Select
                                                    a Address...*</option>
                                                @if ($fulladdress->isNotEmpty())
                                                    @foreach ($fulladdress as $address)
                                                        <option value="{{ $address['id'] }}"
                                                            style="white-space: pre-wrap; font-size: 14px;">
                                                            Label: {{ $address['label'] }},
                                                            {{ $address['address'] }}
                                                            {{-- Label: {{ $address['label'] }}
                                                            &#10;Address: {{ $address['address'] }} --}}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="" disabled>No addresses available</option>
                                                @endif
                                            </select>
                                        </div>
                                        <span id="addressError" class="text-danger"></span>
                                        @error('pickuptime')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Add New Address</label>
                                            <button class="btn btn-outline-primary d-flex align-items-center"
                                                type="button" data-bs-toggle="modal" data-bs-target="#addLocationModal">
                                                <i class="bi bi-house-add me-1"></i> Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="btn1st" class="btn btn-primary next action-button float-end"
                                value="Next">Next</button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card text-start">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Pickup Date and Time:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2 - 4</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Pickup Date: *</label>
                                            <input type="date"
                                                class="form-control @error('pickupdate') is-invalid @enderror"
                                                id="pickupdate" name="pickupdate" style="color: black;"
                                                min="{{ \Carbon\Carbon::tomorrow()->toDateString() }}" />
                                            <span id="pickupdateError" class="text-danger"></span>
                                            @error('pickupdate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Pickup Time: *</label>
                                            <select id="pickuptime" name="pickuptime" aria-label="Select a Pick-Up Time"
                                                data-control="select2" data-placeholder="Select a Pick-Up Time..."
                                                class="form-select" required style="color: black;">
                                                <option value="" disabled selected hidden class="placeholder">Select
                                                    a Pick-Up Time...*</option>
                                            </select>
                                            <span id="pickuptimeError" class="text-danger"></span>
                                            @error('pickuptime')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" name="next" class="btn btn-primary next action-button float-end"
                                value="Next">Next</button>
                            <button type="button" name="previous"
                                class="btn btn-dark previous action-button-previous float-end me-1"
                                value="Previous">Previous</button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card text-start">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Waste Information:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 3 - 4</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Type of Item: *</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="paper" name="paper">
                                                <label class="form-check-label" for="paper">
                                                    Paper
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="plastic" name="plastic">
                                                <label class="form-check-label" for="plastic">
                                                    Plastic
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="electronic" name="electronic">
                                                <label class="form-check-label" for="electronic">
                                                    Electronic
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="aluminium" name="aluminium">
                                                <label class="form-check-label" for="aluminium">
                                                    Aluminium
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="steel" name="steel">
                                                <label class="form-check-label" for="steel">
                                                    Steel
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="cardboard" name="cardboard">
                                                <label class="form-check-label" for="cardboard">
                                                    Cardboard
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="textiles" name="textiles">
                                                <label class="form-check-label" for="textiles">
                                                    Textiles
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="metal" name="metal">
                                                <label class="form-check-label" for="metal">
                                                    Metal
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="glass" name="glass">
                                                <label class="form-check-label" for="glass">
                                                    Glass
                                                </label>
                                            </div>
                                            <span id="recycleitemError" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Est. Weight (kg): *</label>
                                            <select id="est_weight" name="est_weight" aria-label="Select Est. Weight"
                                                data-control="select2" data-placeholder="Select Est. Weight..."
                                                class="form-select" required style="color: black;">
                                                <option value="" disabled selected hidden class="placeholder">Select
                                                    Est. Weight...*</option>
                                            </select>
                                            <span id="estweightError" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Note: *</label>
                                            <textarea type="text" class="form-control @error('note') is-invalid @enderror" name="note"
                                                placeholder="Additional Note" style="color: black;" rows="3"></textarea>
                                            @error('note')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Upload Your Photo:</label>
                                            <input type="file" class="form-control" name="image" accept="image/*"
                                                id="image" style="color: black; margin-bottom: 10px;">
                                            <div id="imagePreviewBox"
                                                style="display: none; border: 2px dashed #ccc; padding: 10px; text-align: center; border-radius: 5px;">
                                                <img id="imagePreview" src="" alt="Image Preview"
                                                    style="max-width: 100%; height: auto; border-radius: 5px;">
                                            </div>
                                            <span id="imageError" class="text-danger"
                                                style="display: block; margin-top: 5px;"></span>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Est. Weight (kg): *</label>
                                            <select id="est_weight" name="est_weight" aria-label="Select Est. Weight"
                                                data-control="select2" data-placeholder="Select Est. Weight..."
                                                class="form-select" required style="color: black;">
                                                <option value="" disabled selected hidden class="placeholder">Select
                                                    Est. Weight...*</option>
                                            </select>
                                            <span id="estweightError" class="text-danger"></span>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Note: *</label>
                                            <textarea type="text" class="form-control @error('note') is-invalid @enderror" name="note"
                                                placeholder="Additional Note" style="color: black;" rows="3"></textarea>
                                            @error('note')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- <div class="form-group">
                                    <label class="form-label">Upload Your Photo:</label>
                                    <input type="file" class="form-control" name="image" accept="image/*"
                                        style="color: black;" id="image">
                                    <span id="imageError" class="text-danger"></span>
                                </div> --}}
                            </div>
                            <button type="button" name="next" class="btn btn-primary next action-button float-end"
                                value="Submit">Next</button>
                            <button type="button" name="previous"
                                class="btn btn-dark previous action-button-previous float-end me-1"
                                value="Previous">Previous</button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4 text-left">Confirm:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 4 - 4</h2>
                                    </div>
                                </div>
                                <br><br>
                                <h2 class="text-center text-success"><strong>Confirm ?</strong>
                                </h2>
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-3"> <img src="../../assets/images/pages/img-success.png"
                                            style="width: 30%" class="img-fluid" alt="fit-image"> </div>
                                </div>
                                <br><br>
                                <button type="submit"
                                    class="btn btn-primary next action-button float-end">Confirm</button>
                                <button type="button" name="previous"
                                    class="btn btn-dark previous action-button-previous float-end me-1"
                                    value="Previous">Previous</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <!-- Form Wizard Script -->
            {{-- <script src="../../assets/js/plugins/form-wizard.js"></script> --}}
            <script src="../assets/js/bookingform.js" defer></script>
            @include('components.modal-client')

        </section><!-- /Testimonials Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Nearby Recycle Center</h2>
                <p>Find the nearest recycle center to drop off your items and contribute to a greener future!</p>
            </div><!-- End Section Title -->
            <div class="mb-5">
                <p hidden id="location"></p>
                <div style="width: 100%; height: 600px;" id="map" frameborder="0" allowfullscreen="">
                </div>
            </div><!-- End Google Maps -->

        </section><!-- /Contact Section -->

        <!-- Faq Section -->
        <section id="faq" class="faq section">

            <div class="container-fluid">

                <div class="row gy-4">

                    <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

                        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                            <h3><span>Frequently Asked </span><strong>Questions</strong></h3>

                        </div>

                        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

                            <div class="faq-item faq-active">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>What is recyclable?</h3>
                                <div class="faq-content">
                                    <p>We accept paper, plastic, glass, metals, electronics, and more! Unsure? Use our Smart
                                        Classification tool.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>Can I schedule recurring pickups?</h3>
                                <div class="faq-content">
                                    <p>Yes! We offer flexible plans for recurring pickups based on your needs.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>What happens to my recyclables after collection?</h3>
                                <div class="faq-content">
                                    <p>Your recyclables are sorted, processed, and sent to certified recycling facilities,
                                        where they are transformed into reusable materials.
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>

                    </div>

                    <div class="col-lg-5 order-1 order-lg-2">
                        <img src="../landing-assets/img/faq.jpg" class="img-fluid" alt="" data-aos="zoom-in"
                            data-aos-delay="100">
                    </div>
                </div>

            </div>

        </section><!-- /Faq Section -->


    </main>
    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
    {{-- <script>
        let map, markers = [];
        var GlobalIcon = L.Icon.extend({
            options: {
                iconSize: [38, 38], // Adjust size based on your icon dimensions
                shadowSize: [50, 64],
                iconAnchor: [19, 38], // Anchor the icon at the bottom center
                shadowAnchor: [4, 62],
                popupAnchor: [0, -38] // Offset to position the popup above the icon
            }
        })
        var recycleIcon = new LeafIcon({
                iconUrl: '../landing-assets/img/recycle-center.png'
            }),
            currentLocationIcon = new LeafIcon({
                iconUrl: '../landing-assets/img/location.png'
            });
        // Automatically fetch user location on page load
        function initMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const userLat = position.coords.latitude;
                        const userLng = position.coords.longitude;

                        // Display user's latitude and longitude
                        document.getElementById('location').innerText = `Latitude: ${userLat}, Longitude: ${userLng}`;

                        // Initialize map centered at the user's location
                        map = L.map('map', {
                            center: {
                                lat: userLat,
                                lng: userLng,
                            },
                            zoom: 15,
                        });

                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '© OpenStreetMap'
                        }).addTo(map);

                        // Add a marker for the user's location
                        const userMarker = L.marker([userLat, userLng], {
                                draggable: false
                            })
                            .addTo(map)
                            .bindPopup('<b>Your Location</b>')
                            .openPopup();

                        // Initialize other markers
                        initMarkers();
                    },
                    (error) => {
                        alert('Error getting location: ' + error.message);
                        initializeFallbackMap();
                    }
                );
            } else {
                alert('Geolocation is not supported by this browser.');
                initializeFallbackMap();
            }
        }

        function initializeFallbackMap() {
            map = L.map('map', {
                center: {
                    lat: 3.071739234335413, // Default location
                    lng: 101.52130117274486,
                },
                zoom: 15,
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

            initMarkers();
        }

        /* --------------------------- Initialize Markers --------------------------- */
        function initMarkers() {
            const initialMarkers = <?php echo json_encode($initialMarkers); ?>;

            for (let index = 0; index < initialMarkers.length; index++) {

                const data = initialMarkers[index];
                const marker = generateMarker(data, index);
                marker.addTo(map).bindPopup(
                    `<b>${data.name}</b>`);
                markers.push(marker);
            }
        }

        function generateMarker(data, index) {
            return L.marker(data.position, {
                    draggable: data.draggable
                })
                .on('click', (event) => markerClicked(event, index))
                .on('dragend', (event) => markerDragEnd(event, index));
        }

        /* ------------------------- Handle Map Click Event ------------------------- */
        function markerClicked($event, index) {
            console.log(map);
            console.log($event.latlng.lat, $event.latlng.lng);
        }

        /* ----------------------- Handle Marker DragEnd Event ---------------------- */
        function markerDragEnd($event, index) {
            console.log(map);
            console.log($event.target.getLatLng());
        }

        // Initialize map on page load
        window.onload = initMap;
    </script> --}}
    <script>
        document.getElementById("image").addEventListener("change", function(event) {
            const file = event.target.files[0];
            const previewBox = document.getElementById("imagePreviewBox");
            const preview = document.getElementById("imagePreview");
            const error = document.getElementById("imageError");
            const maxSize = 5 * 1024 * 1024; // 5MB limit

            // Reset error message and preview box
            error.textContent = "";
            previewBox.style.display = "none";

            if (file) {
                if (file.size > maxSize) {
                    error.textContent = "File size exceeds 5MB. Please upload a smaller image.";
                    event.target.value = ""; // Clear file input
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewBox.style.display = "block"; // Show preview box
                };
                reader.readAsDataURL(file);
            }
        });

        let map, markers = [];

        // Define a base icon class with custom configurations
        var GlobalIcon = L.Icon.extend({
            options: {
                iconSize: [45, 45],
                shadowSize: [50, 64],
                iconAnchor: [22, 94],
                shadowAnchor: [4, 62],
                popupAnchor: [-3, -76]
            }
        });

        // Define custom icons
        var recycleIcon = new GlobalIcon({
                iconUrl: '../landing-assets/img/recycle-pin2.png' // Path to recycle icon
            }),
            currentLocationIcon = new GlobalIcon({
                iconUrl: '../landing-assets/img/pin.png' // Path to user location icon
            });

        // Automatically fetch user location on page load
        function initMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const userLat = position.coords.latitude;
                        const userLng = position.coords.longitude;

                        // Display user's latitude and longitude
                        document.getElementById('location').innerText = `Latitude: ${userLat}, Longitude: ${userLng}`;

                        // Initialize map centered at the user's location
                        map = L.map('map', {
                            center: {
                                lat: userLat,
                                lng: userLng,
                            },
                            zoom: 15,
                        });

                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '© OpenStreetMap'
                        }).addTo(map);

                        // Add a marker for the user's location using the custom icon
                        L.marker([userLat, userLng], {
                                icon: currentLocationIcon, // Use the custom location icon
                                draggable: false
                            })
                            .addTo(map)
                            .bindPopup('<b>Your Location</b>')
                            .openPopup();

                        // Initialize other markers
                        initMarkers();
                    },
                    (error) => {
                        alert('Error getting location: ' + error.message);
                        initializeFallbackMap();
                    }
                );
            } else {
                alert('Geolocation is not supported by this browser.');
                initializeFallbackMap();
            }
        }

        function initializeFallbackMap() {
            map = L.map('map', {
                center: {
                    lat: 3.071739234335413, // Default location
                    lng: 101.52130117274486,
                },
                zoom: 15,
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

            initMarkers();
        }

        /* --------------------------- Initialize Markers --------------------------- */
        function initMarkers() {
            const initialMarkers = <?php echo json_encode($initialMarkers); ?>;

            for (let index = 0; index < initialMarkers.length; index++) {
                const data = initialMarkers[index];
                const marker = generateMarker(data, index);
                const popupContent = `
            <b>${data.name}</b><br>
            ${data.address}<br>
            <a href="${data.googleMapsUrl}" target="_blank">View on Google Maps</a>`;
                marker.addTo(map).bindPopup(popupContent);
                markers.push(marker);
            }
        }

        function generateMarker(data, index) {
            // Use a custom icon for the recycle center markers
            const icon = data.type === 'recycle' ? recycleIcon : recycleIcon;

            return L.marker(data.position, {
                    icon: icon,
                    draggable: data.draggable
                })
                .on('click', (event) => markerClicked(event, index))
                .on('dragend', (event) => markerDragEnd(event, index));
        }

        /* ------------------------- Handle Map Click Event ------------------------- */
        function markerClicked(event, index) {
            console.log(map);
            console.log(event.latlng.lat, event.latlng.lng);
        }

        /* ----------------------- Handle Marker DragEnd Event ---------------------- */
        function markerDragEnd(event, index) {
            console.log(map);
            console.log(event.target.getLatLng());
        }

        // Initialize map on page load
        window.onload = initMap;
    </script>


@endsection
