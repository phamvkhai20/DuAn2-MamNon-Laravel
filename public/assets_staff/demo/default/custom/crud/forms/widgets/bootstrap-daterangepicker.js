var BootstrapDaterangepicker = {
    init: function () {
        !(function () {
            $(
                "#m_daterangepicker_1, #m_daterangepicker_1_modal"
            ).daterangepicker({
                buttonClasses: "m-btn btn",
                applyClass: "btn-primary",
                cancelClass: "btn-secondary",
            }),
                $("#m_daterangepicker_2").daterangepicker(
                    {
                        buttonClasses: "m-btn btn",
                        applyClass: "btn-primary",
                        cancelClass: "btn-secondary",
                    },
                    function (a, t, n) {
                        $("#m_daterangepicker_2 .form-control").val(
                            a.format("YYYY-MM-DD") +
                                " / " +
                                t.format("YYYY-MM-DD")
                        );
                    }
                ),
                $("#m_daterangepicker_2_modal").daterangepicker(
                    {
                        buttonClasses: "m-btn btn",
                        applyClass: "btn-primary",
                        cancelClass: "btn-secondary",
                    },
                    function (a, t, n) {
                        $("#m_daterangepicker_2 .form-control").val(
                            a.format("YYYY-MM-DD") +
                                " / " +
                                t.format("YYYY-MM-DD")
                        );
                    }
                ),
                $("#m_daterangepicker_3").daterangepicker(
                    {
                        buttonClasses: "m-btn btn",
                        applyClass: "btn-primary",
                        cancelClass: "btn-secondary",
                    },
                    function (a, t, n) {
                        $("#m_daterangepicker_3 .form-control").val(
                            a.format("YYYY-MM-DD") +
                                " / " +
                                t.format("YYYY-MM-DD")
                        );
                    }
                ),
                $("#m_daterangepicker_3_modal").daterangepicker(
                    {
                        buttonClasses: "m-btn btn",
                        applyClass: "btn-primary",
                        cancelClass: "btn-secondary",
                    },
                    function (a, t, n) {
                        $("#m_daterangepicker_3 .form-control").val(
                            a.format("YYYY-MM-DD") +
                                " / " +
                                t.format("YYYY-MM-DD")
                        );
                    }
                ),
                $("#m_daterangepicker_4").daterangepicker(
                    {
                        buttonClasses: "m-btn btn",
                        applyClass: "btn-primary",
                        cancelClass: "btn-secondary",
                        timePicker: !0,
                        timePickerIncrement: 30,
                        locale: { format: "DD-MM-YYYY h:mm A" },
                    },
                    function (a, t, n) {
                        $("#m_daterangepicker_4 .form-control").val(
                            a.format("DD-MM-YYYY h:mm A") +
                                " / " +
                                t.format("DD-MM-YYYY h:mm A")
                        );
                    }
                ),
                $("#m_daterangepicker_5").daterangepicker(
                    {
                        buttonClasses: "m-btn btn",
                        applyClass: "btn-primary",
                        cancelClass: "btn-secondary",
                        singleDatePicker: !0,
                        showDropdowns: !0,
                        locale: { format: "DD-MM-YYYY" },
                    },
                    function (a, t, n) {
                        $("#m_daterangepicker_5 .form-control").val(
                            a.format("DD-MM-YYYY") +
                                " / " +
                                t.format("DD-MM-YYYY")
                        );
                    }
                );
            // var a = moment().subtract(29, "days"),
            //     t = moment();
            $("#m_daterangepicker_6").daterangepicker(
                {
                    buttonClasses: "m-btn btn",
                    applyClass: "btn-primary",
                    cancelClass: "btn-secondary",
                    ranges: {
                        "Hôm nay": [moment(), moment()],
                        "Ngày mai": [moment().subtract(-1, "days"), moment().subtract(-1, "days")],
                        "Xin nghỉ 2 ngày tới": [moment().subtract(-2, "days"), moment()],
                        "Xin nghỉ hết tuần": [moment().subtract(1, "friday"), moment()],
                        "Xin nghỉ 1 tuần": [moment().subtract(-6, "days"), moment()],
                        "Xin nghỉ 1 tháng": [
                            moment().subtract(-29, "days"),
                            moment(),
                        ],
                        // "This Month": [
                        //     moment().startOf("month"),
                        //     moment().endOf("month"),
                        // ],
                        // "Last Month": [
                        //     moment().subtract(1, "month").startOf("month"),
                        //     moment().subtract(1, "month").endOf("month"),
                        // ],
                    },
                },
                function (a, t, n) {
                    $("#m_daterangepicker_6 .form-control").val(
                        a.format("DD-MM-YYYY") + " / " + t.format("DD-MM-YYYY")
                    );
                }
            );
        })(),
            $("#m_daterangepicker_1_validate").daterangepicker(
                {
                    buttonClasses: "m-btn btn",
                    applyClass: "btn-primary",
                    cancelClass: "btn-secondary",
                },
                function (a, t, n) {
                    $("#m_daterangepicker_1_validate .form-control").val(
                        a.format("YYYY-MM-DD") + " / " + t.format("YYYY-MM-DD")
                    );
                }
            ),
            $("#m_daterangepicker_2_validate").daterangepicker(
                {
                    buttonClasses: "m-btn btn",
                    applyClass: "btn-primary",
                    cancelClass: "btn-secondary",
                },
                function (a, t, n) {
                    $("#m_daterangepicker_3_validate .form-control").val(
                        a.format("YYYY-MM-DD") + " / " + t.format("YYYY-MM-DD")
                    );
                }
            ),
            $("#m_daterangepicker_3_validate").daterangepicker(
                {
                    buttonClasses: "m-btn btn",
                    applyClass: "btn-primary",
                    cancelClass: "btn-secondary",
                },
                function (a, t, n) {
                    $("#m_daterangepicker_3_validate .form-control").val(
                        a.format("YYYY-MM-DD") + " / " + t.format("YYYY-MM-DD")
                    );
                }
            );
    },
};
jQuery(document).ready(function () {
    BootstrapDaterangepicker.init();
});
