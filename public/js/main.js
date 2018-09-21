var tableSort = ["asc", "desc"];

const employeeTableRows = function (employees) {
    employees.forEach(function (employee) {
        $("#employees-table > tbody").append(
            "<tr>" +
            "<td>Photo</td>" +
            "<td>" + employee.name + "</td>" +
            "<td>" + employee.post + "</td>" +
            "<td>" + employee.date_of_employment + "</td>" +
            "<td>" + employee.wage + "</td>" +
            "<td>" + employee.chief_id + "</td>" +
            "<td>" +
            "<div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">" +
            "<button type=\"button\" class=\"btn btn-primary\">Upd</button>" +
            "<button type=\"button\" class=\"btn btn-dark\">Del</button>" +
            "</div>" +
            "</td>" +
            "</td>"
        );
    })
};

$(document).ready(function () {

    $.post({
        "url": "/api/employee",
        "success": function (res) {
            return employeeTableRows(res.data)
        },
        "dataType": "json"
    });

    $(".employee-sort").click(function () {
        const column = $(this).data("columnName");
        const order = tableSort[0];

        $.post({
            "url": "/api/employee",
            "data":
                {
                    "order": order,
                    "column": column
                },
            "success": function (res) {
                $("#employees-table > tbody").children().remove();
                tableSort.reverse();
                return employeeTableRows(res);
            },
            "dataType": "json"
        });


    });


});