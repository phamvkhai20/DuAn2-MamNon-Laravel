@extends('./staff/nha-truong/layouts/layout')
@section('title','Dashboard')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper m-3">
    <div class="">
        <div class="m-portlet ">
            <div class="m-portlet__body  m-portlet__body--no-padding">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-md-12 col-lg-6 col-xl-4">

                        <!--begin::New Feedbacks-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Trẻ nghỉ nhiều liên tục
                                </h4><br>
                                <span class="m-widget24__desc">
                                </span>
                                <span class="m-widget24__stats m--font-info">
                                    {{count($attendance)}}
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget24__change">
                                    Change
                                </span>
                                <span class="m-widget24__number">
                                    84%
                                </span>
                            </div>
                        </div>

                        <!--end::New Feedbacks-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4">

                        <!--begin::New Orders-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Đăng kí ăn ngày hôm nay
                                </h4><br>
                                <span class="m-widget24__desc">

                                </span>
                                <span class="m-widget24__stats m--font-danger">
                                    {{count($meal)}}
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget24__change">
                                    Change
                                </span>
                                <span class="m-widget24__number">
                                    69%
                                </span>
                            </div>
                        </div>

                        <!--end::New Orders-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4">

                        <!--begin::New Users-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Trẻ nghỉ hôm nay
                                </h4><br>
                                <span class="m-widget24__desc">

                                </span>
                                <span class="m-widget24__stats m--font-success">
                                    {{count($attendanceToday)}}
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-success" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget24__change">
                                    Change
                                </span>
                                <span class="m-widget24__number">
                                    90%
                                </span>
                            </div>
                        </div>

                        <!--end::New Users-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
							<div class="col-xl-6">
								<div class="m-portlet m-portlet--full-height m-portlet--skin-light m-portlet--fit ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Thống kê nghỉ học
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="m-widget21" style="min-height: 300px">
											<div class="m-widget21__chart m-portlet-fit--sides" style="height:310px;">
                                            <canvas id="m_chart_activities"></canvas>
											</div>
										</div>
									</div>
								</div>

							</div>
							<div class="col-xl-6">
								<div class="m-portlet m-portlet--full-height m-portlet--skin-light m-portlet--fit ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Thống kê đăng kí ăn
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="m-widget21" style="min-height: 300px">
											<div class="m-widget21__chart m-portlet-fit--sides" style="height:310px;">
                                            <canvas id="chart_meal"></canvas>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
    </div>

</div>
<script>
    var Dashboard = function() {
        let arrays=[];
        let arraysMeal=[];
        axios.get("{{ route('nha-truong.axios.get-data-attendance')}}").then((response) => {
            console.log(response);
            arrays=response.data.arrayDate
            arraysMeal=response.data.arrayMeal
        }).catch((error) => {
            if (error.response) {
                console.log(error.response);
            }
        });
        // var arrays= [100, 25, 12, 10, 9, 2, 0, 9, 3, 7]
        var e = function(e, t, a, r) {
                if (0 != e.length) {
                    var o = {
                        type: "line",
                        data: {
                            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                            datasets: [{
                                label: "",
                                borderColor: a,
                                borderWidth: r,
                                pointHoverRadius: 4,
                                pointHoverBorderWidth: 12,
                                pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                                pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                                pointHoverBackgroundColor: mApp.getColor("danger"),
                                pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(),
                                fill: !1,
                                data: t
                            }]
                        },
                        options: {
                            title: {
                                display: !1
                            },
                            tooltips: {
                                enabled: !1,
                                intersect: !1,
                                mode: "nearest",
                                xPadding: 10,
                                yPadding: 10,
                                caretPadding: 10
                            },
                            legend: {
                                display: !1,
                                labels: {
                                    usePointStyle: !1
                                }
                            },
                            responsive: !0,
                            maintainAspectRatio: !0,
                            hover: {
                                mode: "index"
                            },
                            scales: {
                                xAxes: [{
                                    display: !1,
                                    gridLines: !1,
                                    scaleLabel: {
                                        display: !0,
                                        labelString: "Month"
                                    }
                                }],
                                yAxes: [{
                                    display: !1,
                                    gridLines: !1,
                                    scaleLabel: {
                                        display: !0,
                                        labelString: "Value"
                                    },
                                    ticks: {
                                        beginAtZero: !0
                                    }
                                }]
                            },
                            elements: {
                                point: {
                                    radius: 4,
                                    borderWidth: 12
                                }
                            },
                            layout: {
                                padding: {
                                    left: 0,
                                    right: 10,
                                    top: 5,
                                    bottom: 0
                                }
                            }
                        }
                    };
                    return new Chart(e, o)
                }
            }
        return {
            init: function() {
                var a, r;
                ! function() {
                        if (0 != $("#m_chart_activities").length) {
                            var e = document.getElementById("m_chart_activities").getContext("2d"),
                                t = e.createLinearGradient(0, 0, 0, 240);
                            t.addColorStop(0, Chart.helpers.color("#e14c86").alpha(1).rgbString()), t.addColorStop(1, Chart.helpers.color("#e14c86").alpha(.3).rgbString());
                            var a = {
                                type: "line",
                                data: {
                                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                                    datasets: [{
                                        label: "Tổng trẻ nghỉ",
                                        backgroundColor: t,
                                        borderColor: "#e13a58",
                                        pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                                        pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                                        pointHoverBackgroundColor: mApp.getColor("light"),
                                        pointHoverBorderColor: Chart.helpers.color("#ffffff").alpha(.1).rgbString(),
                                        data: arrays
                                    }]
                                },
                                options: {
                                    title: {
                                        display: !1
                                    },
                                    tooltips: {
                                        mode: "nearest",
                                        intersect: !1,
                                        position: "nearest",
                                        xPadding: 10,
                                        yPadding: 10,
                                        caretPadding: 10
                                    },
                                    legend: {
                                        display: !1
                                    },
                                    responsive: !0,
                                    maintainAspectRatio: !1,
                                    scales: {
                                        xAxes: [{
                                            display: !1,
                                            gridLines: !1,
                                            scaleLabel: {
                                                display: !0,
                                                labelString: "Month"
                                            }
                                        }],
                                        yAxes: [{
                                            display: !1,
                                            gridLines: !1,
                                            scaleLabel: {
                                                display: !0,
                                                labelString: "Value"
                                            },
                                            ticks: {
                                                beginAtZero: !0
                                            }
                                        }]
                                    },
                                    elements: {
                                        line: {
                                            tension: 1e-7
                                        },
                                        point: {
                                            radius: 4,
                                            borderWidth: 12
                                        }
                                    },
                                    layout: {
                                        padding: {
                                            left: 0,
                                            right: 0,
                                            top: 10,
                                            bottom: 0
                                        }
                                    }
                                }
                            };
                            new Chart(e, a)
                        }
                    }(),function() {
                        if (0 != $("#chart_meal").length) {
                            var e = document.getElementById("chart_meal").getContext("2d"),
                                t = e.createLinearGradient(0, 0, 0, 240);
                            t.addColorStop(0, Chart.helpers.color("#e14c86").alpha(1).rgbString()), t.addColorStop(1, Chart.helpers.color("#e14c86").alpha(.3).rgbString());
                            var a = {
                                type: "line",
                                data: {
                                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                                    datasets: [{
                                        label: "Tổng đăng kí",
                                        backgroundColor: t,
                                        borderColor: "#e13a58",
                                        pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                                        pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                                        pointHoverBackgroundColor: mApp.getColor("light"),
                                        pointHoverBorderColor: Chart.helpers.color("#ffffff").alpha(.1).rgbString(),
                                        data: arraysMeal
                                    }]
                                },
                                options: {
                                    title: {
                                        display: !1
                                    },
                                    tooltips: {
                                        mode: "nearest",
                                        intersect: !1,
                                        position: "nearest",
                                        xPadding: 10,
                                        yPadding: 10,
                                        caretPadding: 10
                                    },
                                    legend: {
                                        display: !1
                                    },
                                    responsive: !0,
                                    maintainAspectRatio: !1,
                                    scales: {
                                        xAxes: [{
                                            display: !1,
                                            gridLines: !1,
                                            scaleLabel: {
                                                display: !0,
                                                labelString: "Month"
                                            }
                                        }],
                                        yAxes: [{
                                            display: !1,
                                            gridLines: !1,
                                            scaleLabel: {
                                                display: !0,
                                                labelString: "Value"
                                            },
                                            ticks: {
                                                beginAtZero: !0
                                            }
                                        }]
                                    },
                                    elements: {
                                        line: {
                                            tension: 1e-7
                                        },
                                        point: {
                                            radius: 4,
                                            borderWidth: 12
                                        }
                                    },
                                    layout: {
                                        padding: {
                                            left: 0,
                                            right: 0,
                                            top: 10,
                                            bottom: 0
                                        }
                                    }
                                }
                            };
                            new Chart(e, a)
                        }
                    }()
            }
        }
    }();
    jQuery(document).ready(function() {
        Dashboard.init()
    });
</script>
@endsection