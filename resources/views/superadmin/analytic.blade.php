@extends('layouts.master')
@section('tittle')
    <title>RecyclePlus | Recycle Analytic</title>
@endsection
@section('nav-head')
    <div>
        <h1 class="m-0">Recycle Analytic</h1>
        <p class="m-0">We are on a mission to help households like you build a greener world.</p>
    </div>
@endsection
@section('content')
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" data-aos="fade-up" data-aos-delay="900">
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Total Waste Categories Collected</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="flex-wrap d-flex align-items-center justify-content-between"
                                    style="width: 70%; margin: auto;">
                                    <canvas id="BarwasteChart" class="col-md-8 col-lg-8 myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="card" data-aos="fade-up" data-aos-delay="900">
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Waste Image Predictions by Category</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="flex-wrap d-flex align-items-center justify-content-between"
                                    style="width: 60%; margin: auto;">
                                    <canvas id="predictionsBar" class="col-md-8 col-lg-8 myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="card" data-aos="fade-up" data-aos-delay="900">
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Validation Status Distribution</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="flex-wrap d-flex align-items-center justify-content-between"
                                    style="width: 60%; margin: auto;">
                                    <canvas id="validationDonut" class="col-md-8 col-lg-8 myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card" data-aos="fade-up" data-aos-delay="900">
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Trends in Waste Categories Over Time</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="flex-wrap d-flex align-items-center justify-content-between"
                                    style="width: 60%; margin: auto;">
                                    <canvas id="wasteTrendsLine" class="col-md-8 col-lg-8 myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="card" data-aos="fade-up" data-aos-delay="900">
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Total by Recycle Categories</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="flex-wrap d-flex align-items-center justify-content-between"
                                    style="width: 60%; margin: auto;">
                                    <canvas id="doughnutwasteChart" class="col-md-8 col-lg-8 myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="card" data-aos="fade-up" data-aos-delay="900">
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Total by Recycle Categories</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="flex-wrap d-flex align-items-center justify-content-between"
                                    style="width: 60%; margin: auto;">
                                    <canvas id="piewasteChart" class="col-md-8 col-lg-8 myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="card" data-aos="fade-up" data-aos-delay="900">
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Estimated Weight Distribution</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="flex-wrap d-flex align-items-center justify-content-between"
                                    style="width: 70%; margin: auto;">
                                    <canvas id="weightHistogram" class="col-md-8 col-lg-8 myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="card" data-aos="fade-up" data-aos-delay="900">
                            <div class="flex-wrap card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Prediction Confidence Levels</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="flex-wrap d-flex align-items-center justify-content-between"
                                    style="width: 70%; margin: auto;">
                                    <canvas id="confidenceHistogram" class="col-md-8 col-lg-8 myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Define the color mapping for waste categories
        function getWasteCategoryColors() {
            return {
                paper: {
                    background: 'rgba(255, 99, 132, 0.6)',
                    border: 'rgba(255, 99, 132, 1)',
                },
                plastic: {
                    background: 'rgba(54, 162, 235, 0.6)',
                    border: 'rgba(54, 162, 235, 1)',
                },
                electronic: {
                    background: 'rgba(255, 206, 86, 0.6)',
                    border: 'rgba(255, 206, 86, 1)',
                },
                aluminium: {
                    background: 'rgba(75, 192, 192, 0.6)',
                    border: 'rgba(75, 192, 192, 1)',
                },
                steel: {
                    background: 'rgba(153, 102, 255, 0.6)',
                    border: 'rgba(153, 102, 255, 1)',
                },
                cardboard: {
                    background: 'rgba(255, 159, 64, 0.6)',
                    border: 'rgba(255, 159, 64, 1)',
                },
                textiles: {
                    background: 'rgba(100, 200, 255, 0.6)',
                    border: 'rgba(100, 200, 255, 1)',
                },
                metal: {
                    background: 'rgba(200, 100, 255, 0.6)',
                    border: 'rgba(200, 100, 255, 1)',
                },
                glass: {
                    background: 'rgba(255, 255, 100, 0.6)',
                    border: 'rgba(255, 255, 100, 1)',
                },
            };
        }
        // Bar Chart
        const barCtx = document.getElementById('BarwasteChart').getContext('2d');
        const colors = getWasteCategoryColors(); // Get the colors from the function

        const BarwasteChart = new Chart(barCtx, {
            type: 'line',
            data: {
                labels: [
                    'Paper', 'Plastic', 'Electronic', 'Aluminium',
                    'Steel', 'Cardboard', 'Textiles', 'Metal', 'Glass'
                ],
                datasets: [{
                    label: 'Total',
                    data: [
                        {{ $totals->paper }}, {{ $totals->plastic }},
                        {{ $totals->electronic }}, {{ $totals->aluminium }},
                        {{ $totals->steel }}, {{ $totals->cardboard }},
                        {{ $totals->textiles }}, {{ $totals->metal }},
                        {{ $totals->glass }}
                    ],
                    backgroundColor: [
                        colors.paper.background,
                        colors.plastic.background,
                        colors.electronic.background,
                        colors.aluminium.background,
                        colors.steel.background,
                        colors.cardboard.background,
                        colors.textiles.background,
                        colors.metal.background,
                        colors.glass.background
                    ],
                    borderColor: [
                        colors.paper.border,
                        colors.plastic.border,
                        colors.electronic.border,
                        colors.aluminium.border,
                        colors.steel.border,
                        colors.cardboard.border,
                        colors.textiles.border,
                        colors.metal.border,
                        colors.glass.border
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        // Doughnut Chart
        const doughnutCtx = document.getElementById('doughnutwasteChart').getContext('2d');
        const DoughnutwasteChart = new Chart(doughnutCtx, {
            type: 'doughnut',
            data: {
                labels: [
                    'Paper', 'Plastic', 'Electronic', 'Aluminium',
                    'Steel', 'Cardboard', 'Textiles', 'Metal', 'Glass'
                ],
                datasets: [{
                    label: 'Total',
                    data: [
                        {{ $totals->paper }}, {{ $totals->plastic }},
                        {{ $totals->electronic }}, {{ $totals->aluminium }},
                        {{ $totals->steel }}, {{ $totals->cardboard }},
                        {{ $totals->textiles }}, {{ $totals->metal }},
                        {{ $totals->glass }}
                    ],
                    backgroundColor: [
                        colors.paper.background,
                        colors.plastic.background,
                        colors.electronic.background,
                        colors.aluminium.background,
                        colors.steel.background,
                        colors.cardboard.background,
                        colors.textiles.background,
                        colors.metal.background,
                        colors.glass.background
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                    }
                }
            }
        });

        // Pie Chart
        const pieCtx = document.getElementById('piewasteChart').getContext('2d');
        const PieWasteChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: [
                    'Paper', 'Plastic', 'Electronic', 'Aluminium',
                    'Steel', 'Cardboard', 'Textiles', 'Metal', 'Glass'
                ],
                datasets: [{
                    label: 'Total',
                    data: [
                        {{ $totals->paper }}, {{ $totals->plastic }},
                        {{ $totals->electronic }}, {{ $totals->aluminium }},
                        {{ $totals->steel }}, {{ $totals->cardboard }},
                        {{ $totals->textiles }}, {{ $totals->metal }},
                        {{ $totals->glass }}
                    ],
                    backgroundColor: [
                        colors.paper.background,
                        colors.plastic.background,
                        colors.electronic.background,
                        colors.aluminium.background,
                        colors.steel.background,
                        colors.cardboard.background,
                        colors.textiles.background,
                        colors.metal.background,
                        colors.glass.background
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                    }
                }
            }
        });
        // 1. Estimated Weight Distribution (Histogram)
        const weightData = @json($weightDistribution);
        const weightBins = Object.keys(weightData);
        const weightCounts = Object.values(weightData).map(group => group.length);

        const weightChartCtx = document.getElementById('weightHistogram').getContext('2d');
        new Chart(weightChartCtx, {
            type: 'bar',
            data: {
                labels: weightBins.map(bin => `${bin}-${parseInt(bin) + 1} kg`),
                datasets: [{
                    label: 'Number of Bookings',
                    data: weightCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // 2. Trends in Waste Categories Over Time (Line Chart)
        const wasteTrends = @json($wasteTrends);
        const dates = wasteTrends.map(item => item.date);
        const paperData = wasteTrends.map(item => item.paper);
        const plasticData = wasteTrends.map(item => item.plastic);
        const electronicData = wasteTrends.map(item => item.electronic);
        const aluminiumData = wasteTrends.map(item => item.aluminium);
        const steelData = wasteTrends.map(item => item.steel);
        const cardboardData = wasteTrends.map(item => item.cardboard);
        const textilesData = wasteTrends.map(item => item.textiles);
        const metalData = wasteTrends.map(item => item.metal);
        const glassData = wasteTrends.map(item => item.glass);

        // Line Chart for Waste Trends
        const wasteChartCtx = document.getElementById('wasteTrendsLine').getContext('2d');
        new Chart(wasteChartCtx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                        label: 'Paper',
                        data: paperData,
                        borderColor: colors.paper.border,
                        backgroundColor: colors.paper.background,
                    },
                    {
                        label: 'Plastic',
                        data: plasticData,
                        borderColor: colors.plastic.border,
                        backgroundColor: colors.plastic.background,
                    },
                    {
                        label: 'Electronic',
                        data: electronicData,
                        borderColor: colors.electronic.border,
                        backgroundColor: colors.electronic.background,
                    },
                    {
                        label: 'Aluminium',
                        data: aluminiumData,
                        borderColor: colors.aluminium.border,
                        backgroundColor: colors.aluminium.background,
                    },
                    {
                        label: 'Steel',
                        data: steelData,
                        borderColor: colors.steel.border,
                        backgroundColor: colors.steel.background,
                    },
                    {
                        label: 'Cardboard',
                        data: cardboardData,
                        borderColor: colors.cardboard.border,
                        backgroundColor: colors.cardboard.background,
                    },
                    {
                        label: 'Textiles',
                        data: textilesData,
                        borderColor: colors.textiles.border,
                        backgroundColor: colors.textiles.background,
                    },
                    {
                        label: 'Metal',
                        data: metalData,
                        borderColor: colors.metal.border,
                        backgroundColor: colors.metal.background,
                    },
                    {
                        label: 'Glass',
                        data: glassData,
                        borderColor: colors.glass.border,
                        backgroundColor: colors.glass.background,
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                },
            }
        });
        // 3. Validation Status Distribution (Pie/Donut Chart)
        const validationData = @json($validationStatus);
        const validationLabels = validationData.map(item => item.validation_status);
        const validationCounts = validationData.map(item => item.total);

        const validationChartCtx = document.getElementById('validationDonut').getContext('2d');
        new Chart(validationChartCtx, {
            type: 'doughnut',
            data: {
                labels: validationLabels,
                datasets: [{
                    data: validationCounts,
                    backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)',
                        'rgba(75, 192, 192, 0.6)'
                    ]
                }]
            }
        });

        // 4. Prediction Confidence Levels (Histogram)
        const confidenceLevels = @json($confidenceLevels).map(item => item.confidence);
        const confidenceChartCtx = document.getElementById('confidenceHistogram').getContext('2d');
        new Chart(confidenceChartCtx, {
            type: 'bar',
            data: {
                labels: Array.from({
                    length: 10
                }, (_, i) => `${i * 10}-${i * 10 + 10}%`),
                datasets: [{
                    label: 'Confidence Levels',
                    data: confidenceLevels.reduce((bins, confidence) => {
                        const binIndex = Math.floor(confidence /
                            10); // Group confidence into 10% intervals
                        bins[binIndex] = (bins[binIndex] || 0) + 1;
                        return bins;
                    }, new Array(10).fill(0)),
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    },
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                },
            },
        });

        // 5. Waste Image Predictions by Category (Bar Chart)
        const predictionsData = @json($predictionsByCategory);
        const predictionLabels = predictionsData.map(item => item.prediction);
        const predictionCounts = predictionsData.map(item => item.total);

        const predictionChartCtx = document.getElementById('predictionsBar').getContext('2d');
        new Chart(predictionChartCtx, {
            type: 'pie',
            data: {
                labels: predictionLabels,
                datasets: [{
                    label: 'Number of Predictions',
                    data: predictionCounts,
                    backgroundColor: ['rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', ]
                }]
            }
        });


    </script>
@endsection
